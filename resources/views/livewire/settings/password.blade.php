<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {


    public $sessionses;


    public function mount()
    {
        $this->show();
    }


    public function show()
    {
        $this->sessionses = DB::table('sessions')
            ->where('user_id', Auth()->user()->id)
            ->orderBy('last_activity', 'desc')
            ->limit(5)
            ->get();
    }

    public function detectDeviceWithCustomAgent($vorodi)
    {
        $customUserAgent = $vorodi;
        $platform = $this->getPlatform($customUserAgent);
        $deviceType = $this->getDeviceType($customUserAgent);
        return response()->json([
            'platform' => $platform,
            'device_type' => $deviceType,
        ]);
    }

    private function getPlatform($userAgent)
    {
        if (preg_match('/Windows NT/', $userAgent)) {
            return 'Windows';
        }
        if (preg_match('/Macintosh|Mac OS X/', $userAgent)) {
            return 'MacOS';
        }
        if (preg_match('/Linux/', $userAgent)) {
            return 'Linux';
        }
        if (preg_match('/iPhone|iPad|iPod/', $userAgent)) {
            return 'iOS';
        }
        if (preg_match('/Android/', $userAgent)) {
            return 'Android';
        }
        return 'Unknown';
    }

    public function deletese($vorodi)
    {
        if ($vorodi) {
            DB::table('sessions')->where('id', $vorodi)->delete();
            $this->show();
        }
    }


    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout heading="{{ __('به‌روزرسانی رمز عبور') }}"
                       subheading="{{ __('اطمینان حاصل کنید که حساب کاربری شما از یک رمز عبور طولانی و تصادفی برای امنیت بیشتر استفاده می‌کند.') }}">
        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <flux:input
                wire:model="current_password"
                label="{{ __('رمز عبور فعلی') }}"
                type="password"
                required
                viewable
                autocomplete="current-password"
            />


            <flux:input
                wire:model="password"
                label="{{ __('رمز عبور جدید') }}"
                type="password"
                name="password"
                viewable
                required
                autocomplete="new-password"
            />

            <flux:input
                wire:model="password_confirmation"
                label="{{ __('تأیید رمز عبور') }}"
                type="password"
                viewable
                name="password_confirmation"
                required
                autocomplete="new-password"
            />


            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">ذخیره</flux:button>
                </div>

                <x-action-message class="me-3" on="password-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>


        <div class="mt-8">
            <flux:heading> دستگاه های متصل شده اخیر</flux:heading>
            <flux:subheading>بررسی دستگاه های متصل و تاریخ ورود</flux:subheading>
        </div>

        <div class=" mt-5 ">

            @foreach($sessionses as $sessions)

                <ul role="list" class="grid grid-cols-1 gap-6 mb-7">
                    <li class="col-span-1 border dark:border-zinc-500 divide-y divide-gray-200 dark:divide-zinc-500 rounded-lg bg-white shadow-sm dark:bg-zinc-700">
                        <div class="flex w-full items-center justify-between space-x-6 p-3">
                            <div class="flex-1 truncate">
                                <div class="flex items-center space-x-3">
                                    <h3 class="truncate text-sm font-medium text-gray-900 dark:text-white"> ادرس ایپی :
                                        <span>{{$sessions->ip_address}}</span></h3>
                                </div>
                                <p class="mt-3 truncate text-sm text-gray-500 dark:text-white">تاریخ ورود :
                                    <span> {{  jdate('Y/n/j',$sessions->last_activity,'','','fa') }}</span>
                                </p>
                                <p></p>
                            </div>
                            <flux:tooltip content="{{ $this->getPlatform($sessions->user_agent) }}">
                                <div class="size-10 shrink-0 bg-neutral-600 rounded  flex justify-center items-center">
                                    @if($this->getPlatform($sessions->user_agent) == 'Windows' or $this->getPlatform($sessions->user_agent)  ==  'Linux' or $this->getPlatform($sessions->user_agent) == 'MacOS')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="white" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25"/>
                                        </svg>
                                    @endif
                                    @if($this->getPlatform($sessions->user_agent) == 'iOS' or $this->getPlatform($sessions->user_agent)  ==  'Android')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="white" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
                                        </svg>
                                    @endif
                                    @if($this->getPlatform($sessions->user_agent) == 'Unknown' )
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="white" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
                                        </svg>
                                    @endif
                                </div>
                            </flux:tooltip>
                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200 dark:divide-zinc-500 ">
                                <div class="flex w-0 gap-2 flex-1">
                                    <button wire:target="deletese()" wire:click="deletese('{{ $sessions->id }}')"
                                            class="relative duration-300 hover:text-red-500 cursor-pointer -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-2 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900 dark:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        حذف کردن
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

            @endforeach

        </div>


    </x-settings.layout>
</section>
