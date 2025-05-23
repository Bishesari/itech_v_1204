<?php

use App\Models\Institute;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $institutes;

    public function mount(): void
    {
        $this->get_institutes();
    }

    #[On('institute-created')]
    public function get_institutes(): void
    {
        $this->institutes = Institute::all();
    }
}; ?>

<section class="w-full">
    <div class="bg-slate-100 dark:bg-slate-900 mx-auto py-3 max-w-[990px] relative">
        <p class="font-semibold text-center">{{__('لیست آموزشگاهها')}}</p>
        <livewire:institutes.create />
    </div>
    <div class="overflow-x-auto mt-1">
        <table class="text-xs sm:text-sm text-center mx-auto sm:w-[990px] w-[800px]">
            <tr class="h-10 bg-slate-100 dark:text-slate-300 dark:bg-slate-900 ">
                <th class="font-semibold border dark:border-slate-600 w-[40px]">{{__('#')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[120px] w-[100px]">{{__('نام کوتاه')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[250px] w-[200px]">{{__('نام کامل')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[90px] w-[70px]">{{__('نام اختصاری')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[90px] w-[70px]">{{__('مانده اعتبار')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[100px] w-[80px]">{{__('لوگو')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[100px] w-[80px]">{{__('تاریخ درج')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[100px] w-[80px]">{{__('تاریخ ویرایش')}}</th>
                <th class="border dark:border-slate-600 sm:w-[100px] w-[80px]">{{__('عملیات')}}</th>
            </tr>
            @foreach($institutes as $institute)
                <tr class="h-12 dark:text-slate-300 dark:bg-slate-800">
                    <td class="border dark:border-slate-600">{{$institute->id}}</td>
                    <td class="border dark:border-slate-600">{{$institute->short_name}}</td>
                    <td class="border dark:border-slate-600">{{$institute->full_name}}</td>
                    <td class="border dark:border-slate-600">{{$institute->abb}}</td>
                    <td class="border dark:border-slate-600">{{$institute->remain_credit}}</td>
                    <td class="border dark:border-slate-600">{{$institute->logo_url}}</td>
                    <td class="border dark:border-slate-600">
                        {{substr($institute['created'], 0, 10)}}
                        <hr class="dark:border-slate-600">
                        {{substr($institute['created'], 11, 5)}}
                    </td>
                    <td class="border dark:border-slate-600">{{$institute->updated}}</td>
                    <td class="border dark:border-slate-600">
                        <a href="{{route('institute.classrooms.index', ['id' => $institute->id])}}">{{__('کارگاهها')}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
