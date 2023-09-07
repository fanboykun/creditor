<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

class ShowCustomer extends Component
{
    public $customer;

    public function mount($customer) : void
    {
        $this->customer = Customer::where('id', $customer)->withCount('loans')->first();
    }

    public function render() : View
    {
        return view('livewire.customer.show-customer');
    }
}
