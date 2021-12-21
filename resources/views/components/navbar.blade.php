<nav x-data="{modal: false}" class="fixed top-0 h-16 z-10 bg-sky-600/90 w-full px-8 shadowm-md flex items-center justify-between text-white">
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <a href="{{ route('welcome') }}">
        <h1 class="text-3xl font-bold tracking-widest">MEIBEL</h1>
    </a>

    <div class="hidden md:flex md:justify-between items-center md:gap-x-6">
        <a href="{{ route('welcome') }}">Home</a>

        <x-jet-dropdown align="right" width="60">
            <x-slot name="trigger">
                <a href="javascript:void(0)">
                    Materi <i class="fas fa-chevron-down"></i>
                </a>
            </x-slot>

            <x-slot name="content">
                @forelse ($categories as $category)
                <x-other-dropdown-link href="{{ route('categories.materials.index', ['category' => $category->slug]) }}">
                    {{ $category->material_prefix }}
                </x-other-dropdown-link>
                @empty
                <h4 class="px-4 py-2 text-sky-500">Data belum tersedia</h4>
                @endforelse
            </x-slot>
        </x-jet-dropdown>

        <x-jet-dropdown align="right" width="60">
            <x-slot name="trigger">
                <a href="javascript:void(0)">
                    Soal <i class="fas fa-chevron-down"></i>
                </a>
            </x-slot>

            <x-slot name="content">
                @forelse ($categories as $category)
                <x-other-dropdown-link href="{{ route('categories.exercises.index', ['category' => $category->slug]) }}">
                    {{ $category->exercise_prefix }}
                </x-other-dropdown-link>
                @empty
                <h4 class="px-4 py-2 text-sky-500">Data belum tersedia</h4>
                @endforelse
            </x-slot>
        </x-jet-dropdown>

        <a href="{{ route('welcome') }}#about">Tentang Kami</a>

        @if (Route::has('login'))
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-sky-800 text-white p-2 rounded-xl">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <button
    @click="modal = !modal"
    class="show md:hidden p-2 bg-sky-200 text-sky-600 rounded-md aspect-square h-10">
        <i class="fa fa-bars"></i>
    </button>

    <x-modal>
        <div class="grid gap-y-2">
            <x-collapse href="welcome" title="Home" />
            <x-collapse title="Materi"
            :subs="$categories->map(
                fn($item) => (object) ['link' => 'categories.materials.index', 'params' => ['category' => $item->slug], 'title' => $item->material_prefix])"
                />
            <x-collapse title="Soal"
            :subs="$categories->map(
                fn($item) => (object) ['link' => 'categories.exercises.index', 'params' => ['category' => $item->slug], 'title' => $item->exercise_prefix])"
                />
            <x-collapse href="welcome" hashtag="about" title="Tentang Kami" />

            @if (Route::has('login'))
                @auth
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif
        
                        <div>
                            <div class="font-medium text-base text-sky-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-sky-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>
        
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif
        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-responsive-nav-link>
                        </form>
        
                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200"></div>
        
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>
        
                            <!-- Team Settings -->
                            <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                {{ __('Team Settings') }}
                            </x-jet-responsive-nav-link>
        
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                    {{ __('Create New Team') }}
                                </x-jet-responsive-nav-link>
                            @endcan
        
                            <div class="border-t border-gray-200"></div>
        
                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>
        
                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                            @endforeach
                        @endif
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-sky-600 text-white p-2 rounded-2xl text-center">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-sky-800 text-white p-2 rounded-2xl text-center">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </x-modal>
</nav>