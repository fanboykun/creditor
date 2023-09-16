<?php

namespace App\Http\Livewire\Loan;

use App\Models\Installment;
use Livewire\Component;
use App\Models\Loan;

class ShowLoan extends Component
{
    public Loan $loan;

    public $s;

    public function render()
    {
        $this->loan->load('customer');
        $installments = Installment::where('loan_id', $this->loan->id)
        ->where('id', 'like', '%'.$this->s.'%')
        ->get();
        return view('livewire.loan.show-loan', ['installments' => $installments]);
    }
}
