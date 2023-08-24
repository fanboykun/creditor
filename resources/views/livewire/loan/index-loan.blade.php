<div>
    <section class="bg-gray-50 ">
        <div class="mx-auto max-w-auto">
            <div class="relative overflow-hidden bg-white shadow-md  sm:rounded-lg">
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                                List dari Semua Cicilan
                            </h2>
                        </div>
                        <div class="flex items-center flex-1 space-x-4">
                            <h5>
                                <span class="text-gray-500">Total Uang Yang Dipinjamkan</span>
                                <span class="font-bold text-lg text-indigo-900">Rp {{ number_format($loans->sum('amount'), 0, ',', '.') }}</span>
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
                                <input wire:model.debounce.500="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari pinjaman berdasarkan id peminjaman" required="">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <a href="{{ route('loans.create') }}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah Peminjaman Baru
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto max-h-96">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-4 py-3">ID</th>
                                <th scope="col" class="px-4 py-3">Nasabah</th>
                                <th scope="col" class="px-4 py-3">Jumlah</th>
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
                                    Rp {{ number_format($loan->paid, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    Rp {{ number_format($loan->remaining, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    @if ($loan->status == true)
                                    <div class="flex items-center">
                                        <div class="inline-block w-4 h-4 mr-2 bg-green-700 rounded-full"></div>
                                        Lunas
                                    </div>
                                    @else
                                    <div class="flex items-center">
                                        <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"></div>
                                       Belum Lunas
                                    </div>
                                    @endif
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    <div class="flex items-center">
                                       {{ \Carbon\Carbon::parse($loan->created_at)->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-xs break-words">
                                    <a href="" class="hover:bg-blue-200 text-blue-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded-md border border-blue-400 inline-flex items-center justify-center">
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
                        <span class="font-semibold text-gray-900">{{ $loans?->count() }}</span>
                    </span>
                    <button type="button" wire:click="loadMore()" class="text-sm font-normal text-indigo-600 ">
                        Muat Lebih ...
                    </button>
                </nav>
            </div>
        </div>
      </section>
</div>
