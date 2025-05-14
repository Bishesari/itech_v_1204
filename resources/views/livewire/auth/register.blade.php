<?php

use App\Models\Mobile;
use App\Models\Profile;
use App\Models\User;
use App\Rules\NCode;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $f_name_fa = '';
    public string $l_name_fa = '';
    public string $n_code = '';
    public string $mobile_nu = '';
    public string $u_otp = '';
    public int $ipRemainingTime = 0;
    public int $smsRemainingTime = 120;


    public int $sd = 0;

    protected function rules(): array
    {
        return [
            'f_name_fa' => ['required', 'string', 'min:2'],
            'l_name_fa' => ['required', 'string', 'min:2'],
            'n_code' => ['required', 'digits:10', new NCode, Rule::unique('profiles', 'n_code')],
            'mobile_nu' => ['required', 'starts_with:09', 'digits:11']
        ];
    }

    public function send_otp(): void
    {
        $this->validate();
        $ip = Request::ip();
        $key = 'ip_limit:' . $ip;
        $mobile_count = Mobile::where('mobile_nu', $this->mobile_nu)->count();
        if ($mobile_count) {
            $mobile = Mobile::where('mobile_nu', $this->mobile_nu)->first();
            $this->smsRemainingTime = time() - $mobile['otp_sent_time'];
        } else {
            $mobile = new Mobile();
            $mobile ['mobile_nu'] = $this->mobile_nu;
            $mobile ['created'] = j_d_stamp_en();
        }

        if (RateLimiter::tooManyAttempts($key, 10)) {
            $this->ipRemainingTime = RateLimiter::availableIn($key);
            return;
        }
        if ($this->smsRemainingTime >= 120) {
            RateLimiter::hit($key, 86400);
            $otp = NumericOTP(6);
            /* Otp Send Function */
            $mobile ['otp'] = $otp;
            $mobile ['otp_sent_time'] = time();
            $this->smsRemainingTime = 0;
        }
        $mobile ['request_ip'] = $ip;
        $mobile ['updated'] = j_d_stamp_en();
        $mobile->save();
        $this->modal('check_otp')->show();
    }

    public function register(): void
    {
        $mobile = Mobile::where('mobile_nu', $this->mobile_nu)->first();
        if ($mobile ['otp'] != $this->u_otp) {
            $incorrect_otp_err = 'asdasdasd';
            return;
        }
        if ( (time() - $mobile ['otp_sent_time']) >= 120) {
            $otp_time_validation_error = 'asdasdasd';
            return;
        }

        RateLimiter::clear('ip_limit:' . Request::ip());
        $mobile ['verified'] = 1;
        $mobile ['updated'] = j_d_stamp_en();
        $mobile->save();

        $passw = simple_alpha_numeric_otp(8);

        $user = new User();
        $user ['user_name'] = $this->n_code;
        $user ['password'] = $passw;
        $user ['created'] = j_d_stamp_en();
        $user->save();
        event(new Registered($user));

        $profile = new Profile();
        $profile ['n_code'] = $this->n_code;
        $profile ['f_name_fa'] = $this->f_name_fa;
        $profile ['l_name_fa'] = $this->l_name_fa;
        $profile ['created'] = j_d_stamp_en();

        $profile->user()->associate($user);
        $profile->save();

        $user->mobiles()->attach($mobile['id'], ['created' => j_d_stamp_en()]);
        Auth::login($user);
        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('ایجاد حساب کاربری')" :description="__('اطلاعات خود را وارد نمایید.')"/>

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')"/>

    <div>{{$smsRemainingTime}}</div>

    <form wire:submit="send_otp" class="flex flex-col gap-6">

        <!-- First Name -->
        <flux:input wire:model="f_name_fa" :label="__('نام')" type="text" required autofocus class:input="text-center"/>

        <!-- Last Name -->
        <flux:input wire:model="l_name_fa" :label="__('نام خانوادگی')" type="text" required class:input="text-center"/>

        <!-- National Code -->
        <flux:input wire:model="n_code" :label="__('کدملی')" type="text" class:input="text-center" style="direction:ltr"
                    maxlength="10" required/>

        <!-- Mobile -->
        <flux:input wire:model="mobile_nu" :label="__('شماره موبایل')" type="text" class:input="text-center"
                    style="direction:ltr" maxlength="11" required/>

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>


    <!--------- Mobile Verification Modal --------->
    <flux:modal name="check_otp" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{__('تایید شماره موبایل')}}</flux:heading>
                <flux:text class="mt-2">{{__('کد پیامک شده به ')}} {{$mobile_nu}} {{__(' را وارد نمایید.')}}</flux:text>
            </div>
            <form wire:submit="register" class="flex flex-col gap-6">
                <flux:input wire:model="u_otp" :label="__('کد پیامکی')" type="text" class:input="text-center"
                            style="direction:ltr" maxlength="6" required autofocus/>
                <div class="flex">
                    <flux:spacer/>
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
