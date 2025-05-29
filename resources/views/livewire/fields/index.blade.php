<?php

use App\Models\Field;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $fields;

    public function mount(): void
    {
        $this->get_fields();
    }

    #[On('field-created')]
    public function get_fields(): void
    {
        $this->fields = Field::all();
    }

}; ?>

<div>
    <section class="w-full">
        <div class="bg-zinc-200 dark:bg-zinc-600 dark:text-zinc-300 mx-auto py-3 max-w-[990px] relative">
            <p class="font-semibold text-center">{{__('لیست رشته های آموزشی')}}</p>
{{--            <livewire:institutes.create />--}}
        </div>
        <div class="overflow-x-auto mt-1">
            <table class="text-xs sm:text-sm text-center mx-auto sm:w-[990px] w-[800px]">
                <tr class="h-10 bg-zinc-100 dark:bg-zinc-700 dark:text-zinc-400 ">
                    <th class="font-semibold border dark:border-zinc-600 w-[40px]">{{__('#')}}</th>
                    <th class="font-semibold border dark:border-zinc-600 sm:w-[120px] w-[100px]">{{__('نام رشته')}}</th>
                    <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('تاریخ درج')}}</th>
                    <th class="font-semibold border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('تاریخ ویرایش')}}</th>
                    <th class="border dark:border-zinc-600 sm:w-[100px] w-[80px]">{{__('عملیات')}}</th>
                </tr>
                @foreach($fields as $field)
                    <tr class="h-12 dark:text-zinc-300">
                        <td class="border dark:border-zinc-600">{{$field->id}}</td>
                        <td class="border dark:border-zinc-600">{{$field->name_fa}}</td>
                        <td class="border dark:border-zinc-600">
                            {{substr($field['created'], 0, 10)}}
                            <hr class="dark:border-slate-600">
                            {{substr($field['created'], 11, 5)}}
                        </td>
                        <td class="border dark:border-zinc-600">{{$field->updated}}</td>
                        <td class="border dark:border-zinc-600">
{{--                            <a href="{{route('institute.classrooms.index', ['id' => $field->id])}}">{{__('کارگاهها')}}</a>--}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

</div>
