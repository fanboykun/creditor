<?php

namespace App\Http\Livewire\Loan;

use App\Models\Installment;
use Livewire\Component;
use App\Models\Loan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Livewire\Redirector;
use Psy\VersionUpdater\Installer;
use Ramsey\Uuid\Type\Decimal;

class ShowLoan extends Component
{
    public Loan $loan;

    public $s;

    public $start_date;
    public $end_date;
    public $status;
    public $note = '';
    public $duration;
    public float $amount;
    public $interest;

    protected $listeners = ['loan-updated' => '$refresh'];

    public function mount(Loan $loan)
    {
        $this->start_date = $loan->start_date;
        $this->end_date = $loan->end_date;
        $this->amount = $loan->amount;
        $this->note = $loan->note;
        $this->status = $loan->status;
        $this->duration = $loan->duration;
        $this->interest = $loan->interest;
    }

    public function render()
    {
        $this->loan->load('customer');
        $installments = Installment::where('loan_id', $this->loan->id)
        ->where('id', 'like', '%'.$this->s.'%')
        ->latest()
        ->get();
        return view('livewire.loan.show-loan', ['installments' => $installments]);
    }

    public function updateLoan() : void
    {
        $min_amount = $this->loan->paid == null ? 0 : $this->Loan->paid;
        $this->validate([
            'amount' => 'required|numeric|min:'.$min_amount.'',
            'interest' => 'required|numeric',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'status' => 'required|boolean',
            'note' => 'nullable|string',
        ]);
        [$total, $updated_remaining] = $this->recalculateLoan();
        try{
            DB::transaction(function() use ($total, $updated_remaining){
                Loan::where('id', $this->loan->id)->update([
                    'amount' => (float) $this->amount,
                    'total' => (float) $total,
                    'remaining' => (float) $updated_remaining,
                    'interest' => $this->interest,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'status' => $this->status,
                    'note' => $this->note,
                ]);
            });
        }catch(\Exception $e){
            throw($e);
        }
        $this->dispatchBrowserEvent('close-modal');
        $this->emitSelf('loan-updated');
    }

    private function recalculateLoan() : array
    {
        $interest_value = $this->amount * $this->interest / 100;
        $total = $this->amount + $interest_value;
        if($total > $this->loan->total){
            $updated_remaining = (float) $total - $this->loan->paid;
            return[$total, $updated_remaining];
        }elseif($total < $this->loan->total){
            $updated_remaining = (float) $total - $this->loan->paid;
            return[$total, $updated_remaining];
        }else{
            return[$total, $this->loan->remaining];
        }
    }

    public function destroyLoan() : Redirector|RedirectResponse
    {
        $this->validate(['loan.id' => 'required|integer']);
        try{
            DB::transaction(function (){
                Installment::where('loan_id', $this->loan->id)->sharedLock()->delete();
                Loan::where('id', $this->loan->id)->sharedLock()->delete();
            });
        }catch(\Exception $e){
            throw($e);
        }
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('loans.index')->with('success', 'Loan Deleted Successfully!');
    }
}
