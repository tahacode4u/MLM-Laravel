<?php

namespace App\Http\Livewire;

use DB;
use Livewire\Component;
use App\Models\Commissions as UserCommission;
use Livewire\WithPagination;


class Commissions extends Component
{
    use WithPagination;

    public function render()
    {
        $commissions = (auth()->user()->user_level == 1) ? DB::table('commissions')->paginate(10):UserCommission::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.commissions', ['commissions', $commissions]);
    }
}
