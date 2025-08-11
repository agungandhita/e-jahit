@extends('frontend.layouts.main')

@section('title', 'Layanan Kami - E-Jahit')

@section('container')
<!-- Hero Section -->
<section class="bg-green-600 py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Layanan Jahit Kami</h1>
        <p class="text-lg text-green-100 max-w-3xl mx-auto">
            Berbagai pilihan layanan jahit berkualitas tinggi untuk memenuhi kebutuhan fashion Anda
        </p>
    </div>
</section>

<!-- Services Grid -->
<section id="layanan-list" class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Pilih Layanan Sesuai Kebutuhan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Kami menyediakan berbagai jenis layanan jahit dengan kualitas terbaik dan harga yang kompetitif
            </p>
        </div>

        @if($layanan->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($layanan as $item)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Service Content -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-lg font-bold text-gray-800">{{ $item->nama_layanan }}</h3>
                                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-medium rounded">
                                    {{ $item->jenis_layanan_label }}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->deskripsi, 100) }}</p>

                            <!-- Details -->
                            <div class="space-y-2 text-sm mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Harga mulai:</span>
                                    <span class="text-gray-800 font-medium">
                                        @if($item->layananUkuran->count() > 0)
                                            {{ 'Rp ' . number_format($item->layananUkuran->min('harga'), 0, ',', '.') }}
                                        @else
                                            Hubungi kami
                                        @endif
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Estimasi waktu:</span>
                                    <span class="text-green-600 font-medium">{{ $item->estimasi_hari }} hari</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col gap-3">
                                <a href="{{ route('pesanan.create', ['layanan_id' => $item->layanan_id]) }}"
                                   class="w-full bg-green-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-green-700 transition-colors text-center">
                                    Pesan Sekarang
                                </a>
                                <a href="https://wa.me/6281341349239?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20{{ urlencode($item->nama_layanan) }}"
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
            <div class="col-span-full text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Layanan Tersedia</h3>
                <p class="text-gray-600">Saat ini belum ada layanan yang tersedia. Silakan hubungi kami untuk informasi lebih lanjut.</p>
            </div>
        @endif
    </div>
</section>

<!-- Features Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Mengapa Memilih E-Jahit?</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Keunggulan layanan kami yang membuat pelanggan selalu puas
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
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
<section class="py-16 px-4 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Siap Mewujudkan Fashion Impian Anda?</h2>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
            Mulai pesanan Anda sekarang atau konsultasi gratis dengan tim ahli kami
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#layanan-list" class="bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition-colors text-lg">
                Pilih Layanan
            </a>
            <a href="https://wa.me/6281341349239?text=Halo%20E-Jahit,%20saya%20ingin%20konsultasi%20tentang%20layanan%20jahit"
               target="_blank"
               class="border-2 border-green-600 text-green-600 px-8 py-4 rounded-lg font-semibold hover:bg-green-600 hover:text-white transition-colors text-lg">
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
