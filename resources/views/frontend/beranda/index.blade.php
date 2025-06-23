@extends('frontend.layouts.main')

@section('container')
<div class="bg-white text-black text-[15px]">
    <div class="px-4 sm:px-6 lg:px-10">
        @include('frontend.beranda._Jumbotron')

        <!-- Bagian Selamat Datang dengan Layout Baru -->
        <div class="mt-12 bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 px-4 sm:px-6 lg:px-12 py-16 sm:py-20 rounded-3xl shadow-lg border border-amber-100">
            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div class="text-center mb-12 sm:mb-16">
                    <div class="inline-flex items-center bg-amber-100 text-amber-800 text-sm font-semibold px-4 py-2 rounded-full mb-6">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        Layanan Jahit Terpercaya
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 text-gray-800 leading-tight">
                        Selamat Datang di
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-600 relative">
                            E-JAHIT
                        </span>
                    </h2>
                    <p class="text-lg sm:text-xl lg:text-2xl text-gray-700 leading-relaxed max-w-4xl mx-auto">
                        Solusi terpercaya untuk semua kebutuhan jahit custom Anda. Dari baju pengantin hingga seragam sekolah, kami berkomitmen memberikan kualitas terbaik dengan pelayanan yang ramah dan profesional.
                    </p>
                </div>

                <!-- Fitur Layanan dengan Grid Layout Baru -->
                @include('frontend.beranda._hero')

                <!-- Statistik dengan Layout Card -->
                <div class="mt-12 sm:mt-16 grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <div class="bg-white rounded-2xl p-4 sm:p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-amber-100">
                        <div class="text-3xl sm:text-4xl font-bold text-amber-600 mb-2">500+</div>
                        <div class="text-gray-600 font-medium text-sm sm:text-base">Pelanggan Puas</div>
                    </div>
                    <div class="bg-white rounded-2xl p-4 sm:p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-amber-100">
                        <div class="text-3xl sm:text-4xl font-bold text-orange-600 mb-2">5+</div>
                        <div class="text-gray-600 font-medium text-sm sm:text-base">Tahun Pengalaman</div>
                    </div>
                    <div class="bg-white rounded-2xl p-4 sm:p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-amber-100">
                        <div class="text-3xl sm:text-4xl font-bold text-yellow-600 mb-2">24</div>
                        <div class="text-gray-600 font-medium text-sm sm:text-base">Jam Layanan</div>
                    </div>
                    <div class="bg-white rounded-2xl p-4 sm:p-6 text-center shadow-md hover:shadow-xl transition-all duration-300 border border-amber-100">
                        <div class="text-3xl sm:text-4xl font-bold text-amber-700 mb-2">100%</div>
                        <div class="text-gray-600 font-medium text-sm sm:text-base">Garansi Kualitas</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Sambutan dengan Layout Card Modern -->
        <div class="mt-16 sm:mt-20 mb-16 sm:mb-20">
            <div class="bg-gradient-to-r from-white to-amber-50 rounded-3xl shadow-xl overflow-hidden border border-amber-100">
                <!-- Header dengan Gradient -->
                <div class="bg-gradient-to-r from-amber-600 via-orange-600 to-yellow-600 py-6 sm:py-8 px-6 sm:px-8">
                    <div class="flex items-center justify-center">
                        <div class="bg-white/20 rounded-full p-2 sm:p-3 mr-3 sm:mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 sm:h-8 w-6 sm:w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white">
                            Sambutan Pemilik Usaha
                        </h2>
                    </div>
                </div>

                <!-- Konten dengan Layout Flex Modern -->
                <div class="p-6 sm:p-8 lg:p-12">
                    <div class="flex flex-col lg:flex-row items-center gap-8 sm:gap-12">
                        <!-- Foto dengan Frame Artistik -->
                        <div class="w-full lg:w-2/5">
                            <div class="relative max-w-md mx-auto lg:max-w-none">
                                <div class="bg-gradient-to-br from-amber-100 to-orange-100 p-4 rounded-3xl shadow-lg">
                                    <div class="relative overflow-hidden rounded-2xl">
                                        <div class="w-full h-64 sm:h-80 bg-gradient-to-br from-amber-200 to-orange-200 flex items-center justify-center">
                                            <div class="text-center">
                                                <div class="w-20 sm:w-24 h-20 sm:h-24 mx-auto mb-4 bg-amber-600 rounded-full flex items-center justify-center">
                                                    <svg class="w-10 sm:w-12 h-10 sm:h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 2L2 7v10c0 5.55 3.84 9.74 9 11 5.16-1.26 9-5.45 9-11V7l-10-5z"/>
                                                        <circle cx="12" cy="12" r="3" fill="white"/>
                                                    </svg>
                                                </div>
                                                <p class="text-amber-800 font-semibold text-sm sm:text-base">Pemilik Usaha</p>
                                                <p class="text-amber-700 text-xs sm:text-sm">Jahit Rumahan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Floating Elements -->
                                <div class="absolute -top-3 sm:-top-4 -right-3 sm:-right-4 bg-yellow-400 text-yellow-900 px-3 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg">
                                    ⭐ Expert
                                </div>
                                <div class="absolute -bottom-3 sm:-bottom-4 -left-3 sm:-left-4 bg-green-500 text-white px-3 sm:px-4 py-1 sm:py-2 rounded-full text-xs sm:text-sm font-bold shadow-lg">
                                    ✅ Terpercaya
                                </div>
                            </div>
                        </div>

                        <!-- Teks dengan Typography Modern -->
                        <div class="w-full lg:w-3/5 space-y-6 sm:space-y-8">
                            <div class="relative">
                                <div class="absolute -left-4 sm:-left-8 -top-2 sm:-top-4 text-6xl sm:text-8xl text-amber-200 font-serif opacity-50">"</div>
                                <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-4 sm:mb-6 relative z-10 leading-tight">
                                    Mewujudkan Impian Fashion Anda dengan
                                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-600">
                                        Sentuhan Profesional
                                    </span>
                                </h3>
                                <div class="absolute -right-4 sm:-right-8 -bottom-2 sm:-bottom-4 text-6xl sm:text-8xl text-amber-200 font-serif opacity-50">"</div>
                            </div>

                            <div class="bg-amber-50 border-l-4 border-amber-500 p-4 sm:p-6 rounded-r-xl">
                                <p class="text-gray-700 leading-relaxed text-base sm:text-lg relative z-10">
                                    Dengan pengalaman lebih dari 5 tahun di bidang jahit menjahit, kami berkomitmen memberikan hasil terbaik untuk setiap pelanggan. Setiap jahitan dikerjakan dengan detail dan ketelitian tinggi, karena kepuasan Anda adalah prioritas utama kami.
                                </p>
                            </div>

                            <!-- CTA dengan Design Modern -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{route('about')}}" class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-amber-600 to-orange-600 text-white rounded-2xl hover:from-amber-700 hover:to-orange-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 font-semibold text-sm sm:text-base">
                                    <span>Tentang Kami</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                                <a href="https://wa.me/6281234567890" target="_blank" class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-green-500 hover:bg-green-600 text-white rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 font-semibold text-sm sm:text-base">
                                    <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                    <span>Konsultasi WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
