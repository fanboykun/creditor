<div>
    @if (session()->has('message'))
        <div id="toast-success" class="flex fixed top-5 z-50 right-2 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session('message') }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    <section class="bg-gray-50">
        <div class="bg-white rounded-xl mt-8 shadow-xl border-1 py-8 px-12 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-2xl font-bold text-gray-700">Tambah Nasabah Baru</h2>
            <form wire:submit.prevent="addNewCustomer">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Nasabah <span class="text-red-400 text-xs">*</span></label>
                        <input type="text" name="name" id="name" wire:model.defer="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        @error('name')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon <span class="text-red-400 text-xs">*</span></label>
                        <input type="text" name="phone" id="phone" wire:model.defer="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        @error('phone')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Nomor KTP <span class="text-red-400 text-xs">*</span></label>
                        <input type="number" name="card_number" minlength="10" id="card_number" wire:model.defer="card_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        @error('card_number')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat <span class="text-red-400 text-xs">*</span></label>
                        <textarea id="address" rows="5" wire:model.defer="address" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Ketik alamat disini"></textarea>
                        @error('address')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <x-primary-button class="mt-4">Add Customer</x-primary-button>
            </form>
        </div>
    </section>
</div>
