<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class IndexCustomer extends Component
{
    public $s;
    protected $perPage = 10;
    protected $queryString = ['s' => ['except' => '']];
    public string $tab = 'grid';

    public function render() : \Illuminate\View\View
    {
        $customers = Customer::where('name', 'like', '%'.$this->s.'%')->orWhere('phone', 'like', '%'.$this->s.'%')->latest()->paginate($this->perPage);
        return view('livewire.customer.index-customer', ['customers' => $customers]);
    }

    public function loadMore() : void
    {
        $this->perPage += 10;
    }
}
