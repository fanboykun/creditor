<?php

namespace App\Http\Livewire\Installment;

use Livewire\Component;
use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class IndexInstallment extends Component
{
    public $s;
    public $perPage = 10;
    protected $queryString = ['s' => ['except' => '']];

    public $selected_installment;


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

    public function showInstallment(object|array $installment) : void
    {
        $this->selected_installment =  $installment;
        $this->dispatchBrowserEvent('open-modal', 'show-installment');
    }

    public function updateInstallment() : void
    {
        $loan = (object) $this->selected_installment['loan'];
        $installment = Installment::findOrFail($this->selected_installment['id']);
        [$paid, $remaining] = $this->findUpdatedPaidAndRemaining($loan, $this->selected_installment['amount'], $installment);
        $this->validate([
            'selected_installment.amount' => 'numeric|required|min:100000|max:'.$loan->remaining.''
        ], [
            'selected_installment.amount.required' => 'The amount field is required',
            'selected_installment.amount.numeric' => 'The amount field must the amount of money to pay',
            'selected_installment.amount.min' => 'The amount to pay must not lower than Rp 100.000',
            'selected_installment.amount.max' => 'The amount to pay must not greater than Rp '.number_format($loan->remaining, 0, ',', '.').'',
        ]);
        try{
            DB::transaction(function() use($loan, $installment, $paid, $remaining){
               $installment->update([
                'amount' => $this->selected_installment['amount']
               ]);
                Loan::where('id', $loan->id)->update([
                    'paid' => $paid,
                    'remaining' => $remaining,
                    'status' => (bool) ($loan->total == $paid),
                    'updated_at' => now()
                ]);
            });
        }catch(\Exception $e){
            throw($e);
        }
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

    public function deleteInstallment() : void
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('open-modal', 'delete-installment');
    }

    public function destroyInstallment() : void
    {
        $this->dispatchBrowserEvent('close-modal');
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }
}
