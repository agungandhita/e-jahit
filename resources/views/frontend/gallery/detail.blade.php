@extends('frontend.layouts.main')

@section('container')
<!-- Hero Section -->
<section class="bg-green-600 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center text-white mb-4">
            <a href="{{ route('gallery.index') }}" class="hover:text-green-200 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <span class="text-green-200">Kembali ke Galeri</span>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $produk->nama }}</h1>
        <p class="text-lg text-green-100">
            {{ $produk->kategori_label }}
        </p>
    </div>
</section>

<!-- Product Detail -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="aspect-square rounded-xl overflow-hidden bg-gray-100">
                    <img src="{{ $produk->foto_utama }}" alt="{{ $produk->nama }}" 
                         class="w-full h-full object-cover" id="main-image">
                </div>
                
                <!-- Thumbnail Images -->
                @if($produk->fotos->count() > 1)
                <div class="grid grid-cols-4 gap-2">
                    @foreach($produk->fotos as $foto)
                    <div class="aspect-square rounded-lg overflow-hidden bg-gray-100 cursor-pointer hover:opacity-75 transition-opacity"
                         onclick="changeMainImage('{{ asset('storage/' . $foto->path_file) }}')">
                        <img src="{{ asset('storage/' . $foto->path_file) }}" alt="{{ $produk->nama }}" 
                             class="w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <!-- Category Badge -->
                <div>
                    <span class="inline-block px-4 py-2 bg-green-100 text-green-600 text-sm font-medium rounded-lg">
                        {{ $produk->kategori_label }}
                    </span>
                </div>

                <!-- Product Name -->
                <h1 class="text-3xl font-bold text-gray-800">{{ $produk->nama }}</h1>

                <!-- Price -->
                <div class="text-2xl font-bold text-green-600">{{ $produk->harga_format }}</div>

                <!-- Stock Status -->
                <div class="flex items-center space-x-2">
                    @if($produk->jumlah_produksi > 0)
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-green-600 font-medium">Tersedia ({{ $produk->jumlah_produksi }} PCS)</span>
                    @else
                        <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                        <span class="text-orange-600 font-medium">Pre-order</span>
                    @endif
                </div>

                <!-- Description -->
                <div class="space-y-3">
                    <h3 class="text-lg font-semibold text-gray-800">Deskripsi Produk</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $produk->deskripsi }}</p>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <a href="{{ route('services') }}" class="block w-full bg-green-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-green-700 transition-colors text-center">
                        Hubungi untuk Pemesanan
                    </a>
                    @php
                        $whatsappMessage = "Halo, saya tertarik dengan produk *{$produk->nama}* dari kategori {$produk->kategori_label}.\n\n";
                        $whatsappMessage .= "Detail produk:\n";
                        $whatsappMessage .= "- Nama: {$produk->nama}\n";
                        $whatsappMessage .= "- Kategori: {$produk->kategori_label}\n";
                        $whatsappMessage .= "- Harga: {$produk->harga_format}\n";
                        if($produk->jumlah_produksi > 0) {
                            $whatsappMessage .= "- Status: Tersedia ({$produk->jumlah_produksi} PCS)\n";
                        } else {
                            $whatsappMessage .= "- Status: Pre-order\n";
                        }
                        $whatsappMessage .= "\nSaya ingin berkonsultasi mengenai desain dan detail pemesanan produk ini. Terima kasih!";
                        $whatsappUrl = 'https://wa.me/6281341349239?text=' . urlencode($whatsappMessage);
                    @endphp
                    <a href="{{ $whatsappUrl }}" target="_blank" class="block w-full border border-green-600 text-green-600 py-3 px-6 rounded-lg font-medium hover:bg-green-50 transition-colors text-center">
                        Konsultasi Desain
                    </a>
                </div>

                <!-- Product Details -->
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Detail Produk</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Kategori:</span>
                            <span class="text-gray-800 font-medium">{{ $produk->kategori_label }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Status:</span>
                            <span class="text-gray-800 font-medium">{{ ucfirst($produk->status) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Jumlah Produksi:</span>
                            <span class="text-gray-800 font-medium">{{ $produk->jumlah_produksi }} PCS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Produk Serupa</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $relatedProducts = App\Models\Produk::with(['fotos', 'fotoPrimary'])
                    ->aktif()
                    ->where('kategori', $produk->kategori)
                    ->where('produk_id', '!=', $produk->produk_id)
                    ->limit(3)
                    ->get();
            @endphp
            
            @foreach($relatedProducts as $related)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $related->foto_utama }}" alt="{{ $related->nama }}"
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 mb-2">{{ $related->nama }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($related->deskripsi, 80) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-green-600 font-bold">{{ $related->harga_format }}</span>
                        <a href="{{ route('gallery.detail', $related->produk_id) }}" 
                           class="text-green-600 hover:text-green-700 font-medium text-sm">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
function changeMainImage(imageSrc) {
    document.getElementById('main-image').src = imageSrc;
}
</script>
@endsection