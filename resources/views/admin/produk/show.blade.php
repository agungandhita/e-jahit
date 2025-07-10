@extends('admin.layouts.main')

@section('container')
    <div class="mt-20 pb-10">
        <!-- Header -->
        <div class="mb-8 px-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.produk.index') }}" class="text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-0">Detail Produk</h1>
                        <p class="text-gray-600">Informasi lengkap produk</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.produk.edit', $produk) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z"/>
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.produk.destroy', $produk) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Foto Produk -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Foto Produk</h2>
                        
                        @if($produk->fotos->count() > 0)
                            <!-- Main Image -->
                            <div class="mb-4">
                                @php
                                    $primaryFoto = $produk->fotos->where('is_primary', true)->first() ?? $produk->fotos->first();
                                @endphp
                                <img id="mainImage" src="{{ $primaryFoto->url }}" alt="{{ $produk->nama }}" 
                                     class="w-full h-96 object-cover rounded-lg border">
                            </div>
                            
                            <!-- Thumbnail Images -->
                            @if($produk->fotos->count() > 1)
                                <div class="grid grid-cols-4 md:grid-cols-6 gap-2">
                                    @foreach($produk->fotos as $foto)
                                        <div class="relative cursor-pointer" onclick="changeMainImage('{{ $foto->url }}')">
                                            <img src="{{ $foto->url }}" alt="{{ $produk->nama }}" 
                                                 class="w-full h-16 object-cover rounded border hover:border-indigo-500 transition-colors {{ $foto->is_primary ? 'border-indigo-500' : '' }}">
                                            @if($foto->is_primary)
                                                <span class="absolute -top-1 -right-1 bg-green-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">✓</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="text-center py-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400 mx-auto mb-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                </svg>
                                <p class="text-gray-500">Belum ada foto untuk produk ini</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Info Produk -->
                <div class="space-y-6">
                    <!-- Basic Info -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Produk</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Nama Produk</label>
                                <p class="text-lg font-semibold text-gray-900">{{ $produk->nama }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Kategori</label>
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $produk->kategori_label }}
                                </span>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Harga</label>
                                <p class="text-2xl font-bold text-green-600">{{ $produk->harga_format }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Jumlah Produksi</label>
                                <p class="text-lg font-semibold {{ $produk->jumlah_produksi <= 5 ? 'text-red-600' : 'text-gray-900' }}">
                                    {{ $produk->jumlah_produksi }} unit
                                    @if($produk->jumlah_produksi <= 5)
                                        <span class="text-sm text-red-500">(Produksi Rendah)</span>
                                    @endif
                                </p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $produk->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($produk->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Toggle Status Button -->
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <form action="{{ route('admin.produk.toggle-status', $produk) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="w-full {{ $produk->status == 'aktif' ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                    {{ $produk->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }} Produk
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Timestamps -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Waktu</h3>
                        
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Dibuat</label>
                                <p class="text-sm text-gray-900">{{ $produk->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-500 mb-1">Terakhir Diupdate</label>
                                <p class="text-sm text-gray-900">{{ $produk->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Deskripsi -->
            @if($produk->deskripsi)
                <div class="mt-8">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Deskripsi</h2>
                        <div class="prose max-w-none">
                            <p class="text-gray-700 leading-relaxed">{{ $produk->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
    <script>
        function changeMainImage(imageUrl) {
            document.getElementById('mainImage').src = imageUrl;
        }
    </script>
    @endpush
@endsection