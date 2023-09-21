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
                <form wire:submit="addNewLoan()">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nasabah <span class="text-red-400 text-xs">*</span></label>
                            <div class="relative">
                                <input type="text" readonly id="selected_customer_info" name="selected_customer_info" wire:model.live="selected_customer_info" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pilih Nasabah" required>
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
                                <input type="number" id="amount" wire:model="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                            </div>
                            @error('amount')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="interest_rate" class="block mb-2 text-sm font-medium text-gray-900">Bunga <span class="text-red-400 text-xs">*</span></label>
                            <input type="number" name="interest_rate" id="interest_rate" wire:model="interest_rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                            @error('interest_rate')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="interest_rate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Dimulai Cicilan <span class="text-red-400 text-xs">*</span></label>
                            <input type="date" name="start_date" id="start_date" required wire:model.live.debounce="start_date" value="{{ $start_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                            <div class="flex mt-2 ml-1">
                                <div class="flex items-center h-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1 {{ $isTodaySelected ? 'text-blue-700' : 'hidden' }} ">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="group drop-shadow-md shadow-indigo-400">
                                    <button type="button" wire:click="$toggle('isTodaySelected')" for="helper-checkbox" class="ml-2 text-sm px-2 border border-blue-700 rounded-lg font-medium text-gray-600 pt-1 group-hover:bg-blue-700 group-hover:text-white shadow-md group-hover:drop-shadow-lg">
                                        Pilih Tanggal Hari Ini
                                        <span id="helper-checkbox-text" class="block text-xs font-normal text-gray-500 text-center group-hover:bg-blue-700 group-hover:text-gray-200 pb-1">{{ now()->format('d/m/Y') }}</span>
                                    </button>
                                </div>
                            </div>
                            @error('start_date')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="interest_rate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Akhir Cicilan <span class="text-red-400 text-xs">*</span></label>
                            <input type="date" name="end_date" id="end_date" {{ $start_date == null ? 'disabled' : ''}} wire:model.live.debounce="end_date" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                            @if($start_date != null)
                            <div class="flex rounded-md shadow-sm drop-shadow-md mx-auto items-center justify-center px-2 py-4" role="group">
                                <button type="button" wire:click="setEndDate(1)" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 {{ $duration == 1 ? 'text-blue-700 border-blue-700' : 'text-gray-900' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1 {{ $duration == 1 ? 'text-blue-700' : 'hidden' }} ">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    1 Bulan
                                </button>
                                <button type="button" wire:click="setEndDate(2)" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 {{ $duration == 2 ? 'text-blue-700 border-blue-700' : 'text-gray-900' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1 {{ $duration == 2 ? 'text-blue-700' : 'hidden' }} ">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    2 Bulan
                                </button>
                                <button type="button" wire:click="setEndDate(3)" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 {{ $duration == 3 ? 'text-blue-700 border-blue-700' : 'text-gray-900' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1 {{ $duration == 3 ? 'text-blue-700' : 'hidden' }} ">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    3 Bulan
                                </button>
                            </div>
                            @endif
                            @error('end_date')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Catatan </label>
                            <textarea id="note" rows="5" wire:model="note" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Masukan catatan jika ada"></textarea>
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
