<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ShowCustomer extends Component
{
    public $customer;

    public $name, $address, $card_number, $phone, $birth_date;
    protected $listeners = ['customer-updated' => '$refresh'];

    public function mount($customer) : void
    {
        $this->customer = Customer::where('id', $customer)->withCount('loans')->first();
        $this->name = $this->customer->name;
        $this->card_number = $this->customer->card_number;
        $this->phone = $this->customer->phone;
        $this->address = $this->customer->address;
        $this->birth_date = $this->customer->birth_date;
    }

    public function render() : View
    {
        return view('livewire.customer.show-customer');
    }

    public function updateCustomer()
    {
        $this->validate([
            'name' => 'required|string|max:150',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'card_number' => 'required|numeric|max_digits:30|unique:customers,card_number,'.$this->customer->id,
            'birth_date' => 'nullable|date',
        ]);
        try{
            Customer::where('id',$this->customer->id)->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'card_number' => $this->card_number,
                'birth_date' => $this->birth_date,
            ]);
            $this->dispatchBrowserEvent('close-modal');
            $this->resetInputField();
            $this->emitSelf('customer-updated');
        }catch(\Exception $e){
            throw($e);
        }
    }

    public function deleteCustomer()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('open-modal', 'delete-customer');
    }

    public function destroyCustomer()
    {
        try{
            DB::transaction(function(){
                Installment::whereHas('loan', function($q){
                    $q->where('customer_id', $this->customer->id);
                })->delete();
                Loan::where('customer_id', $this->customer->id)->delete();
                Customer::where('id',$this->customer->id)->delete();
            });
        }catch(\Exception $e){
            throw($e);
        }
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('customers.index')->with('success', 'Customer Deleted!');
    }

    private function resetInputField()
    {
        $this->name = '';
        $this->address = '';
        $this->card_number = '';
        $this->phone = '';
        $this->birth_date = '';
    }
}
