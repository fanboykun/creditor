<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class IndexCustomer extends Component
{
    public string $s = '';
    protected $perPage = 10;
    protected $queryString = ['s' => ['except' => '']];
    public string $tab = 'grid';

    public function render() : \Illuminate\View\View
    {
        $customers = Customer::where('name', 'like', '%'.$this->s.'%')
        ->orWhere('phone', 'like', '%'.$this->s.'%')
        ->with('loans', function($query) {
            $query->inactive();
        })
        ->latest()
        ->paginate($this->perPage);
        return view('livewire.customer.index-customer', ['customers' => $customers]);
    }

    public function checkActiveLoan(Customer $customer)
    {
        $customer->load(['loans' => function ($q){
            $q->where('status', false);
        }]);
        if($customer->loans->first() != null){
            $this->dispatch('open-modal', 'loan-active-exist');
        }else{
            $url = '/customers/'.$customer->id.'/new-loan';
            return $this->redirect($url, navigate: true);
            // return redirect()->route('customers.new-loan', $customer);
        }
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }
}
