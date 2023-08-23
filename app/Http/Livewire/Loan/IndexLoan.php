<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Loan;

class IndexLoan extends Component
{
    public function render()
    {
        $loans = Loan::with('customer', 'user')->get();
        return view('livewire.loan.index-loan', [
            'loans' => $loans
        ]);
    }
}
