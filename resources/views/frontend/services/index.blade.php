@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-green-600 py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Layanan Jahit Profesional</h1>
        <p class="text-lg text-green-100 max-w-3xl mx-auto">
            Wujudkan impian fashion Anda dengan layanan jahit berkualitas tinggi dan harga terjangkau
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        @if($layanan->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($layanan as $service)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Service Image Placeholder -->
                    <div class="h-48 bg-gradient-to-br {{ $service->gradient_class }} flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 mx-auto text-white mb-2" fill="currentColor" viewBox="0 0 24 24">
                                {!! $service->icon_svg !!}
                            </svg>
                            <p class="text-white font-medium">{{ $service->nama_layanan }}</p>
                        </div>
                    </div>
                    
                    <!-- Service Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $service->nama_layanan }}</h3>
                        <p class="text-gray-600 mb-4">{{ $service->deskripsi }}</p>
                        
                        <!-- Service Type -->
                        <div class="mb-4">
                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                {{ $service->jenis_layanan_label }}
                            </span>
                        </div>
                        
                        <!-- Estimation -->
                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Estimasi Pengerjaan:</h4>
                            <p class="text-sm text-gray-600">{{ $service->estimasi_format }}</p>
                        </div>
                        
                        @if($service->catatan)
                        <!-- Additional Notes -->
                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Catatan:</h4>
                            <p class="text-sm text-gray-600">{{ $service->catatan }}</p>
                        </div>
                        @endif
                        
                        <!-- Price -->
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-gray-800">{{ $service->harga_format }}</span>
                            </div>
                            @auth
                                <a href="{{ route('contact') }}" class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700 transition-colors text-sm">
                                    Pesan Sekarang
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700 transition-colors text-sm">
                                    Login untuk Pesan
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Layanan</h3>
                <p class="text-gray-500">Layanan sedang dalam proses pengembangan.</p>
            </div>
        @endif
    </div>
</section>

<!-- Process Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Alur Pemesanan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Proses yang mudah dan transparan untuk mendapatkan pakaian impian Anda
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-white font-bold text-xl">1</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Konsultasi</h3>
                <p class="text-gray-600 text-sm">
                    Diskusi kebutuhan, model, dan budget melalui WhatsApp atau datang langsung
                </p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white font-bold text-xl">2</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Pilih Bahan</h3>
                <p class="text-gray-600 text-sm">
                    Pilih bahan berkualitas sesuai kebutuhan atau bawa bahan sendiri
                </p>
            </div>
            
            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white font-bold text-xl">3</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Fitting</h3>
                <p class="text-gray-600 text-sm">
                    Pengukuran detail dan fitting untuk memastikan ukuran yang pas
                </p>
            </div>
            
            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-white font-bold text-xl">4</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Selesai</h3>
                <p class="text-gray-600 text-sm">
                    Pakaian siap diambil sesuai jadwal yang telah disepakati
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Pertanyaan Umum</h2>
            <p class="text-gray-600">
                Jawaban untuk pertanyaan yang sering ditanyakan pelanggan
            </p>
        </div>
        
        <div class="space-y-6">
            <!-- FAQ Item 1 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Berapa lama waktu pengerjaan?</h3>
                <p class="text-gray-600">
                    Waktu pengerjaan bervariasi tergantung jenis pakaian: Seragam 3-5 hari, Baju kerja 5-7 hari, 
                    Baju pengantin 2-3 minggu, Kebaya 1-2 minggu. Untuk pesanan mendadak, bisa dibicarakan.
                </p>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Apakah bisa bawa bahan sendiri?</h3>
                <p class="text-gray-600">
                    Tentu saja! Anda bisa membawa bahan sendiri. Kami hanya mengenakan biaya jahit saja. 
                    Pastikan bahan yang dibawa sudah cukup sesuai dengan model yang diinginkan.
                </p>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Bagaimana sistem pembayaran?</h3>
                <p class="text-gray-600">
                    Pembayaran bisa cash, transfer bank, atau e-wallet. Untuk pesanan besar biasanya DP 50% 
                    di awal dan pelunasan saat pengambilan. Pembayaran bisa dicicil untuk baju pengantin.
                </p>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Apakah ada garansi?</h3>
                <p class="text-gray-600">
                    Ya, kami memberikan garansi perbaikan gratis jika ada masalah pada jahitan dalam 1 minggu 
                    setelah pengambilan (tidak termasuk kerusakan akibat pemakaian).
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-green-600 py-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-white mb-4">Siap Memulai Proyek Jahit Anda?</h2>
        <p class="text-lg text-green-100 mb-6">
            Konsultasikan kebutuhan Anda dengan tim ahli kami. Dapatkan penawaran terbaik dan hasil yang memuaskan!
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="https://wa.me/6281234567890" class="bg-green-500 text-white px-6 py-3 rounded font-medium hover:bg-green-600 transition-colors flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.479 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                WhatsApp
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white px-6 py-3 rounded font-medium hover:bg-white hover:text-green-600 transition-colors">
                Form Kontak
            </a>
        </div>
    </div>
</section>
@endsection