<?php

namespace App\Http\Livewire\Installment;

use Livewire\Component;
use App\Models\Installment;

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
        $this->selected_installment = $installment;
        $this->dispatchBrowserEvent('open-modal', 'delete-installment');
    }
}
