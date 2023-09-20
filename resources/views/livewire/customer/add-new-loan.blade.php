<div>
    <x-slot name="breadcrumbs">
        Nasabah
        <x-slot name="breadcrumbs_child">
            Tambah Pinjaman
        </x-slot>
    </x-slot>
    <section class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 drop-shadow-lg">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="mb-4 text-2xl font-bold text-gray-700">Tambah Peminjaman Baru Ke <span class="underline">{{ $customer?->name }}</span></h2>
                <form wire:submit.prevent="addNewLoan()">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nasabah <span class="text-red-400 text-xs">*</span></label>
                            <div class="relative">
                                <input type="text" readonly id="selected_customer_info" name="selected_customer_info" wire:model="selected_customer_info" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pilih Nasabah" required>
                            </div>
                            @error('selected_customer_info')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Pinjaman <span class="text-red-400 text-xs">*</span></label>
                            <div class="relative mb-6">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                  <span class="text-sm text-gray-700">Rp</span>
                                </div>
                                <input type="number" id="amount" wire:model.defer="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
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
                            <input type="date" name="start_date" id="start_date" required wire:model.debounce="start_date" value="{{ $start_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
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
                            <input type="date" name="end_date" id="end_date" {{ $start_date == null ? 'disabled' : ''}} wire:model.debounce="end_date" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                            @if($start_date != null)
                                <div class="flex mt-2 ml-1 py-2">
                                    <div class="ml-2 text-sm">
                                        <button wire:click="setEndDate(1)" type="button" class="font-medium text-gray-900 p-1.5 border-2 rounded-lg border-indigo-600/50 hover:bg-indigo-700 hover:text-white">1 Bulan</button>
                                    </div>
                                    <div class="flex items-center h-5">
                                        @if($start_date != null && $duration == 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-2 text-blue-700">
                                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex mt-2 ml-1 py-2">
                                    <div class="ml-2 text-sm">
                                        <button wire:click="setEndDate(2)" type="button" class="font-medium text-gray-900 p-1.5 border-2 rounded-lg border-indigo-600/50 hover:bg-indigo-700 hover:text-white">2 Bulan</button>
                                    </div>
                                    <div class="flex items-center h-5">
                                        @if($start_date != null && $duration == 2)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-2 text-blue-700">
                                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex mt-2 ml-1 py-2">
                                    <div class="ml-2 text-sm">
                                        <button wire:click="setEndDate(3)" type="button" class="font-medium text-gray-900 p-1.5 border-2 rounded-lg border-indigo-600/50 hover:bg-indigo-700 hover:text-white">3 Bulan</button>
                                    </div>
                                    <div class="flex items-center h-5">
                                        @if($start_date != null && $duration == 3)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mt-2 text-blue-700">
                                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </div>
                                </div>
                            @endif
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
                    <x-primary-button class="mt-4" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="addNewLoan">Add Customer</x-primary-button>
                </form>
            </div>
        </div>
    </section>
    <x-modal name="search-customer" focusable>
        @livewire('loan.search-customer-modal')
    </x-modal>
</div>
