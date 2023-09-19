<?php

namespace App\Http\Livewire\Installment;

use Livewire\Component;
use App\Models\Installment;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class DeleteInstallment extends Component
{
    public $selected_installment;
    protected $listeners = ['delete-installment-modal' => 'init'];

    public function render()
    {
        return view('livewire.installment.delete-installment');
    }

    public function init(Installment $installment)
    {
        $this->selected_installment = $installment->load('loan.customer');
        $this->dispatchBrowserEvent('open-modal', 'delete-installment');
    }

    public function destroyInstallment() : void
    {
        try{
            DB::transaction(function (){
                $installment = Installment::where('id', $this->selected_installment->id)->first();
                $loan = Loan::where('id', $installment->loan_id)->first();
                
                $loan->paid = $loan->paid - $installment->amount;
                $loan->remaining = $loan->remaining + $installment->amount;
                $loan->save();

                $installment->delete();

            });
            $this->emit('installment-deleted');
            $this->dispatchBrowserEvent('close-modal');

        }catch(\Exception $e){
            throw($e);
        }
    }
}
