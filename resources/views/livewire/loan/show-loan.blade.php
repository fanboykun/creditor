<div>
    <x-slot name="breadcrumbs">
        Pinjaman
        <x-slot name="breadcrumbs_child">
            Detail
        </x-slot>
    </x-slot>
    <div class="bg-gray-100">
        <div class="max-w-full mx-auto space-y-6 drop-shadow-lg">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="px-4 sm:px-0">
                    <h3 class="mb-4 text-2xl font-bold text-gray-700">Detail Pinjaman Nasabah <a href="{{ route('customers.profile', $loan->customer) }}" class="underline">{{ $loan?->customer->name }}</a></h3>
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
                        <dt class="text-sm font-medium leading-6 text-gray-900">Jumlah</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-900 sm:col-span-2 sm:mt-0 font-bold">Rp {{ number_format($loan?->amount, 0, ',', '.') }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Bunga</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-900 sm:col-span-2 sm:mt-0 font-bold">{{ $loan?->interest }}%</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Total Pinjaman</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-900 sm:col-span-2 sm:mt-0 font-bold"> Rp {{ number_format($loan?->total, 0, ',', '.') }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Terbayar</dt>
                        <dd class="mt-1 text-sm leading-6 text-green-700 sm:col-span-2 sm:mt-0 font-semibold">Rp {{ number_format($loan?->paid, 0, ',', '.') }}</dd>
                    </div>
                    <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Sisa</dt>
                        <dd class="mt-1 text-sm leading-6 text-red-400 font-bold sm:col-span-2 sm:mt-0">Rp {{ number_format($loan?->remaining, 0, ',', '.') }}</dd>
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
                        <x-danger-button class="capitalize mx-2 drop-shadow-md hover:drop-shadow-lg" x-on:click="$dispatch('open-modal', 'delete-loan')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1.5 my-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                           Hapus
                        </x-danger-button>
                        <x-secondary-button type="button" x-on:click="$dispatch('open-modal', 'edit-loan')">
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
                                <input wire:model.debounce.500ms="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari cicilan berdasarkan id" required="">
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
                                <th scope="col" class="px-4 py-3">ID Cicilan</th>
                                <th scope="col" class="px-4 py-3">Nama Nasabah</th>
                                <th scope="col" class="px-4 py-3 text-right">Jumlah Pembayaran Cicilan</th>
                                <th scope="col" class="px-4 py-3 text-center">Tanggal Dibayar</th>
                                <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full">
                            @forelse ($installments as $installment)
                                <tr class="border-b hover:bg-gray-100 items-center even:bg-slate-50">
                                    <td class="px-4 py-2 font-medium text-gray-900 text-left items-center ">
                                        {{ $installment->id }}
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
                                    <td class="justify-center text-center">
                                        <button type="button" wire:click="$emitTo('installment.show-installment', 'show-installment-modal', {installment: {{ $installment }}})" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-blue-400">Detail</button>
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
                </nav>
            </div>
        </div>
    </section>

    <x-modal name="edit-loan" x-data={} focusable>
        <div class="px-6 py-6 lg:px-8" @close-modal.window="show = false">
            <h3 class="mb-4 text-xl font-medium text-gray-900 underline">Detail Data Cicilan ({{ $loan->id }})</h3>
            <form class="space-y-6" wire:submit.prevent="updateLoan()">
                <div>
                    <label for="loan_id" class="block mb-2 text-sm font-medium text-gray-900">Nasabah</label>
                    <input type="text" value="{{ $loan->customer->name }}" disabled name="customer" id="customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div class="grid grid-cols-4 gap-x-2">
                    <div class=" col-span-3">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Pinjaman <span class="text-red-400 text-xs">*</span></label>
                        <div class="relative mb-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <span class="text-sm text-gray-700">Rp</span>
                            </div>
                            <input type="number" id="amount" wire:model.defer="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                        </div>
                        @error('amount')
                            <span class="text-red-400 text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="interest" class="block mb-2 text-sm font-medium text-gray-900">Bunga <span class="text-red-400 text-xs">*</span></label>
                        <div class="relative mb-2">
                            <input type="number" id="interest" wire:model.defer="interest" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5" required>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none">
                                <span class="text-sm text-gray-700">%</span>
                            </div>
                        </div>
                        @error('interest')
                            <span class="text-red-400 text-sm block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full">
                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Dimulai Cicilan <span class="text-red-400 text-xs">*</span></label>
                    <input type="date" name="start_date" id="start_date" required wire:model.debounce="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                    @error('start_date')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Akhir Cicilan <span class="text-red-400 text-xs">*</span></label>
                    <input type="date" name="end_date" id="end_date" wire:model.debounce="end_date" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="masukan jumlah dalam bentuk angka" required="">
                    @error('end_date')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full" >
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-400 text-xs">*</span></label>
                    <select name="status" id="status" wire:model="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        @if($status == true)
                        <option value="1" {{ $loan->status == true ? 'selected' : '' }}>Selesai</option>
                        <option value="0" {{ $loan->status == false ? 'selected' : '' }}>Berjalan</option>
                        @else
                        <option value="0" {{ $loan->status == false ? 'selected' : '' }}>Berjalan</option>
                        <option value="1" {{ $loan->status == true ? 'selected' : '' }}>Selesai</option>
                        @endif
                    </select>
                    <span class="text-red-400 text-xs">{{ $setStatusMsg != '' ? $setStatusMsg : '' }}</span>
                    @error('status')
                        <span class="text-red-400 text-xs block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="note" class="block mb-2 text-sm font-medium text-gray-900">Catatan </label>
                    <textarea id="note" rows="5" wire:model.defer="note" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Masukan catatan jika ada"></textarea>
                    @error('note')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-between">
                    <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                    <x-primary-button class="capitalize">Update</x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>

    <x-modal name="delete-loan" x-data={} focusable>
        <div @close-modal.window="show = false">
            <form method="post" wire:submit.prevent="destroyLoan" class="p-6">

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Apakah anda yakin ingin menghapus pinjaman ini?') }}
                </h2>
                @error('loan')
                <h2 class="text-lg font-medium text-gray-900">
                    {{ $message }}
                </h2>
                @enderror

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Ketika data ini dihapus, maka data yang telah dihapus tidak akan bisa dikembalikan?') }}
                </p>
                <div class="flex flex-col gap-y-2  py-2 px-6 border border-indigo-400 rounded-lg">
                    <div class="flex justify-between py-1.5 bg-gray-50">
                        <div class="items-end text-end">
                            Nasabah :
                        </div>
                        <div class="items-end">
                            ({{ $loan->customer_id }}) {{ $loan->customer->name }}
                        </div>
                    </div>
                    <div class="flex justify-between py-1.5">
                        <div class="items-end text-end">
                            Jumlah Pinjaman :
                        </div>
                        <div class="items-end">
                            Rp {{ number_format($loan->total, 0, ',', '.' ) }}
                        </div>
                    </div>
                    <div class="flex justify-between py-1.5 bg-gray-50">
                        <div class="items-end text-end">
                            Sisa Pinjaman :
                        </div>
                        <div class="items-end">
                            Rp {{ number_format($loan->remaining, 0, ',', '.' ) }}
                        </div>
                    </div>
                    <div class="flex justify-between py-1.5">
                        <div class="items-end text-end">
                            Terbayar :
                        </div>
                        <div class="items-end">
                            Rp {{ number_format($loan->paid, 0, ',', '.' ) }}
                        </div>
                    </div>
                </div>

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

    <x-modal name="show-installment" x-data={} focusable>
        @livewire('installment.show-installment')
    </x-modal>

    <x-modal name="delete-installment" x-data={} focusable>
        @livewire('installment.delete-installment')
    </x-modal>

</div>

