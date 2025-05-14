<?php

use App\Models\Institute;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $institutes;
    public function mount(): void
    {
        $this->get_institutes();
    }

    public function get_institutes(): void
    {
        $this->institutes = Institute::all();
    }
}; ?>

<section class="w-full">
    @include('livewire.institutes.heading')
    <x-institutes.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">

        @foreach($institutes as $institute)
            {{$id}}
        @endforeach

    </x-institutes.layout>
</section>
