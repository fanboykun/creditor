<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

class ShowCustomer extends Component
{
    public $customer;

    public $name, $address, $card_number, $phone, $birth_date;

    public function mount($customer) : void
    {
        $this->customer = Customer::where('id', $customer)->withCount('loans')->first();
        $this->name = $this->customer->name;
        $this->address = $this->customer->address;
        $this->card_number = $this->customer->card_number;
        $this->birth_date = $this->customer->birth_date;
    }

    public function render() : View
    {
        return view('livewire.customer.show-customer');
    }

    public function deleteCustomer()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('open-modal', 'delete-customer');
    }

    public function destroyCustomer()
    {
        $this->dispatchBrowserEvent('close-modal');
    }
}
