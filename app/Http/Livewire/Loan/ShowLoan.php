<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Loan;

class ShowLoan extends Component
{
    public Loan $loan;

    public function render()
    {
        $this->loan->load('customer', 'installments');
        return view('livewire.loan.show-loan');
    }
}
