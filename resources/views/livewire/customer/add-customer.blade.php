<div>
    <x-primary-button wire:click.prevent="addNewCustomer()">Add Customer</x-primary-button>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
            {{ session('message') }}
        </div>
    @endif
</div>
