<?php

namespace App\Http\Livewire\Loan;

use App\Models\Customer;
use Livewire\Component;

class AddLoan extends Component
{
    public $customer_id;
    public $amount;
    public $interest_rate;
    public $duration;
    public $start_date;
    public $end_date;
    public $status;
    public $note;

    protected $rules = [
        'customer_id' => 'required',
        'amount' => 'required',
        'interest_rate' => 'required',
        'duration' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'status' => 'required',
    ];

    public function render() : \Illuminate\View\View
    {
        return view('livewire.loan.add-loan');
    }

    public function addNewLoan() : void
     {

    }
}
