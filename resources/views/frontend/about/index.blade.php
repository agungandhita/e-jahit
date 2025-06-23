@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-pink-600 to-purple-600 py-20">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Tentang E-Jahit</h1>
        <p class="text-xl text-pink-100 max-w-3xl mx-auto">
            Usaha jahit rumahan yang telah dipercaya selama bertahun-tahun untuk menghadirkan pakaian berkualitas dengan sentuhan personal
        </p>
    </div>
</section>

<!-- About Content -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Cerita Kami</h2>
                <div class="space-y-4 text-gray-600">
                    <p>
                        E-Jahit dimulai dari passion seorang ibu rumah tangga yang memiliki keahlian menjahit turun temurun. 
                        Dengan pengalaman lebih dari 15 tahun, kami telah melayani ribuan pelanggan dengan berbagai kebutuhan jahitan.
                    </p>
                    <p>
                        Dari baju pengantin yang memukau hingga seragam sekolah yang rapi, setiap jahitan kami dibuat dengan 
                        perhatian detail dan cinta. Kami percaya bahwa pakaian bukan hanya sekedar kain, tetapi cerminan 
                        kepribadian dan momen berharga dalam hidup.
                    </p>
                    <p>
                        Dengan dukungan teknologi modern dan tetap mempertahankan sentuhan tradisional, kami berkomitmen 
                        memberikan pelayanan terbaik untuk setiap pelanggan.
                    </p>
                </div>
            </div>
            
            <!-- Image Placeholder -->
            <div class="relative">
                <div class="bg-gradient-to-br from-pink-50 to-purple-100 rounded-2xl p-8 h-96 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-32 h-32 mx-auto text-pink-600 mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                        </svg>
                        <p class="text-gray-600 font-medium">Foto Workshop Jahit</p>
                        <p class="text-sm text-gray-500 mt-2">Tempat dimana keajaiban terjadi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Nilai-Nilai Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Prinsip yang kami pegang teguh dalam setiap jahitan dan pelayanan
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Kualitas -->
            <div class="bg-white rounded-xl p-8 shadow-md text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Kualitas Terjamin</h3>
                <p class="text-gray-600">
                    Setiap jahitan dibuat dengan standar kualitas tinggi menggunakan bahan terbaik dan teknik yang telah teruji
                </p>
            </div>
            
            <!-- Kepercayaan -->
            <div class="bg-white rounded-xl p-8 shadow-md text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 9.74 9 11 5.16-1.26 9-5.45 9-11V5l-9-4z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Dapat Dipercaya</h3>
                <p class="text-gray-600">
                    Komitmen waktu yang tepat, harga yang jujur, dan pelayanan yang konsisten membuat pelanggan selalu kembali
                </p>
            </div>
            
            <!-- Personal Touch -->
            <div class="bg-white rounded-xl p-8 shadow-md text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Sentuhan Personal</h3>
                <p class="text-gray-600">
                    Setiap pesanan ditangani secara personal dengan konsultasi mendalam untuk hasil yang sesuai keinginan
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Tim Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Orang-orang berpengalaman yang siap mewujudkan impian fashion Anda
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-br from-pink-100 to-purple-100 h-48 flex items-center justify-center">
                    <svg class="w-20 h-20 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Ibu Sari</h3>
                    <p class="text-pink-600 font-medium mb-3">Founder & Master Tailor</p>
                    <p class="text-gray-600 text-sm">
                        Pengalaman 15+ tahun dalam dunia jahit, spesialis baju pengantin dan kebaya tradisional
                    </p>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-br from-blue-100 to-indigo-100 h-48 flex items-center justify-center">
                    <svg class="w-20 h-20 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Dina</h3>
                    <p class="text-blue-600 font-medium mb-3">Senior Tailor</p>
                    <p class="text-gray-600 text-sm">
                        Ahli dalam jahit seragam dan pakaian formal, detail oriented dengan finishing yang rapi
                    </p>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-br from-green-100 to-emerald-100 h-48 flex items-center justify-center">
                    <svg class="w-20 h-20 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Rina</h3>
                    <p class="text-green-600 font-medium mb-3">Customer Service</p>
                    <p class="text-gray-600 text-sm">
                        Siap membantu konsultasi dan koordinasi pesanan dengan pelayanan yang ramah dan profesional
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-pink-600 to-purple-600 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Siap Mewujudkan Impian Fashion Anda?</h2>
        <p class="text-xl text-pink-100 mb-8">
            Konsultasikan kebutuhan jahit Anda dengan tim ahli kami. Dapatkan hasil terbaik dengan harga terjangkau!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-pink-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Konsultasi Gratis
            </a>
            <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-pink-600 transition-colors">
                Lihat Layanan
            </a>
        </div>
    </div>
</section>
@endsection