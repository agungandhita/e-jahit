@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-600 py-20">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Layanan Jahit Kami</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto">
            Berbagai jenis jahitan berkualitas tinggi untuk semua kebutuhan Anda, dari yang formal hingga kasual
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <!-- Service Image Placeholder -->
                <div class="h-48 bg-gradient-to-br {{ $service['gradient'] }} flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto {{ $service['icon_color'] }} mb-2" fill="currentColor" viewBox="0 0 24 24">
                            {!! $service['icon'] !!}
                        </svg>
                        <p class="text-white font-medium">{{ $service['name'] }}</p>
                    </div>
                </div>
                
                <!-- Service Content -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $service['name'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $service['description'] }}</p>
                    
                    <!-- Features -->
                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Yang Termasuk:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            @foreach($service['features'] as $feature)
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Price -->
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-bold text-gray-800">{{ $service['price'] }}</span>
                            <span class="text-gray-500 text-sm">/{{ $service['unit'] }}</span>
                        </div>
                        <a href="{{ route('contact') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
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
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
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
<section class="bg-gradient-to-r from-blue-600 to-indigo-600 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Siap Memesan?</h2>
        <p class="text-xl text-blue-100 mb-8">
            Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6281234567890" class="bg-green-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.479 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                WhatsApp
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                Form Kontak
            </a>
        </div>
    </div>
</section>
@endsection