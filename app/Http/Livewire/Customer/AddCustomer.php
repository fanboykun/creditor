<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use App\Models\Installment;
use App\Models\Loan;
use Livewire\Component;

class AddCustomer extends Component
{
    public function render()
    {
        return view('livewire.customer.add-customer');
    }

    public function addNewCustomer()
    {
        // $this->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:customers',
        //     'phone' => 'required|numeric',
        //     'address' => 'required',
        // ]);

        // $customer = new Customer();
        // $customer->name = $this->name;
        // $customer->email = $this->email;
        // $customer->phone = $this->phone;
        // $customer->address = $this->address;
        // $customer->save();

        // session()->flash('message', 'Customer has been created successfully!');
        // $this->resetInputFields();
        // $this->emit('customerAdded');

        $customer = Customer::create([
            'user_id' => auth()->user()->id,
            'name' => 'the name of the customer again',
            'email' => 'the@email.customeragain',
            'phone' => '084562589551',
            'address' => 'the address of the customer again',
            'card_number' => '1234567877888',
        ]);
        $loan = Loan::create([
            'user_id' => auth()->user()->id,
            'customer_id' => $customer->id,
            'amount' => 10000,
            'interest' => 10,
            'duration' => 10,
            'start_date' => now(),
            'end_date' => now()->addDays(10),
        ]);
        for ($i = 0; $i < 10; $i++){
            $installment = Installment::create([
                'user_id' => auth()->user()->id,
                'loan_id' => $loan->id,
                'amount' => 100,
                'date' => now(),
                'status' => 'pending',
            ]);
        }
        session()->flash('message', 'Customer has been created successfully!');
    }
}
