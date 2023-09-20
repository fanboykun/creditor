<?php

namespace App\Http\Livewire\Installment;

use App\Models\Customer;
use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Redirector;

class AddInstallment extends Component
{
    public $customer;
    protected $listeners = ['customerSelected' => 'setCustomer'];
    public $selected_customer_info;
    public $selected_loan;
    public $amount;

    public function render()
    {
        return view('livewire.installment.add-installment');
    }

    public function setCustomer(Customer $customer) : void
    {
        $this->customer = $customer->load(['loans' => function ($query){
            $query->where('status', false);
        }]);
        $this->selected_customer_info =  '(' .$customer->id .')'. ' ' . $customer->name . ' - ' . $customer->card_number;
    }

    public function setLoan($loan_id) :void
    {
        $this->selected_loan = Loan::where('id', $loan_id)->with('installments', function($q){
            $q->limit(10);
        })->first();
        $this->dispatchBrowserEvent('loan-selected');
    }

    public function saveInstallment() : Redirector|RedirectResponse
    {
        $this->validate([
            'selected_customer_info' => 'required|string',
            'selected_loan.id' => 'required|integer',
        ], [
            'selected_customer_info.required' => 'mohon pilih nasabah terlebih dahulu',
            'selected_loan.id.required' => 'mohon pilih pinjaman dari nasabah yang telah dipilih terlebih dahulu',
        ]);
        $this->validate([
            'amount' => 'required|numeric|min:100000|max:'.$this->selected_loan->remaining.''
        ], [
            'amount.required' => 'mohon isi jumlah dari pembayaran',
            'amount.min' => 'minimal nominal pembayaran adalah Rp 100.000',
            'amount.max' => 'maksimal pembayaran adalah Rp '.number_format($this->selected_loan?->remaining, 0, ',', '.').''
        ]);

        try{
            $loan = $this->selected_loan;
            DB::transaction(function() use($loan){
                Installment::create([
                    'user_id' => @auth()->id(),
                    'loan_id' => $loan->id,
                    'amount' => $this->amount
                ]);
                Loan::where('id', $loan->id)->update([
                    'paid' => (float) ($loan->paid + $this->amount),
                    'remaining' => (float) ($loan->remaining - $this->amount),
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
