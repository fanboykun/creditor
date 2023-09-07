<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Contracts\View\View;

class ListLoan extends Component
{
    public Customer $customer;

    public string|int|bool $filter_status = '';

    public int $perPage = 10;
    public string $s = '';
    protected $queryString = ['s' => ['except' => '']];
    public float $total = 0;
    public int $count = 0;

    public function render() : View
    {
        $loans = Loan::where('customer_id', $this->customer->id)
        ->when($this->filter_status != '', fn ($q) => $q->where('status', (bool) $this->filter_status ))
        ->where('id', 'like', '%'.$this->s.'%')
        ->orderBy('status', 'asc')
        ->orderBy('updated_at', 'desc')
        ->paginate($this->perPage);

        $this->total = Loan::where('customer_id', $this->customer->id)->sum('total');
        $this->count = Loan::where('customer_id', $this->customer->id)->count();

        return view('livewire.customer.list-loan', ['loans' => $loans]);
    }

    public function loadMore() :void
    {
        $this->perPage += 10;
    }
}
