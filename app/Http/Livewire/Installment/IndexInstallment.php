<?php

namespace App\Http\Livewire\Installment;

use App\Models\Customer;
use Livewire\Component;
use App\Models\Installment;
use Illuminate\Support\Facades\DB;

class IndexInstallment extends Component
{
    public $s;
    protected $perPage = 10;
    protected $queryString = ['s' => ['except' => '']];

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
