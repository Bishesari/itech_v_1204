<?php

use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new class extends Component {
    #[Locked]
    public $id;
    public $institute;

    public function mount()
    {
        $this->get_institute();

    }

    public function get_institute()
    {
        $this->institute = \App\Models\Institute::find($this->id);
    }
}; ?>

<div>
    {{$institute->short_name}}
</div>
