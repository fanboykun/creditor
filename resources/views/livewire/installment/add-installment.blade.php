<div>
    <section class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 drop-shadow-lg">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" x-data="{tab:1}" x-on:loan-selected.window="tab = 2">
                <h2 class="mb-4 text-2xl font-bold text-gray-700">Bikin Cicilan Baru</h2>

                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center items-center justify-center text-gray-500">
                        <li class="mr-2">
                            <button type="button" x-on:click="tab = 1" :class="tab == 1 ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-600'" class="inline-flex items-center justify-center p-4 rounded-t-lg group" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                </svg>
                                Pilih Nasabah
                            </button>
                        </li>
                        <li class="mr-2">
                            <button type="button" x-on:click="tab = 2" :class="tab == 2 ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-500 hover:text-gray-600'" class="inline-flex items-center justify-center p-4 rounded-t-lg group">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                                </svg>
                                Bikin Cicilan
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="py-4 px-2">
                    <div x-show="tab == 1">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="selected_customer_info" class="block mb-2 text-sm font-medium text-gray-900">Nasabah <span class="text-red-400 text-xs">*</span></label>
                                <div class="relative">
                                    <input type="text" readonly id="selected_customer_info" name="selected_customer_info" wire:model="selected_customer_info" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pilih Nasabah" required>
                                    <button x-data="" type="button" x-on:click="$dispatch('open-modal', 'search-customer', { show : true })" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Cari Nasabah</button>
                                </div>
                                @error('selected_customer_info')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label for="selected_customer_info" class="block mb-2 mt-2 text-sm font-medium text-gray-900">Pinjaman <span class="text-red-400 text-xs">*</span></label>
                        @error('selected_loan.id')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                        @if($customer?->loans != null)
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-4">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-2">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Jumlah Cicilan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Terbayar
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Sisa
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tanggal Pembuatan
                                            </th>
                                            <th scope="col" class="px-2 py-2">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customer->loans as $loan)
                                        <tr class="bg-white border-b">
                                            <td class="px-2">
                                                {{ $loan->id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                Rp {{ number_format($loan->total, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                Rp {{ number_format($loan->paid, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                Rp {{ number_format($loan->remaining, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4">
                                               {{ \Carbon\Carbon::createFromFormat('Y-m-d', $loan->start_date)->format('d F Y') }}
                                            </td>
                                            <td class="px-2">
                                                <button type="button" wire:click="setLoan({{ $loan->id }})" class="font-medium text-blue-600 hover:underline">Pilih</button>
                                            </td>
                                        </tr>
                                        @empty
                                        Tidak Ada Data
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

                    <div  x-cloak x-show="tab == 2">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Bayar <span class="text-red-400 text-xs">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                      <span class="text-sm text-gray-700">Rp</span>
                                    </div>
                                    <input type="number" id="amount" wire:model.defer="amount" {{ $selected_loan == null ? 'disabled' : '' }} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                                </div>
                                <span class="text-gray-400 text-xs my-2">Jumlah maksimal pembayaran cicilan adalah <span class="font-bold text-gray-800">Rp {{ number_format($selected_loan?->remaining, 0, ',', '.') }}</span></span>
                                @error('amount')
                                    <span class="text-red-400 text-sm block">{{ $message }}</span>
                                @enderror
                                @error('selected_loan.id')
                                    <span class="text-red-400 text-sm block">{{ $message }}</span>
                                @enderror
                                <div class="block">
                                    <x-secondary-button type="button" x-on:click="tab = 1" class="mt-4 capitalize mr-2">Sebelumnya</x-secondary-button>
                                    <x-primary-button type="submit" wire:click.prevent="saveInstallment()" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="mt-4 capitalize">Simpan</x-primary-button>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="border-t-2 bg-white mt-4 sm:mt-0 sm:border-none px-2 sm:pl-2 sm:ml-2 rounded-lg sm:max-h-[60vh] overflow-y-auto">
                                    @if($selected_loan != null)
                                        <div class="sm:mt-2 sm:pr-2 sm:mr-2">
                                            <h2 class="mb-4 text-2xl font-bold text-gray-700 text-center">Info Cicilan</h2>
                                            <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Jumlah : <span class="text-end">Rp {{ number_format($selected_loan->total, 0, ',', '.') }}</span></p>
                                            <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Sisa : <span class="text-end">Rp {{ number_format($selected_loan->remaining, 0, ',', '.') }}</span></p>
                                            <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Terbayar : <span class="text-end">Rp {{ number_format($selected_loan->paid, 0, ',', '.') }}</span></p>
                                            <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Cicilan : <span class="text-end">{{ $selected_loan->installments?->count() }}x</span></p>
                                            <div class="divide-y space-y-1 divide-blue-200">
                                                @forelse ($selected_loan?->installments?->sortByDesc('created_at') as $installment)
                                                <div class="py-2 bg-gray-100 rounded-xl px-1.5 text-gray-600">
                                                    <span class="text-xs text-indigo-500 leading-5 w-fit px-1.5 rounded-full">{{ $installment->created_at->format('d F, Y') }}</span>
                                                    <span class="block px-1 leading-5 font-semibold">Rp {{ number_format($installment->amount, 0, ',', '.') }}</span>
                                                </div>
                                                @empty
                                                <div class="py-2 bg-gray-100 rounded-xl px-1.5 text-red-600/80 text-center">
                                                    <span class="block px-1 leading-5 font-semibold">Belum Ada Cicilan !</span>
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <x-modal name="search-customer" focusable>
        @livewire('loan.search-customer-modal', ['status' => true])
    </x-modal>

</div>
