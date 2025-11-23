<nav x-data="{ open: false }" 
     class="bg-gradient-to-r from-pink-100 via-white to-green-100 border-b shadow-lg sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4">

        <div class="flex justify-between h-16">

            {{-- LEFT: Logo + Menu --}}
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-pink-500" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    @if(Auth::user()->role === 'admin')
                        <x-nav-link 
                            :href="route('admin.dashboard')" 
                            :active="request()->routeIs('admin.dashboard')"
                            class="nav-soft-hover {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        >
                            {{ __('Admin Dashboard') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->role === 'passenger')

                        <x-nav-link 
                            :href="route('dashboard')" 
                            :active="request()->routeIs('dashboard')"
                            class="nav-soft-hover {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        >
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link 
                            :href="route('passenger.booking')" 
                            :active="request()->routeIs('passenger.booking')"
                            class="nav-soft-hover {{ request()->routeIs('passenger.booking') ? 'active' : '' }}"
                        >
                            {{ __('Pesan Trip') }}
                        </x-nav-link>

                        <x-nav-link 
                            :href="route('passenger.history')" 
                            :active="request()->routeIs('passenger.history')"
                            class="nav-soft-hover {{ request()->routeIs('passenger.history') ? 'active' : '' }}"
                        >
                            {{ __('Riwayat Trip') }}
                        </x-nav-link>

                    @endif

                </div>
            </div>

            {{-- RIGHT: User Dropdown --}}
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <x-dropdown align="right" width="48">

                    {{-- Trigger Dropdown --}}
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 transition">
                            {{ Auth::user()->name }}

                            <svg class="ml-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" 
                                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" 
                                      clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    {{-- Dropdown Content --}}
                    <x-slot name="content">

                        <!-- Profile -->
                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

        </div>

    </div>

</nav>
