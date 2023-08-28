<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Loan;

class IndexLoan extends Component
{
    public int $perPage = 10;
    public string $s = '';
    protected $queryString = ['s' => ['except' => '']];
    public int $totalAmount = 0;
    public int $totalAmountWithInterest = 0;
    public int $profitProjection = 0;

    public function render() : \Illuminate\View\View
    {
        $this->totalAmount = Loan::sum('amount');
        $this->totalAmountWithInterest = Loan::sum('total');
        $this->profitProjection = $this->totalAmountWithInterest - $this->totalAmount;
        $loans = Loan::with('customer', 'user')->where('id', 'like', '%'.$this->s.'%')->latest()->paginate($this->perPage);
        return view('livewire.loan.index-loan', [
            'loans' => $loans
        ]);
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }
}
