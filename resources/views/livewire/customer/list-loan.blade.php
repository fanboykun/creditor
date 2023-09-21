<div>
    <x-slot name="breadcrumbs">
        Nasabah
        <x-slot name="breadcrumbs_child">
            List Pinjaman
        </x-slot>
    </x-slot>
    <section class="bg-gray-50 ">
        <div class="mx-auto max-w-auto">
            <div class="relative overflow-hidden bg-white shadow-md  sm:rounded-lg">
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                                List dari Semua Cicilan {{ $customer?->name }}
                            </h2>
                        </div>
                        <div class="flex items-center flex-1 space-x-4">
                            <h5>
                                <span class="text-gray-500">Total Uang Yang Dipinjamkan</span>
                                <span class="font-bold text-lg text-indigo-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </h5>
                            <h5>
                                <span class="text-gray-500">Total Pinjaman</span>
                                <span class="font-bold text-lg text-indigo-900">{{ $count }}</span>
                            </h5>
                        </div>
                    </div>
                </header>
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="w-full md:w-1/2">
                        <div class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input wire:model.live.debounce.500ms="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari pinjaman berdasarkan id peminjaman" required="">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <select wire:model.live.debounce.500ms="filter_status" name="filter_status" id="filter_status" class="rounded-lg">
                            <option disabled value="">Pilih Status</option>
                            <option value="1">Lunas</option>
                            <option value="0">Belum Lunas</option>
                        </select>
                        <button type="button" wire:click="checkActiveLoan({{ $customer }})" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah Peminjaman Baru
                        </button>
                        <div wire:loading.class="inline-flex" wire:loading.class.remove="hidden" wire:target="checkActiveLoan" class="py-2 hidden items-center justify-center space-x-1 font-semibold text-gray-500 text-sm animate-pulse">
                            <span>Sedang Memeriksa</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 fill-current animate-spin">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto max-h-96">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-4 py-3">ID</th>
                                <th scope="col" class="px-4 py-3">Nasabah</th>
                                <th scope="col" class="px-4 py-3">Jumlah</th>
                                <th scope="col" class="px-4 py-3">Total</th>
                                <th scope="col" class="px-4 py-3">Terbayar</th>
                                <th scope="col" class="px-4 py-3">Sisa</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Dibuat</th>
                                <th scope="col" class="px-4 py-3">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($loans as $loan)
                            <tr class="border-b hover:bg-gray-100 ">
                                <th scope="row" class="items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    <span class="text-sm text-gray-500 block">{{ $loan->id }}</span>
                                </th>
                                <td class="items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loan->customer->name }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    Rp {{ number_format($loan->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    Rp {{ number_format($loan->total, 0, ',', '.') }}
                                    <span class="block text-xs font-light text-gray-600">{{ $loan->interest }} %</span>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    Rp {{ number_format($loan->paid, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    Rp {{ number_format($loan->remaining, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    @if ($loan->status == true)
                                    <div class="flex items-right">
                                        <div class="inline-block w-4 h-4 mr-2 bg-green-700 rounded-full"></div>
                                        {{-- Lunas --}}
                                    </div>
                                    @else
                                    <div class="flex items-right">
                                        <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"></div>
                                       {{-- Belum Lunas --}}
                                    </div>
                                    @endif
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    <div class="flex items-center">
                                       {{ \Carbon\Carbon::parse($loan->created_at)->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-xs break-words">
                                    <a href="{{ route('loans.show', $loan->id) }}" wire:navigate class="hover:bg-blue-200 text-blue-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded-md border border-blue-400 inline-flex items-center justify-center">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="px-4 py-2 text-center">Data Tidak Ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500">
                        Menampilkan
                        <span class="font-semibold text-gray-900">{{ $loans->firstItem() }}</span>
                        dari
                        <span class="font-semibold text-gray-900">{{ $loans?->total() }}</span>
                    </span>
                    <button type="button" wire:click="loadMore()" class="text-sm font-normal text-indigo-600 ">
                        Muat Lebih ...
                    </button>
                </nav>
            </div>
        </div>
      </section>

      <x-modal name="loan-active-exist" focusable>
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
                <h3 class="mb-5 text-lg font-normal text-gray-500">Nasabah ini tidak dapat membuat pinjaman baru karena sedang ada pinjaman berjalan yang belum lunas</h3>
                <x-secondary-button x-on:click="$dispatch('close')">Ok, Dimengerti!</x-secondary-button>
            </div>
        </div>
    </x-modal>

</div>

