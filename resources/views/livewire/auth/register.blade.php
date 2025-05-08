<?php

use App\Models\Mobile;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $f_name_fa = '';
    public string $l_name_fa = '';
    public string $n_code = '';
    public string $mobile_nu = '';
    public int $ipRemainingTime = 0;
    public int $smsRemainingTime = 120;

    public function send_otp(): void
    {
        $ip = Request::ip();
        $key = 'ip_limit:' . $ip;
        $mobile_count = Mobile::where('mobile_nu', $this->mobile_nu)->count();
        if ($mobile_count) {
            $mobile = Mobile::where('mobile_nu', $this->mobile_nu)->first();
            $this->smsRemainingTime = time() - $mobile['otp_sent_time'];
        }
        else {
            $mobile = new Mobile();
            $mobile ['mobile_nu'] = $this->mobile_nu;
            $mobile ['created'] = j_d_stamp_en();
        }
        if (!RateLimiter::tooManyAttempts($key, 10) and $this->smsRemainingTime >= 120 ) {
            RateLimiter::hit($key, 86400);
            $otp = NumericOTP(6);
            /* Otp Send Function */
            $mobile ['otp'] = $otp;
            $mobile ['otp_sent_time'] = time();
            $this->smsRemainingTime = 0;
        } else {
            $this->ipRemainingTime = RateLimiter::availableIn($key);
            return;
        }
        $mobile ['request_ip'] = $ip;
        $mobile ['updated'] = j_d_stamp_en();
        $mobile->save();
        $this->modal('check_otp')->show();
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
                <flux:heading size="lg">Update profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <flux:input label="Name" placeholder="Your name"/>
            <flux:input label="Date of birth" type="date"/>
            <div class="flex">
                <flux:spacer/>
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
