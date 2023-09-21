<?php

namespace App\Livewire\Loan;

use Livewire\Component;
use App\Models\Customer;

class SearchCustomerModal extends Component
{
    public int $perPage = 10;
    public $search;

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
        ->when($this->status == true, function ($que){
            $que->whereHas('loans', function ($q){
                $q->where('status', false);
            });
        }, function ($que){
            $que->whereDoesntHave('loans', function($q){
                $q->where('status', false);
            });
        })
        ->paginate($this->perPage);
        return view('livewire.loan.search-customer-modal', ['customers' => $customers]);
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
