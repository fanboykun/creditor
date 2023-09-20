<div>
    <x-slot name="breadcrumbs">
        Home
        <x-slot name="breadcrumbs_child">
            Dashboard
        </x-slot>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="text-gray-900">

            <div class="container items-center">
                <header class="bg-white shadow text-gray-50 px-2 py-2">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-12 bg-gradient-to-br from-purple-400 via-blue-400 to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl">
                        <div class="grid grid-cols-2 gap-x-4">
                            <h2 class="flex justify-end text-end items-center font-semibold text-xl  leading-tight">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M2.273 5.625A4.483 4.483 0 015.25 4.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0018.75 3H5.25a3 3 0 00-2.977 2.625zM2.273 8.625A4.483 4.483 0 015.25 7.5h13.5c1.141 0 2.183.425 2.977 1.125A3 3 0 0018.75 6H5.25a3 3 0 00-2.977 2.625zM5.25 9a3 3 0 00-3 3v6a3 3 0 003 3h13.5a3 3 0 003-3v-6a3 3 0 00-3-3H15a.75.75 0 00-.75.75 2.25 2.25 0 01-4.5 0A.75.75 0 009 9H5.25z" />
                                </svg>
                                <span class="text-sm sm:text-lg"> Proyeksi Keuntungan </span>
                            </h2>
                            <h2 class="flex justify-start items-center font-semibold text-xl leading-tight">
                                <span class="text-sm sm:text-lg">Rp {{ number_format($profit, 0, ',', '.') }}</span>
                            </h2>
                        </div>
                    </div>
                </header>
                <div class="flex flex-wrap pb-3 mx-2 lg:mx-0">
                  <div class="w-full p-2 lg:w-1/2 md:w-1/2">
                    <div class="flex flex-col px-6 py-10 overflow-hidden text-gray-50 bg-gradient-to-br from-purple-400 via-blue-400 to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                      <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-50  rounded-xl bg-opacity-30">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6 bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                          </svg>
                        </div>
                      </div>
                      <h1 class="text-3xl font-bold text-gray-50 mt-8 group-hover:text-gray-50">{{ $customers_count }} <span class="text-sm">Orang Nasabah</span></h1>
                      <div class="flex flex-row justify-between ">
                        <p>Total Nasabah Terdaftar Yang Meminjam</p>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                              clip-rule="evenodd" />
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="w-full p-2 lg:w-1/2 md:w-1/2">
                    <div class="flex flex-col px-6 py-10 overflow-auto text-gray-50 bg-gradient-to-br from-purple-400 via-blue-400 to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                      <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-50  rounded-xl bg-opacity-30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </div>
                      </div>
                      <h1 class="text-3xl font-bold text-gray-50 mt-8 group-hover:text-gray-50"><span class="text-sm"> Rp </span> {{ number_format($loans_total, 0, ',', '.' ) }}</h1>
                      <div class="flex flex-row justify-between ">
                        <p>Total Uang Yang Dipinjamkan</p>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                              clip-rule="evenodd" />
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="w-full p-2 lg:w-1/2 md:w-1/2">
                    <div class="flex flex-col px-6 py-10 overflow-hidden text-gray-50 bg-gradient-to-br from-purple-400 via-blue-400 to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                      <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-50  rounded-xl bg-opacity-30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 4.5l-15 15m0 0h11.25m-11.25 0V8.25" />
                            </svg>
                        </div>
                      </div>
                      <h1 class="text-3xl font-bold text-gray-50 mt-8 group-hover:text-gray-50"><span class="text-sm"> Rp </span>{{ number_format($paid_installments, 0, ',', '.' ) }}</h1>
                      <div class="flex flex-row justify-between ">
                        <p>Total Pinjaman Yang Sudah Dibayar</p>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                              clip-rule="evenodd" />
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="w-full p-2 lg:w-1/2 md:w-1/2">
                    <div class="flex flex-col px-6 py-10 overflow-auto text-gray-50 bg-gradient-to-br from-purple-400 via-blue-400 to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                      <div class="flex flex-row justify-between items-center">
                        <div class="px-4 py-4 bg-gray-50  rounded-xl bg-opacity-30">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </div>
                      </div>
                      <h1 class="text-3xl font-bold text-gray-50 mt-8 group-hover:text-gray-50"><span class="text-sm"> Rp </span> {{ number_format($remaining_installments, 0, ',', '.' ) }}</h1>
                      <div class="flex flex-row justify-between ">
                        <p>Total Pinjaman Yang Belum Dibayar</p>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                              clip-rule="evenodd" />
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
</div>
