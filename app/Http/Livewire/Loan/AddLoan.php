<?php

namespace App\Http\Livewire\Loan;

use App\Models\Customer;
use App\Models\Loan;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Livewire\Redirector;

class AddLoan extends Component
{
    public $customer_id = null;
    public string $selected_customer_info;
    public int $amount;
    public float $interest_rate;
    public $start_date;
    public $end_date;
    public bool $status = false;
    public string $note = '';
    public bool $isTodaySelected = false;
    public int $duration;

    protected $rules = [
        'selected_customer_info' => 'required|string|max:255',
        'amount' => 'required',
        'interest_rate' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'status' => 'required',
        'note' => 'nullable|string|max:255'
    ];

    public $listeners = [
        'customerSelected' => 'setCustomer',
    ];

    public function render() : \Illuminate\View\View
    {
        return view('livewire.loan.add-loan');
    }

    public function addNewLoan() : void
    {
        $c_id = $this->customer_id;
        if( !Customer::find($c_id)->exists()){
            return;
        };
        $this->saveLoan($c_id);
    }

    private function saveLoan(int $c_id): Redirector|RedirectResponse {
        $this->validate();
        $loan = new Loan;
        $loan->customer_id = auth()->id();
        $loan->customer_id = $c_id;
        $loan->amount = $this->amount;
        $loan->interest = $this->interest_rate;
        $loan->total = $this->getTotal($this->amount, $this->interest_rate);
        $loan->status = $this->status;
        $loan->start_date = $this->start_date;
        $loan->end_date = $this->end_date;
        $loan->note = $this->note;
        $loan->save();

        return redirect()->route('loans.index');
    }

    public function setCustomer(Customer $customer) : void
    {
        $this->customer_id = $customer->id;
        $this->selected_customer_info = '(' .$customer->id .')'. ' ' . $customer->name . ' - ' . $customer->card_number;
    }

    public function updatedIsTodaySelected() : void
    {
        if ($this->isTodaySelected) {
            $this->start_date = date('Y-m-d');
        } else {
            $this->start_date = null;
        }
    }

    public function setEndDate(int $num) : void
    {
        if($this->start_date != null){
            $this->end_date = match($num){
                1 => Carbon::createFromFormat('Y-m-d', $this->start_date)->addMonth(1)->format('Y-m-d'),
                2 => Carbon::createFromFormat('Y-m-d', $this->start_date)->addMonth(2)->format('Y-m-d'),
                3 => Carbon::createFromFormat('Y-m-d', $this->start_date)->addMonth(3)->format('Y-m-d'),
            };
            $this->duration = $num;
        }
    }

    private function getTotal(int $amount, float $rate) : float
    {
        return $amount + ($amount * $rate / 100);
    }
}
