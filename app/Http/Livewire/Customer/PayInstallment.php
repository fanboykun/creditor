<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;

class PayInstallment extends Component
{
    public Customer $customer;
    public Loan $loan;

    public function render()
    {
        return view('livewire.customer.pay-installment');
    }
}
