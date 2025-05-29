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
    <div class="bg-zinc-200 dark:bg-zinc-600 dark:text-zinc-300 mx-auto py-3 max-w-[660px] relative">
        <p class="font-semibold text-center">{{__('لیست کارگاههای آموزشگاه')}} <b>{{$institute->short_name}}</b></p>
        <livewire:institutes.classrooms.create :id="$id"/>
    </div>
    <div class="overflow-x-auto mt-1">
        <table class="text-xs sm:text-sm text-center mx-auto sm:w-[660px] w-[540px]">
            <tr class="h-10 bg-zinc-100 dark:bg-zinc-700 dark:text-zinc-400 ">
                <th class="font-semibold border dark:border-zinc-600 w-[40px]">{{__('#')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[120px] w-[100px]">{{__('نام کارگاه')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('ظرفیت')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('کارگاه فعال؟')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('تاریخ درج')}}</th>
                <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('تاریخ ویرایش')}}</th>
                <th class="border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('عملیات')}}</th>
            </tr>
            @foreach($institute->classrooms as $classroom)
                <tr class="h-12 dark:text-zinc-300">
                    <td class="border dark:border-zinc-600">{{$classroom->id}}</td>
                    <td class="border dark:border-zinc-600">{{$classroom->name}}</td>
                    <td class="border dark:border-zinc-600">{{$classroom->capacity}}</td>
                    <td class="border dark:border-zinc-600">{{$classroom->active}}</td>
                    <td class="border dark:border-zinc-600">
                        {{substr($classroom -> created, 0, 10)}}
                        <hr class="dark:border-zinc-600">
                        {{substr($classroom -> created, 11, 5)}}
                    </td>

                    <td class="border dark:border-zinc-600">
                        {{substr($classroom -> updated, 0, 10)}}
                        <hr class="dark:border-zinc-600">
                        {{substr($classroom -> updated, 11, 5)}}
                    </td>
                    <td class="border dark:border-zinc-600">
                        <a href="{{route('institute.classrooms.index', ['id' => $institute->id])}}">{{__('کارگاهها')}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
