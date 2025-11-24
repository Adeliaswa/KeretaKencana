<nav x-data="{ open: false }" class="bg-gradient-to-r from-pink-100 via-white to-green-100 border-b shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                            class="nav-soft-hover {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            {{ __('Admin Dashboard') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->role === 'passenger')
                        <x-nav-link 
                            :href="route('dashboard')" 
                            :active="request()->routeIs('dashboard')"
                            class="nav-soft-hover {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link 
                            :href="route('passenger.booking')" 
                            :active="request()->routeIs('passenger.booking')"
                            class="nav-soft-hover {{ request()->routeIs('passenger.booking') ? 'active' : '' }}">
                            {{ __('Pesan Trip') }}
                        </x-nav-link>

                        <x-nav-link 
                            :href="route('passenger.history')" 
                            :active="request()->routeIs('passenger.history')"
                            class="nav-soft-hover {{ request()->routeIs('passenger.history') ? 'active' : '' }}">
                            {{ __('Riwayat Trip') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            {{-- RIGHT: User Dropdown --}}
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
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

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Hamburger --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Responsive Navigation Menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Admin Dashboard') }}
                </x-responsive-nav-link>
            @endif
            @if(Auth::user()->role === 'passenger')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('passenger.booking')" :active="request()->routeIs('passenger.booking')">
                    {{ __('Pesan Trip') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('passenger.history')" :active="request()->routeIs('passenger.history')">
                    {{ __('Riwayat Trip') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
