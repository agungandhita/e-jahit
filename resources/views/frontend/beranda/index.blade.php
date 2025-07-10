@extends('frontend.layouts.main')

@section('container')

<!-- Hero Section -->
<section class="bg-gray-50 py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-6">
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 leading-tight">
                        Selamat Datang di <span class="text-green-600">E-Jahit</span>
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Solusi jahit terpercaya untuk kebutuhan fashion Anda. Dengan pengalaman bertahun-tahun, kami siap mewujudkan impian busana yang sempurna.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20jasa%20jahit"
                       target="_blank"
                       class="inline-flex items-center justify-center px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.785"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                    <a href="#layanan" class="inline-flex items-center justify-center px-6 py-3 border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white font-medium rounded transition-all duration-200">
                        Lihat Layanan
                    </a>
                </div>
            </div>

            <!-- Right Content - Image -->
            <div class="relative">
                <div class="bg-white rounded-2xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                    <div class="bg-gray-100 rounded-lg p-6 text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-green-600 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Kualitas Terjamin</h3>
                        <p class="text-gray-600 text-sm">Jahitan rapi dan berkualitas tinggi untuk kepuasan Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="layanan" class="py-16 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Mengapa Memilih E-Jahit?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kami memahami kebutuhan fashion Anda dan berkomitmen memberikan pelayanan terbaik</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Kualitas Premium</h3>
                <p class="text-gray-600 text-sm">Menggunakan bahan berkualitas tinggi dan teknik jahit yang presisi untuk hasil yang sempurna.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pengerjaan Cepat</h3>
                <p class="text-gray-600 text-sm">Proses jahit yang efisien dengan waktu pengerjaan yang dapat disesuaikan dengan kebutuhan Anda.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Konsultasi Gratis</h3>
                <p class="text-gray-600 text-sm">Dapatkan saran dan konsultasi gratis untuk desain yang sesuai dengan keinginan Anda.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600 text-sm">Tarif yang kompetitif dan transparan tanpa biaya tersembunyi.</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pengalaman Berpuluh Tahun</h3>
                <p class="text-gray-600 text-sm">Didukung oleh penjahit berpengalaman yang telah melayani ribuan pelanggan.</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pelayanan Ramah</h3>
                <p class="text-gray-600 text-sm">Tim yang profesional dan ramah siap membantu mewujudkan busana impian Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-12 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Layanan Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Berbagai jenis layanan jahit untuk memenuhi kebutuhan fashion Anda</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Service 1 -->
            <div class="bg-white p-5 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-800 mb-2">Jahit Baju</h3>
                    <p class="text-gray-600 text-xs">Kemeja, blouse, dress, dan berbagai jenis atasan</p>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white p-5 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-800 mb-2">Jahit Celana</h3>
                    <p class="text-gray-600 text-xs">Celana panjang, pendek, rok, dan bawahan lainnya</p>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-white p-5 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-800 mb-2">Jahit Kebaya</h3>
                    <p class="text-gray-600 text-xs">Kebaya modern dan tradisional untuk acara khusus</p>
                </div>
            </div>

            <!-- Service 4 -->
            <div class="bg-white p-5 rounded-lg border border-gray-200 hover:border-green-300 transition-colors duration-200">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-800 mb-2">Reparasi</h3>
                    <p class="text-gray-600 text-xs">Perbaikan dan modifikasi pakaian yang rusak</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 px-4 bg-green-600">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl lg:text-3xl font-bold text-white mb-4">Siap Mewujudkan Busana Impian Anda?</h2>
        <p class="text-lg text-green-100 mb-6 max-w-2xl mx-auto">
            Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik untuk kebutuhan jahit Anda.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20jasa%20jahit"
               target="_blank"
               class="inline-flex items-center justify-center px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.785"/>
                </svg>
                Chat WhatsApp Sekarang
            </a>
            <a href="tel:+6281234567890" class="inline-flex items-center justify-center px-6 py-3 bg-white text-green-600 hover:bg-gray-100 font-medium rounded transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                Telepon Langsung
            </a>
        </div>
    </div>
</section>

@endsection
