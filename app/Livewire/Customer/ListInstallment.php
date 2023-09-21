<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Installment;

class ListInstallment extends Component
{
    public Customer $customer;
    public $s;
    // public $selected_installment;

    public $listeners = ['installments-updated' => 'render', 'installment-deleted' => 'render'];

    public function render()
    {
        $this->customer->load('loans.installments')->groupBy('loans.id');
        return view('livewire.customer.list-installment');
    }
}
