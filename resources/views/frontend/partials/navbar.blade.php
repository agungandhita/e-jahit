<header
    class="relative flex flex-wrap sm:justify-start sm:flex-nowrap w-full rounded-b-4xl bg-white shadow-2xl text-sm py-3">
    <nav class="max-w-[90rem] w-full mx-auto px-2 sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center justify-between">
            <a class="flex-none text-xl font-semibold focus:outline-none focus:opacity-80" href="{{ route('home') }}"
                aria-label="Brand">
                <div class="flex items-center">
                    <!-- Logo Usaha Jahit Rumahan -->
                    <div class="w-10 h-10 mr-2 flex items-center justify-center bg-green-100 rounded border border-green-600">
                        <div class="w-6 h-6 text-green-700">
                           <img src="{{ asset('img/logo.png') }}" alt="">
                        </div>
                    </div>
                    <div>
                        <span class="text-green-700 font-bold text-lg block leading-tight">USAHA JAHIT</span>
                        <span class="text-green-600 font-medium text-xs block leading-tight">RUMAHAN</span>
                    </div>
                </div>
            </a>

            <div class="sm:hidden">
                <button type="button"
                    class="relative size-7 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50"
                    id="mobile-menu-button">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu"
            class="hidden basis-full grow sm:block">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                <a class="font-medium text-black text-sm hover:text-green-600 focus:outline-none transition-colors"
                    href="{{ route('home') }}" aria-current="page">Beranda</a>
                <a class="font-medium text-black text-sm hover:text-green-600 focus:outline-none transition-colors"
                    href="{{ route('about') }}">Tentang Kami</a>
                <a class="font-medium text-black text-sm hover:text-green-600 focus:outline-none transition-colors"
                    href="{{ route('services') }}">Layanan</a>
                <a class="font-medium text-black text-sm hover:text-green-600 focus:outline-none transition-colors"
                    href="{{ route('gallery.index') }}">Galeri</a>
                {{-- <a class="font-medium text-black text-sm hover:text-green-600 focus:outline-none transition-colors"
                    href="{{ route('testimonials') }}">Testimoni</a> --}}
                <a class="font-medium text-black text-sm hover:text-green-600 focus:outline-none transition-colors"
                    href="{{ route('contact') }}">Kontak</a>

                @guest
                    <div class="flex gap-2">
                        <a class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs font-medium transition-colors"
                            href="{{ route('login') }}">Masuk</a>
                        <a class="border border-green-600 text-green-600 hover:bg-green-600 hover:text-white px-3 py-1 rounded text-xs font-medium transition-colors"
                            href="{{ route('register') }}">Daftar</a>
                    </div>
                @else
                    <div class="relative inline-block text-left">
                        <button id="user-menu-button" type="button"
                            class="inline-flex items-center justify-center w-full rounded-full border border-green-300 px-3 py-2 bg-green-600 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                            aria-expanded="false" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-white">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </button>

                        <div id="user-menu"
                            class="hidden absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                tabindex="-1">Profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                tabindex="-1">Pesanan Saya</a>
                            <form action="/logout" method="POST" class="block">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>

<script>
// Simple, reliable dropdown without external dependencies
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // User dropdown menu
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    if (userMenuButton && userMenu) {
        // Toggle dropdown on button click
        userMenuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const isHidden = userMenu.classList.contains('hidden');
            userMenu.classList.toggle('hidden');
            userMenuButton.setAttribute('aria-expanded', !isHidden);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userMenuButton.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add('hidden');
                userMenuButton.setAttribute('aria-expanded', 'false');
            }
        });

        // Close dropdown on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                userMenu.classList.add('hidden');
                userMenuButton.setAttribute('aria-expanded', 'false');
            }
        });
    }
});
</script>
