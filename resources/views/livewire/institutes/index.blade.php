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
        <table class="text-sm text-center mx-auto w-[1050px]">
            <tr>
                <th class="border w-[50px]">{{__('#')}}</th>
                <th class="border w-[100px]">{{__('نام کوتاه')}}</th>
                <th class="border w-[250px]">{{__('نام کامل')}}</th>
                <th class="border w-[150px]">{{__('نام اختصاری')}}</th>
                <th class="border w-[150px]">{{__('مانده اعتبار')}}</th>
                <th class="border w-[150px]">{{__('لوگو')}}</th>
                <th class="border w-[100px]">{{__('تاریخ درج')}}</th>
                <th class="border w-[100px]">{{__('تاریخ ویرایش')}}</th>
            </tr>
            @foreach($institutes as $institute)
            <tr>
                <td class="border">{{$institute->id}}</td>
                <td class="border">{{$institute->short_name}}</td>
                <td class="border">{{$institute->full_name}}</td>
                <td class="border">{{$institute->abb}}</td>
                <td class="border">{{$institute->remain_credit}}</td>
                <td class="border">{{$institute->logo_url}}</td>
                <td class="border">{{$institute->created}}</td>
                <td class="border">{{$institute->updated}}</td>
            </tr>
            @endforeach
        </table>





    </x-institutes.layout>
</section>
