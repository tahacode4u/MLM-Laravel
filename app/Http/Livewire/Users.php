<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class Users extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::where('user_level', 0)->paginate(10);
        return view('livewire.users', ['users' => $users]);
    }
}
