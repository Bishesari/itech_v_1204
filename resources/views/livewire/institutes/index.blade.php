<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('livewire.institutes.heading')
    <x-institutes.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">

    </x-institutes.layout>
</section>
