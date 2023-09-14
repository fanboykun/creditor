<div>
    <div class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 drop-shadow-lg">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="px-4 sm:px-0">
                    <h3 class="mb-4 text-2xl font-bold text-gray-700">Profil Nasabah <span class="underline">{{ $customer->name }}</span></h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Detail pribadi nasabah</p>
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama Lengkap</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->name }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">ID</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->id }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nomor KTP</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->card_number }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Alamat Rumah</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->address }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Waktu Terdaftar</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->created_at->format('d F Y') }}</dd>
                      </div>
                      <div class="px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Jumlah Pinjaman</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->loans_count }}</dd>
                      </div>
                    </dl>
                    <div class="block sm:flex sm:items-end sm:justify-end">
                        <a href="{{ route('customers.list-loan', $customer) }}" class="hover:bg-slate-800 hover:text-white hover:drop-shadow-lg drop-shadow-md inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 capitalize tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Lihat Semua Cicilan
                        </a>
                        <x-secondary-button class="capitalize mx-2 drop-shadow-md hover:bg-slate-800 hover:text-white hover:drop-shadow-lg">
                            Edit Data
                        </x-secondary-button>
                        <a href="{{ route('customers.create') }}" class="flex items-center mt-2 justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 sm:font-medium tracking-widest rounded-lg font-normal text-xs px-4 py-2.5 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                            </svg>
                            Tambah Pinjaman Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>

</div>
