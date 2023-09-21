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
                                List dari Semua Cicilan <a href="{{ route('customers.profile', $customer) }}" wire:navigate class="underline">{{ $customer?->name }}</a>
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
                                <input wire:model.live.debounce.500="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari cicilan berdasarkan id pinjaman" required="">
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" wire:click="checkActiveLoan" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                            </svg>
                            Buat Cicilan Baru
                        </button>
                        <div wire:loading.class="inline-flex" wire:loading.class.remove="hidden" wire:target="checkActiveLoan" class="py-2 hidden items-center justify-center space-x-1 font-semibold text-gray-500 text-sm animate-pulse">
                            <span>Sedang Memeriksa</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 fill-current animate-spin">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="overflow-x-auto min-h-40 max-h-[65vh]">
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
                        @forelse ($customer->loans->sortByDesc('updated_at') as $loan)
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
                                            <button type="button" x-on:click="$dispatch('show-installment-modal', {installment: {{ $installment }}})" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-blue-400">Detail</button>
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

    <x-modal name="loan-active-doesnt-exist" focusable>
        <div class="relative bg-white rounded-lg shadow" x-on:close-modal.window="show = false">
            <button type="button" x-on:click="$dispatch('close')" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-orange-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Tidak dapat membayar cicilan karena nasabah ini tidak punya pinjaman aktif</h3>
                <x-secondary-button x-on:click="$dispatch('close')">Ok, Dimengerti!</x-secondary-button>
            </div>
        </div>
    </x-modal>
</div>
