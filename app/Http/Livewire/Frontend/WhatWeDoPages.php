<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Publication;
use App\Models\WhatWeDo;

class WhatWeDoPages extends Component
{

    public $publications;
    public $slug;
    public $whatWeDos;

    public function mount($slug){
        $this->slug = $slug;
        $this->whatWeDos = WhatWeDo::where('slug', $this->slug)->first();
        $this->publications = Publication::where('category_names', 'like', "%{$this->whatWeDos->title}%")->take(5)->get();
    }
    public function render(){
        return view('livewire.frontend.what-we-do-pages')->layout('layouts.web',['activePage'=>'whatWeDo']);
    }
}
