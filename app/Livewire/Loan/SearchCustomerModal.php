<?php

namespace App\Livewire\Loan;

use Livewire\Component;
use App\Models\Customer;

class SearchCustomerModal extends Component
{
    public int $perPage = 10;
    public string $search = '';

    public bool $status =  false;

    public function mount(bool $status = false)
    {
        $this->status = $status;
    }

    public function render()
    {
        $customers = Customer::where(function($query){
            $query->where('id', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('card_number', 'like', '%'.$this->search.'%');
        })
        ->whereDoesntHave('loans', function($q){
            $q->where('status', $this->status);
        })
        ->paginate($this->perPage);
        return view('livewire.loan.search-customer-modal', compact('customers'));
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }

    public function selectCustomer(int $customer) : void
    {
        $this->dispatch('customerSelected', $customer);
        $this->search = '';
        $this->dispatch('close');
    }

}
