<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Customer\AddCustomer;
use App\Http\Livewire\Customer\AddNewLoan;
use App\Http\Livewire\Customer\IndexCustomer;
use App\Http\Livewire\Customer\ListInstallment;
use App\Http\Livewire\Customer\ListLoan;
use App\Http\Livewire\Customer\PayInstallment;
use App\Http\Livewire\Customer\ShowCustomer;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Installment\AddInstallment;
use App\Http\Livewire\Installment\IndexInstallment;
use App\Http\Livewire\Loan\AddLoan;
use App\Http\Livewire\Loan\IndexLoan;
use App\Http\Livewire\Loan\ShowLoan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/customers', IndexCustomer::class)->name('customers.index');
    Route::get('/customers/create', AddCustomer::class)->name('customers.create');
    Route::get('/customers/{customer}/new-loan', AddNewLoan::class)->name('customers.new-loan');
    Route::get('/customers/{customer}/profile', ShowCustomer::class)->name('customers.profile');
    Route::get('/customers/{customer}/loans', ListLoan::class)->name('customers.list-loan');
    Route::get('/customers/{customer}/loans/{loan}/pay-installment', PayInstallment::class)->name('customers.pay-installment');
    Route::get('/customers/{customer}/installments', ListInstallment::class)->name('customers.list-installment');
    Route::get('/customers/{customer}/active-installment', function(App\Models\Customer $customer){
        $loan = App\Models\Loan::where('customer_id', $customer->id)->where('status', false)->first();
        if($loan){
            return redirect()->route('customers.pay-installment', ['customer' => $customer, 'loan' => $loan]);
        }
        return back()->with('message', 'customer does not have any loan to pay');
    })->name('customers.active-installment');

    Route::get('/loans', IndexLoan::class)->name('loans.index');
    Route::get('/loans/create', AddLoan::class)->name('loans.create');
    Route::get('/loans/{loan}', ShowLoan::class)->name('loans.show');

    Route::get('/installments', IndexInstallment::class)->name('installments.index');
    Route::get('/installments/create', AddInstallment::class)->name('installments.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
