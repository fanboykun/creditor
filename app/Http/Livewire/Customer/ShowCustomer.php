<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;

class ShowCustomer extends Component
{
    public Customer $customer;
    
    public function render()
    {
        return view('livewire.customer.show-customer');
    }
}
