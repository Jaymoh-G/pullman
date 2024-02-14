<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class WhatWeDo extends Component
{
    public $title;

    public function mount()
    {
        $this->title = "What we do";
    }
    public function render()
    {
        return view('livewire.frontend.what-we-do', ['title'=>$this->title])->layout('layouts.web',['activePage'=>'whatWeDo']);
    }
}
