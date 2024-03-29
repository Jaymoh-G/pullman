<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.user-component', ['users' => $users])->layout('layouts.base');
    }
}
