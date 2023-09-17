<div>
    <section>
        <div class="mx-auto w-auto">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                                List dari Semua Cicilan
                            </h2>
                        </div>
                        {{-- <div class="flex">
                            <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center text-gray-500">
                                <li class="mr-2">
                                    <button wire:click="$set('tab', 'grid')" class="inline-flex p-4 border-b-2 {{ $tab == 'grid' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:border-gray-300' }} rounded-t-lg group" aria-current="page">
                                        <svg aria-hidden="true" class="w-5 h-5 mr-2 {{ $tab == 'grid' ? 'text-blue-600' : 'text-gray-400' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        Grid
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button wire:click="$set('tab', 'table')" class="inline-flex p-4 border-b-2 {{ $tab == 'table' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:border-gray-300' }} rounded-t-lg group">
                                        <svg aria-hidden="true" class="w-5 h-5 mr-2 {{ $tab == 'table' ? 'text-blue-600' : 'text-gray-400' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                                        Table
                                    </button>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </header>
                <!-- Header -->
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <div class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input wire:model.debounce.500="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari cicilan berdasarkan id pinjaman" required="">
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('installments.create') }}" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                            </svg>
                            Buat Cicilan Baru
                        </a>
                    </div>
                </div>

                <!-- Content -->
                <div class="overflow-x-auto min-h-40 max-h-96">
                    <table class="w-full table-auto text-sm text-left text-gray-500">
                        <thead class="w-full text-xs text-gray-700 uppercase bg-gray-50 sticky top-0 whitespace-pre-line z-10">
                            <tr class="bg-gray-50">
                                <th scope="col" class="px-4 py-3">Nama Nasabah</th>
                                <th scope="col" class="px-4 py-3 text-right">Jumlah Pembayaran Cicilan</th>
                                <th scope="col" class="px-4 py-3 text-center">Tanggal Dibuat</th>
                                <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full">
                        @forelse ($installments as $installment_dates => $installment_data)
                            <tr>
                                <td colspan="5" class="bg-slate-800 shadow-md text-white text-md ">
                                    <span class="flex ml-4 items-center justify-center"> {{ Carbon\Carbon::createFromDate($installment_dates)->format('d F Y') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="ml-2 my-auto w-5 h-5">
                                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </td>
                            </tr>
                                @forelse ($installment_data as $installment)
                                    <tr class="border-b hover:bg-gray-100 items-center even:bg-slate-50">
                                        <td class="px-4 py-2 font-medium text-gray-900 break-words">
                                            {{ $installment->loan->customer->name }}
                                            <span class="text-sm text-gray-400 ml-1 block">ID Pinjaman : {{ $installment->loan_id }}</span>
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 text-right items-center break-words">
                                        Rp {{ number_format($installment->amount, 0, ',', '.' ) }}
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 text-center break-words">
                                            {{ $installment->created_at->format('H:i-l, d/F/Y') }}
                                            <span class="text-sm text-gray-400 ml-1 block">Oleh : {{ $installment->user->name }}</span>
                                        </td>
                                        <td class="justify-center text-center">
                                            <button type="button" wire:click="showInstallment({{ $installment }})" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-blue-400">Detail</button>
                                        </td>
                                    </tr>
                                    @empty
                                <tr>
                                    <td colspan="9" class="px-4 py-2 text-center">No Data Found</td>
                                </tr>
                                @endforelse
                        @empty
                        <tr>
                            <td colspan="9" class="px-4 py-2 text-center">Data Tidak Ditemukan</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
            </div>
        </div>
    </section>

    <x-modal name="show-installment" x-data={} focusable>
        <div class="px-6 py-6 lg:px-8" @close-modal.window="show = false">
            @if($selected_installment != null)
            <h3 class="mb-4 text-xl font-medium text-gray-900 underline"><a href="{{ route('loans.show', $selected_installment['loan']['id']) }}">Detail Data Cicilan ({{ $selected_installment['loan']['id'] }})</a></h3>
            <form class="space-y-6" wire:submit.prevent="updateInstallment()">
                <div>
                    <label for="loan_id" class="block mb-2 text-sm font-medium text-gray-900">ID Peminjaman</label>
                    <input type="number" value="{{ $selected_installment['loan_id'] }}" disabled name="loan_id" id="loan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Bayar <span class="text-red-400 text-xs">*</span></label>
                    <div class="relative mb-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                          <span class="text-sm text-gray-700">Rp</span>
                        </div>
                        <input type="number" id="amount" wire:model.defer="selected_installment.amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                    </div>
                    <span class="text-gray-400 text-xs mt-1">Sisa cicilan adalah Rp <span class="font-bold text-black text-sm"> {{ number_format($selected_installment['loan']['remaining'], 0, ',', '.') }}</span></span>
                    @error('selected_installment.amount')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-between">
                    <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                    <x-primary-button>Save</x-primary-button>
                </div>
                <div class="text-sm font-medium text-gray-500">
                    <span class="mx-2">Ingin menghapus data?</span><button type="button" wire:click="deleteInstallment()" class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Hapus Data</button>
                </div>
            </form>
            @endif
        </div>
    </x-modal>

    <x-modal name="delete-installment" x-data={} focusable>
        <div @close-modal.window="show = false">
            <form method="post" wire:submit.prevent="destroyInstallment" class="p-6">

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Apakah anda yakin ingin menghapus cicilan ini?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Ketika data ini dihapus, maka akan mempengaruhi Pinjaman dan data yang telah dihapus tidak akan bisa dikembalikan?') }}
                </p>
                @if($selected_installment != null)
                <div class="flex flex-col gap-y-2  py-2 px-6 border border-indigo-400 rounded-lg">
                    <div class="flex justify-between py-1.5 bg-gray-50">
                        <div class="items-end text-end">
                            Nasabah :
                        </div>
                        <div class="items-end">
                            {{ $selected_installment['loan']['customer']['name'] }}
                        </div>
                    </div>
                    <div class="flex justify-between py-1.5">
                        <div class="items-end text-end">
                            Jumlah Pinjaman :
                        </div>
                        <div class="items-end">
                            Rp {{ number_format($selected_installment['loan']['total'], 0, ',', '.' ) }}
                        </div>
                    </div>
                    <div class="flex justify-between py-1.5 bg-gray-50">
                        <div class="items-end text-end">
                            Sisa Pinjaman :
                        </div>
                        <div class="items-end">
                            Rp {{ number_format($selected_installment['loan']['remaining'], 0, ',', '.' ) }}
                        </div>
                    </div>
                    <div class="flex justify-between py-1.5">
                        <div class="items-end text-end">
                            Terbayar :
                        </div>
                        <div class="items-end">
                            Rp {{ number_format($selected_installment['loan']['paid'], 0, ',', '.' ) }}
                        </div>
                    </div>
                </div>
                @endif

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Installment') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
</div>
