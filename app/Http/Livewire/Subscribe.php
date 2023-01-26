<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Subscribe extends Component
{

    public $background_color = 'EEEEEE';

    public $listeners = ['myEvent' => 'changeBackgroundColor'];

    public function changeBackgroundColor()
    {
        ray($this->value);
        if ($this->value == 0) {
//            $this->background_color = sprintf('%06X', mt_rand(0, 0xFFFFFF));
            $this->background_color = 'FFFFFF';
            $this->value = 0;
        } else {
            $this->background_color = 'EEEEEE';
            $this->value = 1;
        }

    }

//
    public function render()
    {
//        $articles = Article::where('title', 'like', "%{$this->search}%")->take(10)->get();

        return view('livewire.subscribe');
    }
}


