<?php

use App\Models\Classroom;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    #[Locked]
    public $id;
    #[Validate('required|min:2')]
    public string $name = '';
    #[Validate('required|numeric')]
    public string $capacity = '';


    public function create_classroom(): void
    {
        $this->validate();
        Classroom::create([
            'institute_id' => $this->id,
            'name' => $this->name,
            'capacity' => $this->capacity,
            'created' => j_d_stamp_en()
        ]);
        $this->modal('create_classroom')->close();
        $this->dispatch('classroom-created');
    }
}; ?>
<section class="absolute left-1 top-2">
    <flux:modal.trigger name="create_classroom">
        <flux:button variant="ghost" class="cursor-pointer" size="sm" x-data=""
                     x-on:click.prevent="$dispatch('open-modal', 'create_classroom')">
            <flux:icon.folder-plus class="text-green-500"/>
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="create_classroom" :show="$errors->isNotEmpty()" focusable class="w-80 md:w-96"
                :dismissible="false">
        <form wire:submit="create_classroom" class="flex flex-col gap-6" autocomplete="off">
            <div>
                <flux:heading size="lg">{{ __('درج کارگاه جدید') }}</flux:heading>
            </div>
            <flux:input wire:model="name" :label="__('نام کارگاه')" type="text" class:input="text-center"
                        maxlength="20" required autofocus/>
            <flux:input wire:model="capacity" :label="__('ظرفیت')" type="text" class:input="text-center" required/>

            <div class="flex justify-between space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled" class="cursor-pointer">{{ __('انصراف') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="primary" type="submit" class="cursor-pointer">{{ __('ثبت') }}</flux:button>
            </div>
        </form>
    </flux:modal>
</section>
