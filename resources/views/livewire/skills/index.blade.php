<?php

use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $skills;

    public function mount(): void
    {
        $this->getSkills();
    }

    #[On('institute-created')]
    public function getSkills(): void
    {
        $this->skills = Skill::all();
    }
}; ?>
<section class="w-full">
    <div class="bg-zinc-200 dark:bg-zinc-600 dark:text-zinc-300 mx-auto py-3 max-w-[990px] relative">
        <p class="font-semibold text-center">{{__('لیست آموزشگاهها')}}</p>
        <livewire:institutes.create />
    </div>
    <div class="overflow-x-auto mt-1">
        <table class="text-xs sm:text-sm text-center mx-auto sm:w-[990px] w-[800px]">
            <tr class="h-10 bg-zinc-100 dark:bg-zinc-700 dark:text-zinc-400 ">
                <th class="font-semibold border dark:border-zinc-600 w-[40px]">{{__('#')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[150px] w-[130px]">{{__('رشته')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[250px] w-[200px]">{{__('حرفه')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[90px] w-[70px]">{{__('نام اختصاری')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[90px] w-[70px]">{{__('نام لاتین حرفه')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('لوگو')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('تاریخ درج')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('تاریخ ویرایش')}}</th>
                <th class="border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('عملیات')}}</th>
            </tr>
            @foreach($skills as $row)
                <tr class="h-12 dark:text-zinc-300 dark:hover:bg-zinc-900 hover:bg-zinc-100">
                    <td class="border dark:border-zinc-600">{{$row->id}}</td>
                    <td class="border dark:border-zinc-600">{{$row->field->name_fa}}</td>
                    <td class="border dark:border-zinc-600">{{$row->name_fa}}</td>
                    <td class="border dark:border-zinc-600">{{$row->abb}}</td>
                    <td class="border dark:border-zinc-600">{{$row->name_en}}</td>
                    <td class="border dark:border-zinc-600">{{$row->logo_url}}</td>
                    <td class="border dark:border-zinc-600">
                        {{substr($row['created'], 0, 10)}}
                        <hr class="dark:border-slate-600">
                        {{substr($row['created'], 11, 5)}}
                    </td>
                    <td class="border dark:border-zinc-600">{{$row->updated}}</td>
                    <td class="border dark:border-zinc-600">
                        <a href="{{route('institute.classrooms.index', ['id' => $row->id])}}">{{__('کارگاهها')}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
