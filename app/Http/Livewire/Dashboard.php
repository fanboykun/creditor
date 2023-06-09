<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;

class Dashboard extends Component
{
    public $customers_count;
    public $loans_total;
    public $paid_installments;
    public $remaining_installments;

    public function mount()
    {
        $this->customers_count = Customer::count();
        $this->loans_total = Loan::sum('amount');
        $this->paid_installments = Loan::sum('paid');
        $this->remaining_installments = Loan::sum('remaining');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
