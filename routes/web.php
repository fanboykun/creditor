<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Customer\AddCustomer;
use App\Http\Livewire\Customer\IndexCustomer;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Installment\AddInstallment;
use App\Http\Livewire\Installment\IndexInstallment;
use App\Http\Livewire\Loan\AddLoan;
use App\Http\Livewire\Loan\IndexLoan;
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
    // return view('softui-content');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/customers', IndexCustomer::class)->name('customers.index');
    Route::get('/customers/create', AddCustomer::class)->name('customers.create');

    Route::get('/loans', IndexLoan::class)->name('loans.index');
    Route::get('/loans/create', AddLoan::class)->name('loans.create');

    Route::get('/installments', IndexInstallment::class)->name('installments.index');
    Route::get('/installments/create', AddInstallment::class)->name('installments.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
