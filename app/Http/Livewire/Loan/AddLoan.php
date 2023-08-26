<?php

namespace App\Http\Livewire\Loan;

use App\Models\Customer;
use Livewire\Component;
use Carbon\Carbon;

class AddLoan extends Component
{
    protected $customer_id;
    public string $selected_customer_info;
    public $amount;
    public $interest_rate;
    public $start_date;
    public $end_date;
    public $status;
    public $note;
    public bool $isTodaySelected = false;
    public int $duration;

    protected $rules = [
        'customer_id' => 'required',
        'amount' => 'required',
        'interest_rate' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'status' => 'required',
    ];

    public $listeners = [
        'customerSelected' => 'setCustomer',
    ];

    public function render() : \Illuminate\View\View
    {
        // $this->start_date = date('Y-m-d');
        return view('livewire.loan.add-loan');
    }

    public function addNewLoan() : void
     {

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
}
