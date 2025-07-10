@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-green-600 py-16">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Galeri Karya</h1>
        <p class="text-lg text-green-100 max-w-3xl mx-auto">
            Lihat koleksi hasil jahitan terbaik kami yang telah dipercaya oleh ratusan pelanggan
        </p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="py-8 bg-white sticky top-0 z-10 shadow-sm">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active px-5 py-2 rounded bg-green-600 text-white font-medium" data-filter="semua">
                Semua
            </button>
            @foreach($kategori as $key => $label)
            <button class="filter-btn px-5 py-2 rounded bg-gray-200 text-gray-700 font-medium hover:bg-green-100" data-filter="{{ $key }}">
                {{ $label }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="gallery-grid">
            @forelse($produk as $item)
            <div class="gallery-item {{ $item->kategori }} bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <!-- Product Image -->
                <div class="h-64 relative group overflow-hidden">
                    <img src="{{ $item->foto_utama }}" alt="{{ $item->nama }}"
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="{{ route('gallery.detail', $item->produk_id) }}" 
                           class="bg-white text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-800">{{ $item->nama }}</h3>
                        <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-medium rounded">
                            {{ $item->kategori_label }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->deskripsi, 100) }}</p>

                    <!-- Details -->
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Harga:</span>
                            <span class="text-gray-800 font-medium">{{ $item->harga_format }}</span>
                        </div>
                        @if($item->jumlah_produksi > 0)
                        <div class="flex justify-between">
                            <span class="text-gray-500">Jumlah Produksi:</span>
                            <span class="text-green-600 font-medium">{{ $item->jumlah_produksi }} PCS</span>
                        </div>
                        @else
                        <div class="flex justify-between">
                            <span class="text-gray-500">Status:</span>
                            <span class="text-red-600 font-medium">Pre-order</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-600">Produk sedang dalam proses penambahan. Silakan kembali lagi nanti.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Pencapaian Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Angka-angka yang membuktikan kepercayaan pelanggan terhadap kualitas layanan kami
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Stats content tetap sama -->
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2">500+</h3>
                <p class="text-gray-600">Pelanggan Puas</p>
            </div>
            <!-- ... stats lainnya tetap sama ... -->
        </div>
    </div>
</section>

<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-green-600', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.add('active', 'bg-green-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');
            
            // Filter items
            galleryItems.forEach(item => {
                if (filter === 'semua' || item.classList.contains(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection
