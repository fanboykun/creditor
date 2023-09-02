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
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nama Lengkap</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->name }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">ID</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->id }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nomor KTP</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->card_number }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Alamat Rumah</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->address }}</dd>
                      </div>
                      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Waktu Terdaftar</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $customer->created_at->format('d F Y') }}</dd>
                      </div>
                    </dl>
                </div>
            </div>
        </div>
      </div>

</div>
