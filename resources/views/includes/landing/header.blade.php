<section
    class="h-full w-full border-box transition-all duration-500 linear lg:px-16 md:px-20 px-8 py-8 bg-white">
    <div class="navbar-1-1" style="font-family: 'Poppins', sans-serif">

        <div class=" mx-auto flex flex-wrap flex-row items-center justify-between">
            <img href="{{ route('index') }}" class="w-15 h-15 items-center" src="{{ url('https://bangkajaya.sigapaceh.id/assets/img/kab_acehutara.png') }}">
            <div class="ml-5">
                <p class="text-black text-xl font-bold">Bangka Jaya</p>
                <p class="text-black text-xs">Kecamatan Dewantara Aceh Utara</p>
             </div>
            
            <input class="hidden" type="checkbox" id="menu-toggle" />
            
            <div class="hidden lg:flex lg:items-center lg:w-auto w-full lg:ml-auto lg:mr-auto flex-wrap items-center text-base justify-center"
                id="menu">
                <nav
                    class="lg:space-x-12 space-x-0 lg:flex items-center justify-between text-base pt-8 lg:pt-0 lg:space-y-0 space-y-6">

                    @auth
                        <a href="{{ route('index') }}" class="block {{ request()->is('/') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Beranda</a>
                        <a href="{{ route('explore.landing' )}}" class="block {{ request()->is('explore') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Layanan</a>
                        <a href="{{ route('notifikasi') }}" class="block {{ request()->is('notifikasi') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">
                            Notifikasi
                            <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-white rounded-full bg-red-400">{{$notif_count}}</span>
                        </a>
                        <a href="{{ route('member.aduanwarga.index') }}" class="block {{ request()->is('member/aduanwarga') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Aduan</a>
                        <a href="{{ route('about') }}" class="block {{ request()->is('about') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Tentang</a>
                        
                        <hr class="block lg:hidden">
                        <a href="{{ route('member.dashboard.index') }}" class="block lg:hidden nav-link text-serv-text">Dashboard</a>
                        <a href="{{ route('logout') }}" class="block lg:hidden nav-link text-serv-text" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                        
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                @csrf
                            </form>
                    
                        </a>
                        
                    @endauth

                    @guest
                        <a href="{{ route('index') }}" class="block {{ request()->is('/') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Beranda</a>
                        <a href="{{ route('explore.landing' )}}" class="block {{ request()->is('explore') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Layanan</a>
                        {{-- <a href="{{ route('notifikasi') }}" class="block {{ request()->is('notifikasi') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Notifikasi</a> --}}
                        {{-- <a href="{{ route('member.aduanwarga.index') }}" class="block {{ request()->is('member/aduanwarga') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Aduan</a> --}}
                        <a href="{{ route('about') }}" class="block {{ request()->is('about') ? 'nav-link active font-medium' : 'nav-link text-serv-text' }}">Tentang</a>
                    @endguest
                    
                </nav>
            </div>

            @guest
                <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
                    <button
                        onclick="toggleModal('loginModal')"
                        class="text-serv-login-text items-center border-0 block lg:inline-block lg:py-3 lg:px-10 focus:outline-none rounded-2xl font-medium text-base mt-6 lg:mt-0">
                        Log In
                    </button>
                    <button
                        onclick="toggleModal('registerModal')"
                        class="lg:bg-serv-services-bg text-serv-login-text items-center border-0 block lg:inline-block  lg:py-3 lg:px-10 focus:outline-none rounded-2xl font-medium text-base mt-6 lg:mt-0">
                        Daftar
                    </button>
                </div>
            @endguest

            @auth
            <div @click.away="open = false" class="hidden lg:block relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    Halo, {{ Auth::user()->name; }}
                    <img class="inline ml-3 h-12 w-12 rounded-full" src="{{ url('https://cdn-icons-png.freepik.com/512/1144/1144760.png') }}" alt="">
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">

                        @if (Auth::user()->detail_user->role == 2)
                            {{-- <a class="block px-4 py-2 mt-2 text-sm bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('member.dashboard.index') }}">
                                Dashboard
                            </a> --}}
                            <a class="block px-4 py-2 mt-2 text-sm bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('logout') }} " 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout

                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </a>
                        @else
                            <a class="block px-4 py-2 mt-2 text-sm bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('member.dashboard.index') }}">
                                Dashboard
                            </a>
                            <a class="block px-4 py-2 mt-2 text-sm bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('logout') }} " 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout

                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </a>
                        @endif
                    
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </div>
</section>