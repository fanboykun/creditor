<?php

namespace App\Livewire\Loan;

use App\Models\Customer;
use App\Models\Loan;
use Livewire\Component;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
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
        'customer_id' => 'required|integer',
        'selected_customer_info' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'interest_rate' => 'required|numeric',
        'start_date' => 'required|date_format:Y-m-d',
        'end_date' => 'required|date_format:Y-m-d|after:start_date',
        'status' => 'required|boolean',
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
        $this->validate();
        $c_id = $this->customer_id;

        try{
            if($this->checkIsHaveActiveLoan($c_id)){
                return;
            }
            $this->saveLoan($c_id);
        }catch(Exception $e){
            throw($e);
            // throw new Exception('error');
        }
    }

    private function saveLoan(int $c_id): Redirector|RedirectResponse {
        try {
            DB::transaction(function () use($c_id) {
                $loan = new Loan;
                $loan->user_id = auth()->id();
                $loan->customer_id = $c_id;
                $loan->amount = (int) $this->amount;
                $loan->interest = $this->interest_rate;
                $loan->total = (int) $this->getTotal($this->amount, $this->interest_rate);
                $loan->paid = 0;
                $loan->remaining = (int) $this->getTotal($this->amount, $this->interest_rate);
                $loan->status = $this->status;
                $loan->start_date = $this->start_date;
                $loan->end_date = $this->end_date;
                $loan->note = $this->note;
                $loan->save();
            });
        } catch(Exception $e) {
            return redirect()->route('loans.index')->with('error', 'Pinjaman gagal dibuat!');
        }

        return redirect()->route('loans.index')->with('success', 'Pinjaman berhasil dibuat!');
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

    private function checkIsHaveActiveLoan(int $c_id) : bool
    {
        $check = Loan::where('customer_id', $c_id)
        ->where('status', false)
        ->first();
        return $check != null;
    }
}
