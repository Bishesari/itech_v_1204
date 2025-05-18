<?php

use Livewire\Volt\Component;

new class extends Component {


}; ?>

<div class="flex flex-col items-start">
    @include('partials.settings-heading')

    <x-settings.layout heading="{{ __('ظاهر') }}" subheading="{{ __('تنظیمات ظاهر حساب کاربری خود را به‌روزرسانی کنید') }}">

        <div>
            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                <flux:radio value="light" icon="sun">{{ __('روشن     ') }}</flux:radio>
                <flux:radio value="dark" icon="moon">{{ __(' تاریک') }}</flux:radio>
                <flux:radio value="system" icon="computer-desktop">{{ __('سیستم') }}</flux:radio>
            </flux:radio.group>
        </div>

    </x-settings.layout>


</div>
