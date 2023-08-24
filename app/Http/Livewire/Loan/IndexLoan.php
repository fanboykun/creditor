<?php

namespace App\Http\Livewire\Loan;

use Livewire\Component;
use App\Models\Loan;

class IndexLoan extends Component
{
    public int $perPage = 10;
    public string $s = '';
    protected $queryString = ['s' => ['except' => '']];

    public function render() : \Illuminate\View\View
    {
        $loans = Loan::with('customer', 'user')->where('id', 'like', '%'.$this->s.'%')->paginate($this->perPage);
        return view('livewire.loan.index-loan', [
            'loans' => $loans
        ]);
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }
}
