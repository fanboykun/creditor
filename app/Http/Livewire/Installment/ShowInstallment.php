<?php

namespace App\Http\Livewire\Installment;

use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowInstallment extends Component
{
    public $selected_installment;
    public $amount;
    protected $listeners = ['show-installment-modal' => 'init'];

    public function render()
    {
        return view('livewire.installment.show-installment');
    }

    public function init(Installment $installment)
    {
        $this->selected_installment = $installment->load('loan');
        $this->dispatchBrowserEvent('open-modal', 'show-installment');
        $this->amount = $installment->amount;
    }

    public function openDeleteModal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->emitTo('installment.delete-installment', 'delete-installment-modal', $this->selected_installment);
    }

    public function updateInstallment() : void
    {
        $loan = (object) $this->selected_installment->loan;
        $installment = Installment::findOrFail($this->selected_installment->id);
        [$paid, $remaining] = $this->findUpdatedPaidAndRemaining($loan, $this->amount, $installment);
        $this->validate([
            'amount' => 'numeric|required|min:100000|max:'.$remaining.''
        ], [
            'amount.required' => 'The amount field is required',
            'amount.numeric' => 'The amount field must the amount of money to pay',
            'amount.min' => 'The amount to pay must not lower than Rp 100.000',
            'amount.max' => 'The amount to pay must not greater than Rp '.number_format($loan->remaining, 0, ',', '.').'',
        ]);
        try{
            DB::transaction(function() use($loan, $installment, $paid, $remaining){
               $installment->update([
                'amount' => $this->amount
               ]);
                Loan::where('id', $loan->id)->update([
                    'paid' => (int) $paid,
                    'remaining' => (int) $remaining,
                    'status' => (bool) ($loan->total == $paid),
                    'updated_at' => now()
                ]);
            });
        }catch(\Exception $e){
            throw($e);
        }
        $this->emit('installments-updated');
        $this->dispatchBrowserEvent('close-modal');
    }

    private function findUpdatedPaidAndRemaining(object $loan, float $amount, object $installment) : mixed
    {
        if($installment->amount == $amount){
            $this->dispatchBrowserEvent('close-modal');
            $this->reset('selected_installment');
            return null;
        }elseif( $amount >= $installment->amount){
            $paid = $loan->paid + ($amount - $installment->amount);
            $remaining = $loan->remaining - ($amount - $installment->amount);
            return [$paid, $remaining];
        }elseif($amount <= $installment->amount){
            $paid = $loan->paid - ($installment->amount - $amount);
            $remaining = $loan->remaining + ($installment->amount - $amount);
            return [$paid, $remaining];
        }
    }
}
