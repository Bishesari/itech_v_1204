<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>حذف حساب کاربری</flux:heading>
        <flux:subheading>حساب کاربری و تمامی منابع آن حذف خواهند شد</flux:subheading>
    </div>

    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            حذف حساب کاربری
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form wire:submit="deleteUser" class="space-y-6">
            <div>
                <flux:heading size="lg mx-1">آیا مطمئن هستید که می‌خواهید حساب کاربری خود را حذف کنید؟</flux:heading>

                <flux:subheading>
                    پس از حذف حساب کاربری، تمامی منابع و داده‌های آن به‌طور دائمی حذف خواهند شد. لطفاً رمز عبور خود را وارد کنید تا حذف حساب تایید شود.
                </flux:subheading>
            </div>

            <flux:input wire:model="password" :label="'رمز عبور'" type="password" />

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">لغو</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit">حذف حساب کاربری</flux:button>
            </div>
        </form>
    </flux:modal>
</section>
