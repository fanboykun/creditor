<div>
    @if (session()->has('message'))
        <div id="toast-success" class="flex fixed top-5 z-50 right-2 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('message') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    <section class="bg-gray-50">
        <div class="bg-white rounded-xl mt-8 shadow-xl border-1 py-4 px-12 mx-auto max-w-4xl lg:py-4">
            <h2 class="mb-4 text-2xl font-bold text-gray-700">Tambah Peminjaman Baru</h2>
            <form wire:submit.prevent="addNewLoan">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nasabah <span class="text-red-400 text-xs">*</span></label>
                        <div class="relative">
                            <input type="text" readonly id="selected_customer_info" name="selected_customer_info" value="{{ $selected_customer_info }}" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pilih Nasabah" required>
                            <button type="button" wire:click="$emit('openModal', 'loan.search-customer-modal')" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Cari Nasabah</button>
                        </div>
                        @error('customer_id')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Pinjaman <span class="text-red-400 text-xs">*</span></label>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                              <span class="text-sm text-gray-700">Rp</span>
                            </div>
                            <input type="number" id="amount" wire:model.defer="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
                        </div>
                        @error('amount')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="interest_rate" class="block mb-2 text-sm font-medium text-gray-900">Bunga <span class="text-red-400 text-xs">*</span></label>
                        <input type="number" name="interest_rate" id="interest_rate" wire:model.defer="interest_rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                        @error('interest_rate')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="interest_rate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Dimulai Cicilan <span class="text-red-400 text-xs">*</span></label>
                        <input type="date" name="start_date" id="start_date" wire:model.debounce="start_date" value="{{ $start_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                        <div class="flex mt-2 ml-1">
                            <div class="flex items-center h-5">
                                <input id="isTodaySelected" aria-describedby="isTodaySelected" wire:model.debounce="isTodaySelected" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </div>
                            <div class="ml-2 text-sm">
                                <button type="button" wire:click="$toggle('isTodaySelected')" for="helper-checkbox" class="font-medium text-gray-900">Pilih Tanggal Hari Ini</button>
                                <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500">{{ now()->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        @error('start_date')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="interest_rate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Akhir Cicilan <span class="text-red-400 text-xs">*</span></label>
                        <input type="date" name="end_date" id="end_date" wire:model.debounce="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                        <div class="flex mt-2 ml-1">
                            <div class="flex items-center h-5">
                                <input id="one_month" {{ $start_date == null ? 'disabled' : '' }} aria-describedby="helper-checkbox-text" type="checkbox" value="" {{ $duration == 1 ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </div>
                            <div class="ml-2 text-sm">
                                <button wire:click="setEndDate(1)" type="button" class="font-medium text-gray-900">1 Bulan</button>
                            </div>
                        </div>
                        <div class="flex mt-2 ml-1">
                            <div class="flex items-center h-5">
                                <input id="two_month" {{ $start_date == null ? 'disabled' : '' }}  aria-describedby="helper-checkbox-text" type="checkbox" value="" {{ $duration == 2 ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </div>
                            <div class="ml-2 text-sm">
                                <button wire:click="setEndDate(2)" type="button" class="font-medium text-gray-900">2 Bulan</button>
                            </div>
                        </div>
                        <div class="flex mt-2 ml-1">
                            <div class="flex items-center h-5">
                                <input id="three_month" {{ $start_date == null ? 'disabled' : '' }}  aria-describedby="helper-checkbox-text" type="checkbox" value="" {{ $duration == 3 ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </div>
                            <div class="ml-2 text-sm">
                                <button wire:click="setEndDate(3)" type="button" class="font-medium text-gray-900">3 Bulan</button>
                            </div>
                        </div>
                        @error('end_date')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Catatan </label>
                        <textarea id="note" rows="5" wire:model.defer="note" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Masukan catatan jika ada"></textarea>
                        @error('note')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <x-primary-button class="mt-4">Add Customer</x-primary-button>
            </form>
        </div>
    </section>
</div>
