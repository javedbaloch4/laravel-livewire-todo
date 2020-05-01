<?php

namespace App\Http\Livewire;

use App\Counter;
use Livewire\Component;

class Count extends Component
{

    public $counter;

    public function mount(Counter $c) {

        $this->counter = $c->first()->counter;
    }

    public function increment(Counter $c) {
        $c->first();
        $c->counter = 2;
        $c->save();
    }

    public function decrement() {

    }



    public function render()
    {
        return view('livewire.count');
    }
}
