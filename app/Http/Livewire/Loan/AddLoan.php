<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;

class AddLoan extends Component
{
    public function render() : \Illuminate\View\View
    {
        return view('livewire.loan.add-loan');
    }
}
