<div x-data="{open: false}" class="flex-inline">
    <div class="block">
         <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-10 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-md shadow-slate-900" aria-label="Sidebar">
            @include('layouts.navigation-menu')
         </aside>
    </div>

    <div class="bg-white fixed top-0 z-10 w-full sm:left-64 left-0">
        <header aria-label="Site Header" class="border-b border-gray-100">
            <div class="mx-auto flex h-16 max-w-screen-2xl items-center justify-between sm:px-6 lg:px-8">


            <div class="flex justify-between items-center w-full gap-4">
                  <div class="sm:-mx-4 mx-4">
                      <nav aria-label="Breadcrumb" class="flex py-2">
                          @if(@isset($breadcrumbs))
                          <ol role="list" class="flex overflow-hidden rounded-lg border border-gray-200 text-gray-600">
                            <li class="flex items-center">
                                <button type="button" class="flex h-10 items-center gap-1.5 bg-gray-100 px-4 transition hover:text-gray-900">
                                    <span class="ms-1.5 text-xs font-medium"> {{ $breadcrumbs }} </span>
                                </button>
                            </li>
                                @if(isset($breadcrumbs_child))
                                <li class="relative flex items-center">
                                    <span class="absolute inset-y-0 -start-px h-10 w-4 bg-gray-100 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180"></span>
                                    <button type="button" class="flex h-10 items-center bg-white pe-4 ps-8 text-xs font-medium transition hover:text-gray-900">
                                        {{ $breadcrumbs_child }}
                                    </button>
                                </li>
                                @endif
                        </ol>
                        @endif
                      </nav>
                  </div>
              </div>

              <div class="fixed right-0 flex items-start justify-between gap-8">
                <div class="flex items-start">
                  <div class="flex items-center border-x border-gray-100">

                    <div class="flex items-center ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-100 bg-slate-800/80 hover:text-gray-50 hover:bg-slate-800 focus:outline-none transition ease-in-out duration-150">
                                   <span class="font-semibold text-sm sm:mx-2 hidden sm:flex">{{ Auth::user()->name }}</span>
                                    <div>
                                        <svg
                                            class="h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            >
                                            <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <div class="flex items-center">
                        <button x-on:click="open = ! open" type="button" class="p-2 lg:hidden">
                            <svg
                              class="h-6 w-6"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                              />
                            </svg>
                          </button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
        </header>
    </div>

    <div
        x-cloak
        x-show="open"
        class="relative z-20" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on slide-over state.

          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div
        x-transition:enter="ease-in-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in-out duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-300 bg-opacity-50 blur-md transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
          <div class="absolute inset-0 overflow-hidden">
            <div  class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 mr-12">
              <!--
                Slide-over panel, show/hide based on slide-over state.

                Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                  From: "translate-x-full"
                  To: "translate-x-0"
                Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                  From: "translate-x-0"
                  To: "translate-x-full"
              -->
              <div
              x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
              x-transition:enter-start="translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="translate-x-full" class="pointer-events-auto relative w-screen max-w-md">
                <!--
                  Close button, show/hide based on slide-over state.

                  Entering: "ease-in-out duration-500"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-500"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute p-2 right-0 top-0 flex -mr-11 mt-4 bg-slate-800 rounded-lg">
                  <button x-on:click="open = ! open" type="button" class="rounded-md text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                    <span class="sr-only">Close panel</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>

                <div class="flex h-full flex-col overflow-y-scroll bg-slate-800 py-2 shadow-xl shadow-slate-900">
                  <div class="relative flex-1">
                    @include('layouts.navigation-menu')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


</div>
