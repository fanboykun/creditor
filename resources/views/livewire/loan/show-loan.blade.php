<div>
    <div class="bg-gray-100">
        <div class="max-w-full mx-auto space-y-6 drop-shadow-lg">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="px-4 sm:px-0">
                    <h3 class="mb-4 text-2xl font-bold text-gray-700">Detail Pinjaman Nasabah <span class="underline">{{ $loan?->customer->name }}</span></h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Detail pinjaman nasabah</p>
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama Lengkap dan ID</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->customer->name }} ({{ $loan?->customer->id }})</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">ID Peminjaman</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->id }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Jumlah Pinjaman (total)</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->total }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Terbayar</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->paid }}</dd>
                    </div>
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Sisa</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->remaining }}</dd>
                    </div>
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Status</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->status == true ? 'Selesai' : 'Berjalan' }}</dd>
                    </div>
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Dimulai</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $loan?->start_date)->format('d F Y') }}</dd>
                    </div>
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Berakhir</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $loan?->end_date)->format('d F Y') }}</dd>
                    </div>
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Catatan</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->note }}</dd>
                    </div>
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Waktu Pinjaman Dibuat</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $loan?->created_at->format('d F Y') }}</dd>
                      </div>
                    </dl>
                    <div class="block sm:flex sm:items-end sm:justify-end">
                        <x-secondary-button class="capitalize mx-2 drop-shadow-md hover:bg-slate-800 hover:text-white hover:drop-shadow-lg">
                            Edit Data
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="my-4 py-6">
        <div class="mx-auto w-auto">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                                List dari Semua Cicilan
                            </h2>
                        </div>
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
                                <input wire:model.debounce.500="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari cicilan berdasarkan id" required="">
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('customers.pay-installment', ['customer' => $loan?->customer, 'loan' => $loan]) }}" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                            </svg>
                            Buat Cicilan Baru
                        </a>
                    </div>
                </div>

                <!-- Content -->
                <div class="overflow-x-auto max-h-96">
                    <table class="w-full table-auto text-sm text-left text-gray-500">
                        <thead class="w-full text-xs text-gray-700 uppercase bg-gray-50 sticky top-0 whitespace-pre-line z-10">
                            <tr class="bg-gray-50">
                                <th scope="col" class="w-6"></th>
                                <th scope="col" class="px-4 py-3">Nama Nasabah</th>
                                <th scope="col" class="px-4 py-3 text-right">Jumlah Pembayaran Cicilan</th>
                                <th scope="col" class="px-4 py-3 text-center">Tanggal Dibayar</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full">
                            @forelse ($loan->installments as $installment)
                                <tr class="border-b hover:bg-gray-100 items-center even:bg-slate-50">
                                    <td>
                                        <x-dropdown align="left" width="48">
                                            <x-slot name="trigger">
                                                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="p-1 bg-white shadow-lg text-slate-800 rounded-lg focus:bg-slate-800 focus:text-white active:bg-slate-800 active:text-white" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content" class="shadow-xl bg-indigo-400">
                                                <button class="border-b border-gray-600 block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                    Edit Data
                                                </button>
                                                <button class="border-b border-gray-600 block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                    Hapus Data
                                                </button>
                                                <x-dropdown-link :href="route('profile.edit')" class="border-b border-gray-600">
                                                    {{ __('Detail Pinjaman') }}
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 break-words">
                                        {{ $installment->loan->customer->name }}
                                        <span class="text-sm text-gray-400 ml-1 block">ID Nasabah : {{ $installment->loan->customer->id }}</span>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 text-right items-center break-words">
                                    Rp {{ number_format($installment->amount, 0, ',', '.' ) }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 text-center break-words">
                                        {{ $installment->created_at->format('H:i-l, d/F/Y') }}
                                        <span class="text-sm text-gray-400 ml-1 block">Oleh : {{ $installment->user->name }}</span>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="px-4 py-2 text-center">No Data Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 ">
                        Menampilkan
                        <span class="font-semibold text-gray-900 ">{{ count($loan?->installments) }}</span>
                        dari
                        <span class="font-semibold text-gray-900 ">{{ $loan?->installments->count() }}</span>
                    </span>
                    <button type="button" wire:click="loadMore()" class="text-sm font-normal text-indigo-600 ">
                        Muat Lebih ...
                    </button>
                </nav>
            </div>
        </div>
    </section>

</div>

