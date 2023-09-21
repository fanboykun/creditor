<div>
    <div @close-modal.window="show = false">
        <form method="post" wire:submit="destroyInstallment" class="p-6">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah anda yakin ingin menghapus cicilan ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ketika data ini dihapus, maka akan mempengaruhi Pinjaman dan data yang telah dihapus tidak akan bisa dikembalikan?') }}
            </p>
            @if($selected_installment != null)
            <div class="flex flex-col gap-y-2  py-2 px-6 border border-indigo-400 rounded-lg">
                <div class="flex justify-between py-1.5 bg-gray-50">
                    <div class="items-end text-end">
                        Nasabah :
                    </div>
                    <div class="items-end">
                        {{ $selected_installment->loan->customer->name }}
                    </div>
                </div>
                <div class="flex justify-between py-1.5">
                    <div class="items-end text-end">
                        Jumlah Pinjaman :
                    </div>
                    <div class="items-end">
                        Rp {{ number_format($selected_installment->loan->total, 0, ',', '.' ) }}
                    </div>
                </div>
                <div class="flex justify-between py-1.5 bg-gray-50">
                    <div class="items-end text-end">
                        Sisa Pinjaman :
                    </div>
                    <div class="items-end">
                        Rp {{ number_format($selected_installment->loan->remaining, 0, ',', '.' ) }}
                    </div>
                </div>
                <div class="flex justify-between py-1.5">
                    <div class="items-end text-end">
                        Terbayar :
                    </div>
                    <div class="items-end">
                        Rp {{ number_format($selected_installment->loanpaid, 0, ',', '.' ) }}
                    </div>
                </div>
            </div>
            @endif

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Installment') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</div>
