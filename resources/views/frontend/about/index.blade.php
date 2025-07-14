@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-green-600 py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Tentang E-Jahit</h1>
        <p class="text-lg text-green-100 max-w-3xl mx-auto">
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
            
            <!-- Workshop Image -->
            <div class="relative">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('img/workshop.jpeg') }}" alt="Workshop Jahit E-Jahit" class="w-full h-80 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                        <p class="text-white font-medium text-sm">Workshop Jahit E-Jahit</p>
                        <p class="text-white/80 text-xs mt-1">Tempat dimana keajaiban terjadi</p>
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
            <div class="bg-white rounded-lg p-6 border border-gray-200 text-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Kualitas Terjamin</h3>
                <p class="text-gray-600 text-sm">
                    Setiap jahitan dibuat dengan standar kualitas tinggi menggunakan bahan terbaik dan teknik yang telah teruji
                </p>
            </div>
            
            <!-- Kepercayaan -->
            <div class="bg-white rounded-lg p-6 border border-gray-200 text-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 9.74 9 11 5.16-1.26 9-5.45 9-11V5l-9-4z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Dapat Dipercaya</h3>
                <p class="text-gray-600 text-sm">
                    Komitmen waktu yang tepat, harga yang jujur, dan pelayanan yang konsisten membuat pelanggan selalu kembali
                </p>
            </div>
            
            <!-- Personal Touch -->
            <div class="bg-white rounded-lg p-6 border border-gray-200 text-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Sentuhan Personal</h3>
                <p class="text-gray-600 text-sm">
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
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="bg-gray-100 h-40 flex items-center justify-center">
                    <svg class="w-16 h-16 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Ibu Sari</h3>
                    <p class="text-green-600 font-medium mb-2 text-sm">Founder & Master Tailor</p>
                    <p class="text-gray-600 text-xs">
                        Pengalaman 15+ tahun dalam dunia jahit, spesialis baju pengantin dan kebaya tradisional
                    </p>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="bg-gray-100 h-40 flex items-center justify-center">
                    <svg class="w-16 h-16 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Dina</h3>
                    <p class="text-green-600 font-medium mb-2 text-sm">Senior Tailor</p>
                    <p class="text-gray-600 text-xs">
                        Ahli dalam jahit seragam dan pakaian formal, detail oriented dengan finishing yang rapi
                    </p>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <div class="bg-gray-100 h-40 flex items-center justify-center">
                    <svg class="w-16 h-16 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Rina</h3>
                    <p class="text-green-600 font-medium mb-2 text-sm">Customer Service</p>
                    <p class="text-gray-600 text-xs">
                        Siap membantu konsultasi dan koordinasi pesanan dengan pelayanan yang ramah dan profesional
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-green-600 py-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-white mb-4">Siap Mewujudkan Impian Fashion Anda?</h2>
        <p class="text-lg text-green-100 mb-6">
            Konsultasikan kebutuhan jahit Anda dengan tim ahli kami. Dapatkan hasil terbaik dengan harga terjangkau!
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-green-600 px-6 py-3 rounded font-medium hover:bg-gray-100 transition-colors">
                Konsultasi Gratis
            </a>
            <a href="{{ route('services') }}" class="border-2 border-white text-white px-6 py-3 rounded font-medium hover:bg-white hover:text-green-600 transition-colors">
                Lihat Layanan
            </a>
        </div>
    </div>
</section>
@endsection