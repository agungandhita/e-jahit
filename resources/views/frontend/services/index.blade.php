@extends('frontend.layouts.main')

@section('title', 'Layanan Kami - E-Jahit')

@section('container')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl lg:text-5xl font-bold mb-4">Layanan Jahit Kami</h1>
        <p class="text-xl lg:text-2xl mb-8 max-w-3xl mx-auto">Berbagai pilihan layanan jahit berkualitas tinggi untuk memenuhi kebutuhan fashion Anda</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#layanan-list" class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Lihat Layanan
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors">
                Konsultasi Gratis
            </a>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section id="layanan-list" class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Pilih Layanan Sesuai Kebutuhan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kami menyediakan berbagai jenis layanan jahit dengan kualitas terbaik dan harga yang kompetitif</p>
        </div>

        @if($layanan->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($layanan as $item)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Service Image -->
                        <div class="h-48 bg-gradient-to-br {{ $item->gradient_class }} flex items-center justify-center">
                            <div class="text-center text-white">
                                <div class="text-4xl mb-2">
                                    @switch($item->jenis_layanan)
                                        @case('baju_pengantin')
                                            💒
                                            @break
                                        @case('seragam_sekolah')
                                            🎓
                                            @break
                                        @case('baju_kerja')
                                            👔
                                            @break
                                        @case('kebaya')
                                            👘
                                            @break
                                        @case('gamis')
                                            🕌
                                            @break
                                        @case('jas')
                                            🤵
                                            @break
                                        @case('baju_anak')
                                            👶
                                            @break
                                        @default
                                            ✂️
                                    @endswitch
                                </div>
                                <h3 class="text-xl font-bold">{{ $item->nama_layanan }}</h3>
                            </div>
                        </div>

                        <!-- Service Content -->
                        <div class="p-6">
                            <!-- Service Type Badge -->
                            <div class="mb-4">
                                <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $item->jenis_layanan_label }}
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $item->deskripsi }}</p>

                            <!-- Price -->
                            <div class="mb-6">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500 text-sm">Harga</span>
                                    <span class="text-2xl font-bold text-green-600">{{ $item->harga_format }}</span>
                                </div>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-gray-500 text-sm">Estimasi waktu</span>
                                    <span class="text-sm font-medium text-gray-700">{{ $item->estimasi_waktu }}</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col gap-3">
                                <a href="{{ route('pesanan.create', ['layanan_id' => $item->layanan_id]) }}"
                                   class="w-full bg-green-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-green-700 transition-colors text-center">
                                    Pesan Sekarang
                                </a>
                                <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20{{ urlencode($item->nama_layanan) }}"
                                   target="_blank"
                                   class="w-full border-2 border-green-600 text-green-600 py-3 px-4 rounded-lg font-semibold hover:bg-green-600 hover:text-white transition-colors text-center">
                                    Konsultasi via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="text-6xl mb-4">✂️</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Layanan Tersedia</h3>
                <p class="text-gray-600 mb-8">Saat ini belum ada layanan yang tersedia. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                <a href="{{ route('contact') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                    Hubungi Kami
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Features Section -->
<section class="py-16 px-4 bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Mengapa Memilih E-Jahit?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Keunggulan layanan kami yang membuat pelanggan selalu puas</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">⚡</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pengerjaan Cepat</h3>
                <p class="text-gray-600 text-sm">Proses jahit yang efisien dengan hasil berkualitas tinggi</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">✨</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Kualitas Premium</h3>
                <p class="text-gray-600 text-sm">Menggunakan bahan dan teknik jahit terbaik</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">💰</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600 text-sm">Harga kompetitif dengan kualitas yang tidak diragukan</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">🤝</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pelayanan Ramah</h3>
                <p class="text-gray-600 text-sm">Tim yang berpengalaman dan siap membantu Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 px-4 bg-gradient-to-r from-green-600 to-green-700 text-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl lg:text-4xl font-bold mb-4">Siap Mewujudkan Fashion Impian Anda?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">Mulai pesanan Anda sekarang atau konsultasi gratis dengan tim ahli kami</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#layanan-list" class="bg-white text-green-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors text-lg">
                Pilih Layanan
            </a>
            <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20layanan%20jahit"
               target="_blank"
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors text-lg">
                Chat WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush
