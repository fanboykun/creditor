<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Installment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class PayInstallment extends Component
{
    public Customer $customer;
    public Loan $loan;

    public string $customer_info;

    public $amount;

    public function render()
    {
        $this->loan->load('installments');
        $this->customer_info = '('.$this->customer->id.')'.'-'.$this->customer->name;
        return view('livewire.customer.pay-installment');
    }

    public function addNewInstallment() : Redirector|RedirectResponse
    {
        $loan = $this->loan;
        $this->validate([
            'amount' => 'numeric|required|min:100000|max:'.$this->loan->remaining.''
        ], [
            'amount.required' => 'The amount field is required',
            'amount.numeric' => 'The amount field must the amount of money to pay',
            'amount.min' => 'The amount to pay must not lower than Rp 100.000',
            'amount.max' => 'The amount to pay must not greater than Rp '.number_format($this->loan->remaining, 0, ',', '.').'',
        ]);
        try{
            DB::transaction(function() use($loan){
                Installment::create([
                    'user_id' => @auth()->id(),
                    'loan_id' => $loan->id,
                    'amount' => (int) $this->amount
                ]);
                Loan::where('id', $loan->id)->update([
                    'paid' => (int) ($loan->paid + $this->amount),
                    'remaining' => (int) ($loan->remaining - $this->amount),
                    'status' => (bool) ($loan->total == ($loan->paid + $this->amount)),
                    'updated_at' => now()
                ]);
            });
        }catch(\Exception $e){
            throw($e);
        }
        return redirect()->route('installments.index')->with('success', 'Installment has been created successfully!');
    }
}
