<div class="h-full px-3 py-4 overflow-y-auto bg-slate-800">

    <div class="px-4">
         <span class="grid h-10 w-32 place-content-center rounded-lg bg-gradient-to-br from-purple-400 via-blue-400 to-blue-500 text-xs font-bold leading-loose text-gray-50" >
           Creditor
         </span>

        <nav aria-label="Main Nav" class="mt-6 flex flex-col space-y-2">

            <a href="/dashboard" wire:navigate class="flex items-center gap-2 rounded-lg px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-white text-indigo-700 border-l-4 border-indigo-500/80' : 'text-white hover:bg-gray-100/50' }}" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                </svg>

                <span class="text-sm font-medium"> Dashboard </span>
            </a>

            <section>
                <div class="flex items-center justify-between rounded-lg px-4 py-2 text-white {{ request()->routeIs('customers.*') ? 'border-l-4 border-indigo-500/80' : '' }}">
                    <div class="flex items-center gap-2 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>
                        <span class="text-xs font-medium"> Nasabah </span>
                    </div>
                </div>

                <nav aria-label="Teams Nav" class="mt-2 flex flex-col px-4">
                    <a href="{{ route('customers.index') }}" wire:navigate class="flex items-center gap-2 rounded-lg px-4 py-2 {{ request()->routeIs('customers.index') ? 'bg-white text-indigo-800/95' : 'text-white hover:bg-gray-100/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>


                        <span class="text-sm font-medium"> List Nasabah </span>
                    </a>

                    <a href="{{ route('customers.create') }}" wire:navigate class="flex items-center gap-2 rounded-lg px-4 py-2 {{ request()->routeIs('customers.create') ? 'bg-white text-indigo-800/95' : 'text-white hover:bg-gray-100/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium">Tambah Nasabah</span>
                    </a>
                </nav>
            </section>

            <section>
                <div class="flex items-center justify-between rounded-lg px-4 py-2 text-white {{ request()->routeIs('loans.*') ? 'border-l-4 border-indigo-500/80' : '' }}">
                    <div class="flex items-center gap-2 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 opacity-75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                        <span class="text-xs font-medium"> Peminjaman </span>
                    </div>
                </div>

                <nav aria-label="Teams Nav" class="mt-2 flex flex-col px-4">
                <a href="{{ route('loans.index') }}" wire:navigate class="flex items-center gap-2 rounded-lg px-4 py-2 {{ request()->routeIs('loans.index') ? 'bg-white text-indigo-800/95' : 'text-white hover:bg-gray-100/50' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span class="text-sm font-medium"> List Pinjaman Nasabah </span>
                </a>

                <a href="{{ route('loans.create') }}" wire:navigate class="flex items-center gap-2 rounded-lg px-4 py-2 {{ request()->routeIs('loans.create') ? 'bg-white text-indigo-800/95' : 'text-white hover:bg-gray-100/50' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">Tambah Pinjaman</span>
                </a>
                </nav>
            </section>

            <section>
                <div class="flex items-center justify-between rounded-lg px-4 py-2 text-white {{ request()->routeIs('installments.*') ? 'border-l-4 border-indigo-500/80' : '' }}">
                    <div class="flex text-xs items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 opacity-75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                        </svg>
                        <span class="text-xs font-medium"> Pembayaran </span>
                    </div>
                </div>

                <nav aria-label="Teams Nav" class="mt-2 flex flex-col px-4">
                    <a href="{{ route('installments.index') }}" wire:navigate class="flex items-center gap-2 rounded-lg px-4 py-2 {{ request()->routeIs('installments.index') ? 'bg-white text-indigo-800/95' : 'text-white hover:bg-gray-100/50 ' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        <span class="text-sm font-medium"> List Pembayaran Nasabah </span>
                    </a>

                    <a href="{{ route('installments.create') }}" wire:navigate class="flex items-center gap-2 rounded-lg px-4 py-2 {{ request()->routeIs('installments.create') ? 'bg-white text-indigo-800/95' : 'text-white hover:bg-gray-100/50' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium">Bikin Pembayaran</span>
                    </a>
                </nav>
            </section>

        </nav>
   </div>

 </div>
