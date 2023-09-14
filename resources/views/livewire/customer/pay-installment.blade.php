<div>
    <section class="bg-gray-100 py-2">
        <div class="w-full mx-auto space-y-6 drop-shadow-lg">
            <div class="pl-4 sm:pl-8 py-2 grid sm:grid-cols-4 bg-white">
                <div class="col-span-3">
                    <h2 class="mb-4 text-2xl font-bold text-gray-700">Bayar Cicilan</h2>
                    <form wire:submit.prevent="addNewInstallment()">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nasabah <span class="text-red-400 text-xs">*</span></label>
                                <input type="text" readonly id="selected_customer_info" name="selected_customer_info" value="{{ $customer_info }}" class="block w-full py-2.5  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pilih Nasabah" required>
                            </div>
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">ID Pinjaman <span class="text-red-400 text-xs">*</span></label>
                                <input type="text" readonly id="loan_id" name="loan_id" value="{{ $loan->id }}" class="block w-full py-2.5  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pilih Nasabah" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Bayar <span class="text-red-400 text-xs">*</span></label>
                                <div class="relative mb-6">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                      <span class="text-sm text-gray-700">Rp</span>
                                    </div>
                                    <input type="number" id="amount" wire:model.defer="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                                </div>
                                @error('amount')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <x-primary-button class="mt-4" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="addNewLoan">Simpan</x-primary-button>
                    </form>
                </div>
                <div class=" bg-white pl-2 ml-2 rounded-lg">
                    <div class="mt-2 pr-2 mr-2">
                        <h2 class="mb-4 text-2xl font-bold text-gray-700 text-center">Info Cicilan</h2>
                        <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Jumlah : <span class="text-end">Rp 1.000.000</span></p>
                        <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Sisa : <span class="text-end">Rp 400.000</span></p>
                        <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Terbayar : <span class="text-end">Rp 100.000</span></p>
                        <p class="flex justify-between mb-4 text-sm font-bold text-gray-700 text-start">Cicilan : <span class="text-end">3x</span></p>
                        <div class="divide-y space-y-1 divide-blue-200">
                            <div class="py-2 bg-gray-100 rounded-xl px-1.5 text-gray-600">
                                <span class="text-xs text-indigo-500 leading-5 bg-white w-fit px-1.5 rounded-full">{{ now()->format('d F, Y') }}</span>
                                <span class="block px-1 leading-5 font-semibold">Rp 500.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
