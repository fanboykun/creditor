<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;

class ListInstallment extends Component
{
    public Customer $customer;

    public function render()
    {
        $this->customer->load('loans.installments');
        return view('livewire.customer.list-installment');
    }
}
