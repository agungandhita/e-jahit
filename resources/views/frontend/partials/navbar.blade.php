<header
    class="relative flex flex-wrap sm:justify-start sm:flex-nowrap w-full rounded-b-4xl bg-white shadow-2xl text-sm py-3">
    <nav class="max-w-[90rem] w-full mx-auto px-2 sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center justify-between">
            <a class="flex-none text-xl font-semibold focus:outline-none focus:opacity-80" href="{{ route('home') }}"
                aria-label="Brand">
                <div class="flex items-center">
                    <!-- Logo Usaha Jahit Rumahan -->
                    <div class="w-12 h-12 mr-3 flex items-center justify-center bg-gradient-to-br from-amber-100 to-amber-200 rounded-full border-2 border-amber-600">
                        <div class="w-8 h-8 text-amber-700">
                           <img src="{{ asset('img/logo.png') }}" alt="">
                        </div>
                    </div>
                    <div>
                        <span class="text-amber-700 font-bold text-xl block leading-tight">USAHA JAHIT</span>
                        <span class="text-amber-600 font-medium text-sm block leading-tight">RUMAHAN</span>
                    </div>
                </div>
            </a>

            <div class="sm:hidden">
                <button type="button"
                    class="hs-collapse-toggle relative size-7 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    id="hs-navbar-example-collapse" aria-expanded="false" aria-controls="hs-navbar-example"
                    aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-example">
                    <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                    <span class="sr-only">Toggle navigation</span>
                </button>
            </div>
        </div>
        <div id="hs-navbar-example"
            class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow sm:block"
            aria-labelledby="hs-navbar-example-collapse">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                <a class="font-semibold text-black text-base hover:text-amber-600 focus:outline-none transition-colors"
                    href="{{ route('home') }}" aria-current="page">Beranda</a>
                <a class="font-semibold text-black text-base hover:text-amber-600 focus:outline-none transition-colors"
                    href="{{ route('about') }}">Tentang Kami</a>
                <a class="font-semibold text-black text-base hover:text-amber-600 focus:outline-none transition-colors"
                    href="{{ route('services') }}">Layanan</a>
                <a class="font-semibold text-black text-base hover:text-amber-600 focus:outline-none transition-colors"
                    href="{{ route('gallery') }}">Galeri</a>
                <a class="font-semibold text-black text-base hover:text-amber-600 focus:outline-none transition-colors"
                    href="{{ route('testimonials') }}">Testimoni</a>
                <a class="font-semibold text-black text-base hover:text-amber-600 focus:outline-none transition-colors"
                    href="{{ route('contact') }}">Kontak</a>

                @guest
                    <div class="flex gap-2">
                        <a class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            href="{{ route('login') }}">Masuk</a>
                        <a class="border border-amber-600 text-amber-600 hover:bg-amber-600 hover:text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                            href="{{ route('register') }}">Daftar</a>
                    </div>
                @else
                    <div class="relative">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white font-medium rounded-full text-sm inline-flex items-center border border-amber-300 p-2 bg-amber-600 hover:bg-amber-700 transition-colors"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-white">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 absolute right-0 mt-2">
                            <ul class="py-2 text-gray-700" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100">Pesanan Saya</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST" class="inline w-full">
                                        @csrf
                                        <button type="submit"
                                            class="block cursor-pointer w-full text-left px-4 py-2 hover:bg-gray-100 text-black">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile menu toggle
        const toggleButton = document.getElementById('hs-navbar-example-collapse');
        const navbar = document.getElementById('hs-navbar-example');

        if (toggleButton && navbar) {
            toggleButton.addEventListener('click', () => {
                const isHidden = navbar.classList.contains('hidden');
                navbar.classList.toggle('hidden', !isHidden);
            });
        }

        // Dropdown toggle
        const dropdownButton = document.getElementById('dropdownDefaultButton');
        const dropdown = document.getElementById('dropdown');

        if (dropdownButton && dropdown) {
            dropdownButton.addEventListener('click', () => {
                dropdown.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        }
    });
</script>
