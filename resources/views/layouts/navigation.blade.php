<nav x-data="{ open: false }" class="dark bg-gray border-b border-gray-100">
    <!-- Main Navigations Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Main Navigation Menu Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
                        {{ __('Hot Products') }}
                    </x-nav-link>
                    <x-nav-link :href="route('search.products')" :active="request()->routeIs('search.products')">
                        {{ __('Products Search') }}
                    </x-nav-link>
                    <x-nav-link :href="route('artists')" :active="request()->routeIs('artists')">
                        {{ __('Artists Search') }}
                    </x-nav-link>
                    @can("edit", \App\Models\Artistprofile::class)
                    <x-nav-link :href="route('upload')" :active="request()->routeIs('upload')">
                        {{ __('Artist Profile') }}
                    </x-nav-link>
                    @endcan
                    @can("become", \App\Models\Artistprofile::class)
                    <x-nav-link :href="route('upload')" :active="request()->routeIs('upload')">
                        {{ __('Artist Upload') }}
                    </x-nav-link>
                    @endcan
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                    @auth
                    <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
                        {{ __('View Orders') }}
                    </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Menu Settings Dropdown (top right corner) -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    @auth
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                            <div>&#x1F464; {{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        </x-slot>
                       <x-slot name="content">
                        <x-dropdown-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                        @if(in_array(auth()->user()->roles_id, [\App\Models\Role::SITE_ADMIN_ROLE]))
                        <x-dropdown-link :href="route('dashboard.admin.pages')" :active="request()->routeIs('dashboard.admin.pages')">
                            {{ __('Manage Pages') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard.admin.users')" :active="request()->routeIs('dashboard.admin.users')">
                            {{ __('Manage Users') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard.admin.suppliers')" :active="request()->routeIs('dashboard.admin.suppliers')">
                            {{ __('Manage Suppliers') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')">
                            {{ __('Manage Products') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard.admin.hot_products')" :active="request()->routeIs('dashboard.admin.hot_products')">
                            {{ __('Manage Hot Products') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard.admin.orders')" :active="request()->routeIs('dashboard.admin.orders')">
                            {{ __('Manage Orders') }}
                        </x-dropdown-link>
                        @endif
                         <x-dropdown-link :href="route('profile.edit')">
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
                    @endauth
                    @guest
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>&#x1F464;</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-dropdown-link>
                    </x-slot>
                    @endguest
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md bg-white text-white-400 hover:text-white-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-white-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('products')" :active="request()->routeIs('products')">
                {{ __('Hot Products') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('search.products')" :active="request()->routeIs('search.products')">
                {{ __('Products Search') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('artists')" :active="request()->routeIs('artists')">
                {{ __('Artists Search') }}
            </x-responsive-nav-link>
            @can("edit")
            <x-responsive-nav-link :href="route('upload')" :active="request()->routeIs('upload')">
                {{ __('Edit Artist Profile') }}
            </x-responsive-nav-link>
            @endcan
            @can("become")
            <x-responsive-nav-link :href="route('upload')" :active="request()->routeIs('upload')">
                {{ __('Artist Upload') }}
            </x-responsive-nav-link>
            @endcan
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
                {{ __('View Orders') }}
            </x-responsive-nav-link>
        </div>
        <div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    {{-- <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div> --}}
                    {{-- <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
                </div>
                    @auth
                        @if(in_array(auth()->user()->roles_id, [\App\Models\Role::SITE_ADMIN_ROLE]))
                        <x-responsive-nav-link :href="route('dashboard.admin.pages')" :active="request()->routeIs('dashboard.admin.pages')">
                            {{ __('Manage Pages') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('dashboard.admin.users')" :active="request()->routeIs('dashboard.admin.users')">
                            {{ __('Manage Users') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('dashboard.admin.suppliers')" :active="request()->routeIs('dashboard.admin.suppliers')">
                            {{ __('Manage Suppliers') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('dashboard.admin.products')" :active="request()->routeIs('dashboard.admin.products')">
                            {{ __('Manage Products') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('dashboard.admin.hot_products')" :active="request()->routeIs('dashboard.admin.hot_products')">
                            {{ __('Manage Hot Products') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('dashboard.admin.orders')" :active="request()->routeIs('dashboard.admin.orders')">
                            {{ __('Manage Orders') }}
                        </x-responsive-nav-link>
                        @endif
                    @endauth
            </div>
        </div>

        <!-- Responsive Settings Options mobile view drop down menu -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                {{-- <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div> --}}
                {{-- <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div> --}}
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                @guest
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                @endguest

                @auth
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
