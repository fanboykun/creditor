<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Installment;

class ListInstallment extends Component
{
    public Customer $customer;
    public $s;

    public $listeners = ['installments-updated' => 'render', 'installment-deleted' => 'render'];

    public function render()
    {
        $this->customer->load(['loans' => function ($query){
            $query->where('id', 'like', '%'.$this->s.'%')
            ->with('installments');
        }])->orderBy('loans.id')->groupBy('loans.id');
        return view('livewire.customer.list-installment');
    }

    public function checkActiveLoan()
    {
        $active_loan = $this->customer->loans->filter(function ($val, $key){
            return $val->status == false;
        })->first();
        if($active_loan == null){
            $this->dispatch('open-modal', 'loan-active-doesnt-exist');
        }else{
            $url = '/customers/'.$this->customer->id.'/loans/'.$active_loan->id.'/pay-installment';
            return $this->redirect($url, navigate: true);
        }
    }
}
