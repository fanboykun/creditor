<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class AddCustomer extends Component
{
    public $name, $phone, $address, $card_number, $birth_date;

    public function render()
    {
        return view('livewire.customer.add-customer');
    }

    public function addNewCustomer()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|min:10',
            'address' => 'required|string|max:255',
            'card_number' => 'required|numeric|min:10',
            'birth_date' => 'nullable|date',
        ]);

        $customer = new Customer();
        $customer->user_id = auth()->user()->id;
        $customer->name = $this->name;
        $customer->phone = $this->phone;
        $customer->address = $this->address;
        $customer->card_number = $this->card_number;
        $customer->save();

        session()->flash('message', 'Customer has been created successfully!');
        $this->resetInputFields();
        return redirect()->route('customers.index');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->address = '';
        $this->card_number = '';
    }
}
