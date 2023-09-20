<div>
    <x-slot name="breadcrumbs">
        Nasabah
        <x-slot name="breadcrumbs_child">
            List Cicilan
        </x-slot>
    </x-slot>
    <section>
        <div class="mx-auto w-auto">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                                List dari Semua Cicilan <a href="{{ route('customers.profile', $customer) }}" class="underline">{{ $customer?->name }}</a>
                            </h2>
                        </div>
                    </div>
                </header>
                <!-- Header -->
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
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
                                <th scope="col" class="px-4 py-3 text-left">Id Cicilan</th>
                                <th scope="col" class="px-4 py-3 text-right">Jumlah Pembayaran Cicilan</th>
                                <th scope="col" class="px-4 py-3 text-center">Tanggal Dibuat</th>
                                <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="min-w-full">
                        @forelse ($customer->loans as $loan)
                            <tr>
                                <td colspan="5" class="bg-slate-800 shadow-md text-white text-md ">
                                    <span class="flex ml-4 items-center justify-center"> ({{ $loan->id }}) Rp {{ number_format($loan->total, 0, ',', '.') }} - {{ $loan->status == false ? 'Berjalan' : 'Selesai' }}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="ml-2 my-auto w-5 h-5">
                                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v13.19l5.47-5.47a.75.75 0 111.06 1.06l-6.75 6.75a.75.75 0 01-1.06 0l-6.75-6.75a.75.75 0 111.06-1.06l5.47 5.47V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </td>
                            </tr>
                                @forelse ($loan->installments as $installment)
                                    <tr class="border-b hover:bg-gray-100 items-center even:bg-slate-50">
                                        <td class="px-4 py-2 font-medium text-gray-900 break-words">
                                            {{ $installment->id }}
                                            <span class="text-sm text-gray-400 ml-1 block">ID Pinjaman : {{ $installment->loan_id }}</span>
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 text-right items-center break-words">
                                        Rp {{ number_format($installment->amount, 0, ',', '.' ) }}
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 text-center break-words">
                                            {{ $installment->created_at->format('H:i-l, d/F/Y') }}
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
        @livewire('installment.show-installment')
    </x-modal>

    <x-modal name="delete-installment" x-data={} focusable>
        @livewire('installment.delete-installment')
    </x-modal>
</div>
