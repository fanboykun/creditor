<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;

class ListLoan extends Component
{
    public Customer $customer;

    public function render()
    {
        $this->customer->load('loans');
        return view('livewire.customer.list-loan');
    }
}
