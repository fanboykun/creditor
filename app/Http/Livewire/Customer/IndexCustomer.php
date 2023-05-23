<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class IndexCustomer extends Component
{
    public $s;
    protected $perPage;
    protected $queryString = ['s' => ['except' => '']];
    public string $tab = 'card';

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
