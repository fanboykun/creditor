<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class AddNewLoan extends Component
{
    public Customer $customer;
    
    public function render()
    {
        return view('livewire.customer.add-new-loan');
    }
}
