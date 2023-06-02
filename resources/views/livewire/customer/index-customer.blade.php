<div>
   <section class="bg-gray-50">
        <div class="mx-auto w-auto">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                                List dari Semua Nasabah
                            </h2>
                        </div>
                        <div class="flex">
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
                                <input wire:model.debounce.500="s" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Cari berdasarkan nama atau no telpon" required="">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="http://tembong.test/create-product" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                            </svg>
                            Tambah Nasabah Baru
                        </a>
                    </div>
                </div>

                @if($tab == 'table')
                <!-- Table -->
                <div class="overflow-x-auto max-h-96">
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
                            @foreach ($customers as $customer)
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
                                            <div class="relative top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600/90">
                                                <a href="#">
                                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="relative top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-600/90">
                                                <a href="#" type="button">
                                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="relative top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-red-600/95 hover:bg-red-600">
                                                <button x-data="" type="button">
                                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @elseif($tab == 'grid')
                <!-- Card -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-4 gap-x-2 justify-center pb-4">
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
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        <div class="flex flex-col items-center">
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
                                        <span class="text-sm font-semibold items-start text-indigo-800 ">Rp 1.000.000</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 border-b">
                                    <div class="px-4 w-full">
                                        <span class="text-sm items-start text-gray-900 ">Pinjaman Berjalan Terbayar</span>
                                    </div>
                                    <div class="px-4 w-full">
                                        <span class="text-sm font-semibold items-start text-emerald-600 ">Rp 800.000</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 border-b">
                                    <div class="px-4 w-full">
                                        <span class="text-sm items-start text-gray-900 ">Pinjaman Berjalan Belum Terbayar</span>
                                    </div>
                                    <div class="px-4 w-full">
                                        <span class="text-sm font-semibold items-start text-red-500">Rp 200.000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex rounded-md shadow-sm mb-2 mt-4" role="group">
                                <button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900/50 rounded-l-lg hover:bg-indigo-600 hover:text-white focus:z-10 focus:ring-1 focus:ring-gray-200 focus:bg-indigo-700 focus:text-white ">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                                    Profile
                                </button>
                                <button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900/50 hover:bg-indigo-600 hover:text-white focus:z-10 focus:ring-1 focus:ring-gray-200 focus:bg-indigo-700 focus:text-white ">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
                                    Settings
                                </button>
                                <button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900/50 rounded-r-md hover:bg-indigo-600 hover:text-white focus:z-10 focus:ring-1 focus:ring-gray-200 focus:bg-indigo-700 focus:text-white ">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
                                    Downloads
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="flex lg:col-span-3 mx-auto w-full justify-center py-4">
                        <h5 class="mb-1 text-xl font-medium text-gray-900/80 font-mono">Belum Ada Data !!!</h5>
                    </div>
                    @endforelse

                </div>
                @endif
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
