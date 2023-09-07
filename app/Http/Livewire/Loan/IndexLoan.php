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

    public string|int|bool $filter_status = '';

    public function render() : \Illuminate\View\View
    {
        $this->totalAmount = Loan::sum('amount');
        $this->totalAmountWithInterest = Loan::sum('total');
        $this->profitProjection = $this->totalAmountWithInterest - $this->totalAmount;

        $loans = Loan::with('customer')
        ->when($this->filter_status != '', fn ($q) => $q->where('status', (bool) $this->filter_status ))
        ->where(function ($query){
            $query->where('id', 'like', '%'.$this->s.'%')
            ->orWhereHas('customer', fn ($query) => $query->where('name', 'like', '%'.$this->s.'%'));
        })
        ->orderBy('created_at', 'desc')
        ->orderBy('status', 'desc')
        ->paginate($this->perPage);

        return view('livewire.loan.index-loan', [
            'loans' => $loans
        ]);
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }
}
