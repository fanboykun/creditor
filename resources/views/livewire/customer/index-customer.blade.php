<div>
   <section class="bg-gray-50">
        <div class="mx-auto w-auto">
            <div x-data="{table: false}" class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                                List dari Semua Nasabah
                            </h2>
                        </div>
                        <div class="flex">
                            <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center">
                                <li class="mr-2">
                                    <button x-on:click="table = false"
                                    :class="table ? 'border-transparent hover:border-gray-300 text-gray-400' : 'text-blue-600 border-blue-600'"
                                     class="inline-flex p-4 border-b-2 rounded-t-lg group text-blue-600 border-blue-600" aria-current="page">
                                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        Grid
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button x-on:click="table = true" :class="table ? 'text-blue-600 border-blue-600' : 'border-transparent hover:border-gray-300'"
                                    class="inline-flex p-4 border-b-2 rounded-t-lg group">
                                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                                        Table
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <!-- Header -->
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input wire:model.debounce.500ms="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari berdasarkan nama atau no telpon" required="">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('customers.create') }}" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                            </svg>
                            Tambah Nasabah Baru
                        </a>
                    </div>
                </div>
                <!-- Data -->
                <div class="flex overflow-x-auto">
                    <!-- Table -->
                    <div
                        x-show="table == true" x-cloak
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="translate-x-full overflow-hidden"
                        x-transition:enter-end="translate-x-0 overflow-auto"
                        {{-- x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="translate-x-full" --}}
                        class="w-screen min-w-full">
                        <div class="overflow-x-auto w-full max-h-96">
                            <table class="w-full table-auto text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr class="">
                                        <th scope="col" class="px-4 py-3 w-4">ID</th>
                                        <th scope="col" class="px-4 py-3">Nama</th>
                                        <th scope="col" class="px-4 py-3 min-w-64">Alamat</th>
                                        <th scope="col" class="px-4 py-3">No Telp</th>
                                        <th scope="col" class="px-4 py-3">No Ktp</th>
                                        <th scope="col" class="px-4 py-3">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                        <tr class="border-b hover:bg-gray-100 even:bg-slate-50">
                                            <td class="px-4 w-4 py-2 font-medium text-gray-900">
                                                {{ $customer->id }}
                                            </td>
                                            <td class="px-4 py-2 font-medium text-gray-900">
                                                {{ $customer->name }}
                                            </td>
                                            <td class="px-4 py-2 font-medium text-gray-900">
                                                {{ $customer->address }}
                                            </td>
                                            <td class="px-4 py-2 font-medium text-gray-900">
                                                {{ $customer->phone }}
                                            </td>
                                            <td class="px-4 py-2 font-medium text-gray-900">
                                                {{ $customer->card_number }}
                                            </td>
                                            <td class="px-4 py-2 font-medium text-gray-900">
                                                <div class="flex gap-x-2 justify-center">
                                                    <div class="relative top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg text-indigo-600 border border-indigo-600 hover:text-white hover:bg-indigo-600/90">
                                                        <a href="{{ route('customers.profile', $customer) }}">
                                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
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
                    </div>
                    <!-- Card -->
                    <div
                        x-show="table == false"
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="-translate-x-full opacity-0"
                        x-transition:enter-end="-translate-x-50 opacity-100"
                        {{-- x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="-translate-x-full"
                        x-transition:leave-end="translate-x-0" --}}
                        class="w-screen min-w-full">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-4 gap-x-2 pb-4 mx-auto w-full">
                            @forelse ($customers as $customer)
                            <div class="w-full max-w-xs bg-white border-2 border-indigo-500 rounded-lg shadow-lg shadow-indigo-600/40 mx-auto">
                                <div class="flex justify-end px-4 pt-1">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500  hover:bg-gray-100  focus:ring-2 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5" type="button">
                                                <span class="sr-only">Open dropdown</span>
                                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content" class="shadow-xl">
                                            <x-dropdown-link :href="route('customers.profile', $customer)">
                                                {{ __('Profil Nasabah') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('customers.list-loan', $customer)">
                                                {{ __('Lihat Semua Pinjaman') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('customers.list-installment', $customer)">
                                                {{ __('Lihat Semua Cicilan') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                                <div class="flex flex-col items-center">
                                    {{-- {{ $customer->loans }} --}}
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 ">{{ $customer->name }}</h5>
                                    <div class="grid gap-y-2">
                                        <div class="grid grid-cols-2 border-b">
                                            <div class="px-4 w-full">
                                                <span class="text-sm items-start text-gray-900 ">ID</span>
                                            </div>
                                            <div class="px-4 w-full">
                                                <span class="text-sm items-start text-gray-900 ">{{ $customer->id }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 border-b">
                                            <div class="px-4 w-full">
                                                <span class="text-sm items-start text-gray-900 ">No Telpon</span>
                                            </div>
                                            <div class="px-4 w-full">
                                                <span class="text-sm items-start text-gray-900 ">{{ $customer->phone }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 border-b">
                                            <div class="px-4 w-full">
                                                <span class="text-sm items-start text-gray-900 ">Pinjaman Berjalan</span>
                                            </div>
                                            <div class="px-4 w-full">
                                                <span class="text-sm font-semibold items-start text-indigo-800 ">{{ number_format($customer->loans?->first()?->total, 0, ',', '.' ) }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 border-b">
                                            <div class="px-4 w-full">
                                                <span class="text-sm items-start text-gray-900 ">Pinjaman Berjalan Terbayar</span>
                                            </div>
                                            <div class="px-4 w-full">
                                                <span class="text-sm font-semibold items-start text-emerald-600 ">Rp {{ number_format($customer->loans?->first()?->paid), 0, ',', '.'  }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 border-b">
                                            <div class="px-4 w-full">
                                                <span class="text-sm items-start text-gray-900 ">Pinjaman Berjalan Belum Terbayar</span>
                                            </div>
                                            <div class="px-4 w-full">
                                                <span class="text-sm font-semibold items-start text-red-500">Rp {{ number_format($customer->loans?->first()?->remaining, 0, ',', '.' ) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inline-flex rounded-md shadow-sm mb-2 mt-4" role="group">
                                        <a href="{{ route('customers.new-loan', $customer->id) }}" type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900/50 rounded-l-lg hover:bg-indigo-600 hover:text-white focus:z-10 focus:ring-1 focus:ring-gray-200 focus:bg-indigo-700 focus:text-white ">
                                            <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
                                            Pinjaman Baru
                                        </a>
                                        <a href="{{ route('customers.active-installment', $customer) }}" type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900/50 rounded-r-lg hover:bg-indigo-600 hover:text-white focus:z-10 focus:ring-1 focus:ring-gray-200 focus:bg-indigo-700 focus:text-white ">
                                            <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
                                            Bayar Cicilan
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="flex lg:col-span-3 mx-auto w-full justify-center py-4">
                                <h5 class="mb-1 text-md font-medium text-gray-900/80 font-mono">Data Tidak Ditemukan</h5>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 ">
                        Menampilkan
                        <span class="font-semibold text-gray-900 ">{{ count($customers) }}</span>
                        dari
                        <span class="font-semibold text-gray-900 ">{{ $customers->count() }}</span>
                    </span>
                    <button type="button" wire:click="loadMore()" class="text-sm font-normal text-indigo-600 ">
                        Muat Lebih ...
                    </button>
                </nav>
            </div>
        </div>
    </section>
</div>
