<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MarketingLevel;

class Marketinglevels extends Component
{
    use WithPagination;

    protected $isAddForm;

    protected $rules = [
        'level_name' => 'required|min:3',
        'percentage' => 'required|numeric|between:1:100'
    ];
    
    public function render()
    {
        $levels = MarketingLevel::paginate(10);
        return view('livewire.marketinglevels', ['levels' => $levels]);
    }

    public function isAddFormFunction()
    {
        $this->isAddForm = true;
    }
}
