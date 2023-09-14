<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Installment;

class PayInstallment extends Component
{
    public Customer $customer;
    public Loan $loan;

    public string $customer_info;

    public $amount;

    public function render()
    {
        $this->loan->load('installments');
        $this->customer_info = '('.$this->customer->id.')'.'-'.$this->customer->name;
        return view('livewire.customer.pay-installment');
    }

    public function addNewInstallment() : void
    {

    }
}
