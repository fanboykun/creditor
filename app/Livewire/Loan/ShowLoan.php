<?php

namespace App\Livewire\Loan;

use App\Models\Installment;
use Livewire\Component;
use App\Models\Loan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Livewire\Redirector;

class ShowLoan extends Component
{
    public Loan $loan;

    public $s;

    public $start_date;
    public $end_date;
    public bool $status;
    public $note = '';
    public $duration;
    public float $amount;
    public $interest;

    public $setStatusMsg;

    protected $listeners = ['loan-updated' => 'render', 'installment-deleted' => 'render'];

    public function mount(Loan $loan)
    {
        $this->start_date = $loan->start_date;
        $this->end_date = $loan->end_date;
        $this->amount = $loan->amount;
        $this->note = $loan->note;
        $this->status = (bool) $loan->status;
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
        // dd($this->interest);
        $min_amount = $this->interest >= $this->loan->interest ? $this->loan->amount : $this->loan->paid;
        $this->validate([
            'amount' => 'required|numeric|min:'.$min_amount.'',
            'interest' => 'required|numeric',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'status' => 'required|boolean',
            'note' => 'nullable|string',
        ]);
        [$total, $updated_remaining] = $this->recalculateLoan();
        (bool) $updated_status = $this->status;
        if((int) $total == (int) $this->loan->total){
            if($this->status != $this->loan->status){
                $this->setStatusMsg = 'tidak bisa mengganti status untuk pinjaman yang belum sepenuhnya terbayar atau sudah terbayar';
                return;
            }else{
                $updated_status = $this->loan->status;
            }
        }else{
            $updated_status = false;
        }
        try{
            DB::transaction(function() use ($total, $updated_remaining, $updated_status){
                Loan::where('id', $this->loan->id)->update([
                    'amount' => (int) $this->amount,
                    'total' => (int) $total,
                    'remaining' => (int) $updated_remaining,
                    'interest' => $this->interest,
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                    'status' => $updated_status,
                    'note' => $this->note,
                ]);
            });
        }catch(\Exception $e){
            throw($e);
        }
        $this->dispatch('close-modal');
        $this->dispatch('loan-updated')->self();
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
        $this->dispatch('close-modal');
        return redirect()->route('loans.index')->with('success', 'Loan Deleted Successfully!');
    }

}
