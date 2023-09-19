<div>
    <div class="px-6 py-6 lg:px-8" @close-modal.window="show = false">
        @if($selected_installment != null)
            <h3 class="mb-4 text-xl font-medium text-gray-900 underline"><a href="{{ route('loans.show', $selected_installment->loan->id) }}">Detail Data Cicilan ({{ $selected_installment->id }})</a></h3>
            <form class="space-y-6" wire:submit.prevent="updateInstallment()">
                <div>
                    <label for="loan_id" class="block mb-2 text-sm font-medium text-gray-900">ID Peminjaman</label>
                    <input type="number" value="{{ $selected_installment->loan_id }}" disabled name="loan_id" id="loan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Bayar <span class="text-red-400 text-xs">*</span></label>
                    <div class="relative mb-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <span class="text-sm text-gray-700">Rp </span>
                        </div>
                        <input type="number" id="amount" wire:model.defer="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                    </div>
                    <span class="text-gray-400 text-xs mt-1">Sisa cicilan adalah Rp <span class="font-bold text-black text-sm"> {{ number_format($selected_installment->loan->remaining, 0, ',', '.') }}</span></span>
                    @error('amount')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-between">
                    <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                    <x-primary-button>Save</x-primary-button>
                </div>
                <div class="text-sm font-medium text-gray-500">
                    <span class="mx-2">Ingin menghapus data?</span><button type="button" wire:click="openDeleteModal()" class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Hapus Data</button>
                </div>
            </form>
        @endif
    </div>
</div>
