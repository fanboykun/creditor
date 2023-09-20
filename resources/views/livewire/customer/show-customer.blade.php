<div>
    <div class="bg-gray-100 py-2">
        <div class="w-full mx-auto lg:px-8 space-y-6 drop-shadow-lg">
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
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nomor Telpon</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->phone }}</dd>
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
                    <div class="block sm:flex sm:items-end sm:justify-end gap-x-2">
                        <a href="{{ route('customers.list-loan', $customer) }}" class="hover:bg-slate-800 hover:text-white hover:drop-shadow-lg drop-shadow-md inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 capitalize tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Semua Pinjaman
                        </a>
                        <a href="{{ route('customers.list-installment', $customer) }}" class="hover:bg-slate-800 hover:text-white hover:drop-shadow-lg drop-shadow-md inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 capitalize tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Semua Cicilan
                        </a>
                        <x-secondary-button x-on:click="$dispatch('open-modal', 'edit-customer')">
                            Edit Data
                        </x-secondary-button>
                        <a href="{{ route('customers.new-loan', $customer) }}" class="flex items-center mt-2 justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 sm:font-medium tracking-widest rounded-lg font-normal text-xs px-4 py-2.5 focus:outline-none">
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

    <x-modal name="edit-customer" x-data={} focusable>
        <div class="px-6 py-6 lg:px-8" @close-modal.window="show = false">
            <h3 class="mb-4 text-xl font-medium text-gray-900 underline">Edit Data {{ $customer->name }}</h3>
            <form class="space-y-6" wire:submit.prevent="updateCustomer()">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Nasabah <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model.defer="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('name')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="card_number" class="block mb-2 text-sm font-medium text-gray-900">Nomor Ktp <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model.defer="card_number" name="card_number" id="card_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('card_number')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model.defer="phone" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('phone')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model.defer="address" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('address')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                    <input type="date" wire:model.defer="birth_date" name="birth_date" id="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('birth_date')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-between">
                    <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                    <x-primary-button>Save</x-primary-button>
                </div>
                <div class="text-sm font-medium text-gray-500">
                    <span class="mx-2">Ingin menghapus data?</span><button type="button" wire:click="deleteCustomer" class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Hapus Data</button>
                </div>
            </form>
        </div>
    </x-modal>

    <x-modal name="delete-customer" x-data={} focusable>
        <div @close-modal.window="show = false">
            <form method="post" wire:submit.prevent="destroyCustomer" class="p-6">

                <h2 class="text-lg font-medium text-gray-900">
                   Apakah anda yakin ingin menghapus customer <span class="underline">{{ $customer->name }}</span>
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Ketika data ini dihapus, maka akan mempengaruhi Pinjaman dan data yang telah dihapus tidak akan bisa dikembalikan?') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Customer') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>

</div>
