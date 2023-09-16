<?php

namespace App\Http\Livewire\Loan;

use App\Models\Installment;
use Livewire\Component;
use App\Models\Loan;

class ShowLoan extends Component
{
    public Loan $loan;

    public $s;

    public $start_date;
    public $end_date;
    public $status;
    public $note = '';
    public $duration;
    public $amount;
    public $interest;

    public function mount(Loan $loan)
    {
        $this->start_date = $loan->start_date;
        $this->end_date = $loan->end_date;
        $this->amount = $loan->amount;
        $this->note = $loan->note;
        $this->duration = $loan->duration;
        $this->interest = $loan->interest;
    }

    public function render()
    {
        $this->loan->load('customer');
        $installments = Installment::where('loan_id', $this->loan->id)
        ->where('id', 'like', '%'.$this->s.'%')
        ->latest()
        ->get();
        return view('livewire.loan.show-loan', ['installments' => $installments]);
    }

    public function destroyLoan() : void
    {
        $this->validate(['loan.id' => 'required|exists:loans,id']);
        $this->dispatchBrowserEvent('close-modal');
    }
}
