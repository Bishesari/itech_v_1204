<?php

use App\Models\Institute;
use Livewire\Volt\Component;

new class extends Component {
    public string $short_name = '';
    public string $full_name = '';
    public string $abb = '';

    public function create_institute()
    {
        Institute::create([
            'short_name' => $this->short_name,
            'full_name' => $this->full_name,
            'abb' => $this->abb,
            'created' => j_d_stamp_en()
        ]);
        $this->modal('create_institute')->close();
        $this->dispatch('institute-created');

    }

}; ?>
<section class="absolute left-1 top-2">
    <flux:modal.trigger name="create_institute">
        <flux:button variant="ghost" class="cursor-pointer" size="sm" x-data=""
                     x-on:click.prevent="$dispatch('open-modal', 'create_institute')">
            <flux:icon.folder-plus class="text-green-500"/>
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="create_institute" :show="$errors->isNotEmpty()" focusable class="w-80 md:w-96" :dismissible="false">
        <form wire:submit="create_institute" class="flex flex-col gap-6">
            <div>
                <flux:heading size="lg">{{ __('درج آموزشگاه جدید') }}</flux:heading>
            </div>
            <flux:input wire:model="short_name" :label="__('نام کوتاه')" type="text" class:input="text-center"
                        maxlength="25" required autofocus/>
            <flux:input wire:model="full_name" :label="__('نام کامل')" type="text" class:input="text-center"
                        maxlength="25" required/>
            <flux:input wire:model="abb" :label="__('نشان اختصاری')" type="text" class:input="text-center"
                        maxlength="3" style="direction:rtl" required/>

            <div class="flex justify-between space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled" class="cursor-pointer">{{ __('Cancel') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="primary" type="submit" class="cursor-pointer">{{ __('ثبت') }}</flux:button>
            </div>
        </form>
    </flux:modal>
</section>
