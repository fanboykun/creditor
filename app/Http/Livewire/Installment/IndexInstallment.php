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

    public function render()
    {
        $installments = Installment::with('loan.customer', 'user')
        ->where('loan_id', 'like', '%'.$this->s.'%')
        ->latest()
        ->paginate($this->perPage);


        // $installments = DB::table('installments')
        // ->join('loans', 'installments.loan_id', '=', 'loans.id')
        // ->join('customers', 'loans.customer_id', '=', 'customers.id')
        // ->join('users', 'installments.user_id', '=', 'users.id')
        // ->select('installments.*','loans.amount as loan_amount', 'loans.id', 'customers.id as customer_id', 'customers.name as customer_name', 'users.name as creator_name')
        // ->groupByRaw('installments.id, loans.amount, loans.id, customers.id, customers.name, users.name')
        // ->paginate(10);

        // $installments = Customer::with('loans.installments.user')->paginate(10);


        // dd($installments);
        return view('livewire.installment.index-installment', compact('installments'));
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
