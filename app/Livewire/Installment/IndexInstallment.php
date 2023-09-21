<?php

namespace App\Livewire\Installment;

use Livewire\Component;
use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class IndexInstallment extends Component
{
    public $s;
    public $perPage = 10;
    protected $queryString = ['s' => ['except' => '']];

    public $listeners = ['installments-updated' => 'render', 'installment-deleted' => 'render'];

    public function render() : \Illuminate\View\View
    {
        $installments =Installment::with('loan.customer', 'user')
        ->where('loan_id', 'like', '%'.$this->s.'%')
        ->latest()
        ->get()
        ->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d');
        });

        return view('livewire.installment.index-installment', compact('installments'));
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }
}
