<?php

use App\Models\Institute;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    #[Locked]
    public $id;
    public $institute;

    public function mount()
    {
        $this->get_institute();
    }

    #[On('classroom-created')]
    public function get_institute(): void
    {
        $this->institute = Institute::find($this->id);
    }
}; ?>


<section class="w-full">
    <div class="bg-gray-100 mx-auto py-3 max-w-[990px] relative">
        <p class="font-semibold text-center">{{__('لیست کارگاههای آموزشگاه')}} <b>{{$institute->short_name}}</b></p>
        <livewire:institutes.classrooms.create :id="$id"/>
    </div>
    <div class="overflow-x-auto mt-1">
        <table class="text-xs sm:text-sm text-center mx-auto sm:w-[990px] w-[800px]">
            <tr class="h-10 bg-slate-100 dark:text-slate-300 dark:bg-slate-900 ">
                <th class="font-semibold border dark:border-slate-600 w-[40px]">{{__('#')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[120px] w-[100px]">{{__('نام کارگاه')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[250px] w-[200px]">{{__('ظرفیت')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[90px] w-[70px]">{{__('کارگاه فعال؟')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[100px] w-[80px]">{{__('تاریخ درج')}}</th>
                <th class="font-semibold border dark:border-slate-600 sm:w-[100px] w-[80px]">{{__('تاریخ ویرایش')}}</th>
                <th class="border dark:border-slate-600 sm:w-[100px] w-[80px]">{{__('عملیات')}}</th>
            </tr>
            @foreach($institute->classrooms as $classroom)
                <tr class="h-12 dark:text-slate-300 dark:bg-slate-800">
                    <td class="border dark:border-slate-600">{{$classroom->id}}</td>
                    <td class="border dark:border-slate-600">{{$classroom->name}}</td>
                    <td class="border dark:border-slate-600">{{$classroom->capacity}}</td>
                    <td class="border dark:border-slate-600">{{$classroom->active}}</td>
                    <td class="border dark:border-slate-600">
                        {{substr($classroom -> created, 0, 10)}}
                        <hr class="dark:border-slate-600">
                        {{substr($classroom -> created, 11, 5)}}
                    </td>

                    <td class="border dark:border-slate-600">
                        {{substr($classroom -> updated, 0, 10)}}
                        <hr class="dark:border-slate-600">
                        {{substr($classroom -> updated, 11, 5)}}
                    </td>
                    <td class="border dark:border-slate-600">
                        <a href="{{route('institute.classrooms.index', ['id' => $institute->id])}}">{{__('کارگاهها')}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
