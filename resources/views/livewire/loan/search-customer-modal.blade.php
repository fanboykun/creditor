<div>
    <div class="flex items-center justify-between border-b-2">
        <h1 class="flex items-center p-2 font-bold">Pilih Nasabah</h1>
        <button type="button" class="flex items-start justify-end p-1.5 mr-1 rounded-lg  text-red-400 hover:bg-red-500 hover:text-white" x-on:click="$dispatch('close')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="flex items-center justify-center my-2 border-b-2 mx-auto text-xs text-gray-400">
        hanya menunjukan data nasabah yang tidak memiliki pinjaman yang sedang berjalan (pinjaman belum lunas)
    </div>
    <div class="w-auto my-2 mx-2">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="search" name="search" wire:model.live.debounce.500ms="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari berdasarkan ID atau nama customer">
        </div>
    </div>
    <ul class="divide-y divide-gray-200 p-8 max-h-60 overflow-y-auto">
        @forelse ($customers as $customer)
        <li class="pb-3 sm:pb-4">
           <div class="flex items-center space-x-4">
              <div class="flex-shrink-0">
                <span>{{ $customer->id  }}</span>
              </div>
              <div class="flex-1 min-w-0">
                 <p class="text-sm font-medium text-gray-900 truncate ">
                    {{ $customer->name }}
                 </p>
                 <p class="text-sm text-gray-500 truncate">
                    {{ $customer->card_number }}
                 </p>
              </div>
              <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                 <button type="button" wire:click="selectCustomer({{ $customer->id }})" class="px-2 py-1 bg-indigo-400 hover:bg-indigo-600 focus:ring-indigo-200 rounded-lg text-white font-normal text-sm">Pilih</button>
              </div>
           </div>
        </li>
        @empty
        No Data!
        @endforelse
    </ul>
    <div class="flex items-end justify-end my-2 border-t-2 mx-4 py-4">
        <button type="button" wire:click="loadMore()" class="text-sm font-normal text-indigo-600 ">
            Muat Lebih ...
        </button>
    </div>
</div>
