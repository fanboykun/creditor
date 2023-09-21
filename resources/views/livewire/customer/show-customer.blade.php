<div>
    <x-slot name="breadcrumbs">
        Nasabah
        <x-slot name="breadcrumbs_child">
            Profil
        </x-slot>
    </x-slot>
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
                        <a href="{{ route('customers.list-loan', $customer) }}" wire:navigate class="hover:bg-slate-800 hover:text-white hover:drop-shadow-lg drop-shadow-md inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 capitalize tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Semua Pinjaman
                        </a>
                        <a href="{{ route('customers.list-installment', $customer) }}" wire:navigate class="hover:bg-slate-800 hover:text-white hover:drop-shadow-lg drop-shadow-md inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 capitalize tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Semua Cicilan
                        </a>
                        <x-secondary-button x-on:click="$dispatch('open-modal', 'edit-customer')">
                            Edit Data
                        </x-secondary-button>
                        <button type="button" wire:click="checkActiveLoan({{ $customer }})" wire:loading.attr="disabled" wire:loading.class="opacity-50" class="flex items-center mt-2 justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 sm:font-medium tracking-widest rounded-lg font-normal text-xs px-4 py-2.5 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
                            </svg>
                            Tambah Pinjaman Baru
                        </button>
                        <div wire:loading.class="inline-flex" wire:loading.class.remove="hidden" wire:target="checkActiveLoan" class="py-2 hidden items-center justify-center space-x-1 font-semibold text-gray-500 text-sm animate-pulse">
                            <span>Sedang Memeriksa</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 fill-current animate-spin">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

    <x-modal name="edit-customer" x-data={} focusable>
        <div class="px-6 py-6 lg:px-8" @close-modal.window="show = false">
            <h3 class="mb-4 text-xl font-medium text-gray-900 underline">Edit Data {{ $customer->name }}</h3>
            <form class="space-y-6" wire:submit="updateCustomer()">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Nasabah <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('name')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="card_number" class="block mb-2 text-sm font-medium text-gray-900">Nomor Ktp <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model="card_number" name="card_number" id="card_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('card_number')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model="phone" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('phone')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat <span class="text-red-400 text-xs">*</span></label>
                    <input type="text" wire:model="address" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    @error('address')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                    <input type="date" wire:model="birth_date" name="birth_date" id="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
            <form method="post" wire:submit="destroyCustomer" class="p-6">

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
