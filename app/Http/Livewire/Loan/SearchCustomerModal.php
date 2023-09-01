<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Customer;

class SearchCustomerModal extends Component
{
    public int $perPage = 10;
    public string $search = '';

    public function render()
    {
        $customers = Customer::where(function($query){
            $query->where('id', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('card_number', 'like', '%'.$this->search.'%');
        })->paginate($this->perPage);
        return view('livewire.loan.search-customer-modal', compact('customers'));
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }

    public function selectCustomer(int $customer) : void
    {
        $this->emit('customerSelected', $customer);
        $this->search = '';
        $this->dispatchBrowserEvent('close');
    }

}
