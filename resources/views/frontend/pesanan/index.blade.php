@extends('frontend.layouts.main')

@section('title', 'Pesanan Saya - E-Jahit')

@section('container')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-700 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-blue-200 hover:text-white">Beranda</a></li>
                    <li class="text-blue-200">/</li>
                    <li class="text-white font-medium">Pesanan Saya</li>
                </ol>
            </nav>
            
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4 text-white">Pesanan Saya</h1>
                <p class="text-xl lg:text-2xl mb-8 text-blue-100">Kelola dan pantau status pesanan jahit Anda</p>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold text-white">{{ $pesanan->count() }}</div>
                        <div class="text-sm text-blue-200">Total Pesanan</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold text-white">{{ $pesanan->where('status', 'pending')->count() }}</div>
                        <div class="text-sm text-blue-200">Menunggu</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold text-white">{{ $pesanan->where('status', 'in_progress')->count() }}</div>
                        <div class="text-sm text-blue-200">Dikerjakan</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold text-white">{{ $pesanan->where('status', 'completed')->count() }}</div>
                        <div class="text-sm text-blue-200">Selesai</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Orders Section -->
<section class="py-16 px-4 bg-blue-50">
    <div class="container mx-auto">
        <div class="max-w-6xl mx-auto">
            <!-- Filter Tabs -->
            <div class="mb-8">
                <div class="flex flex-wrap gap-2 mb-6">
                    <a href="{{ route('pesanan.index') }}"
                       class="px-4 py-2 rounded-lg font-medium {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 hover:bg-blue-100' }}">
                        Semua
                    </a>
                    <a href="{{ route('pesanan.index', ['status' => 'pending']) }}"
                       class="px-4 py-2 rounded-lg font-medium {{ request('status') == 'pending' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 hover:bg-blue-100' }}">
                        Menunggu Konfirmasi
                    </a>
                    <a href="{{ route('pesanan.index', ['status' => 'confirmed']) }}"
                       class="px-4 py-2 rounded-lg font-medium {{ request('status') == 'confirmed' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 hover:bg-blue-100' }}">
                        Dikonfirmasi
                    </a>
                    <a href="{{ route('pesanan.index', ['status' => 'in_progress']) }}"
                       class="px-4 py-2 rounded-lg font-medium {{ request('status') == 'in_progress' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 hover:bg-blue-100' }}">
                        Sedang Dikerjakan
                    </a>
                    <a href="{{ route('pesanan.index', ['status' => 'completed']) }}"
                       class="px-4 py-2 rounded-lg font-medium {{ request('status') == 'completed' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 hover:bg-blue-100' }}">
                        Selesai
                    </a>
                </div>
            </div>

            @if($pesanan->count() > 0)
                <!-- Orders List -->
                <div class="space-y-6">
                    @foreach($pesanan as $order)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100">
                            <div class="p-6">
                                <!-- Order Header -->
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                                    <div class="mb-4 lg:mb-0">
                                        <h3 class="text-xl font-bold text-blue-800 mb-1">
                                            #{{ $order->pesanan_id }} - {{ $order->layanan->nama_layanan }}
                                        </h3>
                                        <p class="text-blue-600">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <!-- Status Badge -->
                                        <span class="px-3 py-1 rounded-full text-sm font-medium
                                            @switch($order->status)
                                                @case('pending')
                                                    bg-yellow-100 text-yellow-800
                                                    @break
                                                @case('confirmed')
                                                    bg-blue-100 text-blue-800
                                                    @break
                                                @case('in_progress')
                                                    bg-purple-100 text-purple-800
                                                    @break
                                                @case('completed')
                                                    bg-green-100 text-green-800
                                                    @break
                                                @case('cancelled')
                                                    bg-red-100 text-red-800
                                                    @break
                                                @default
                                                    bg-gray-100 text-gray-800
                                            @endswitch">
                                            @switch($order->status)
                                                @case('pending')
                                                    Menunggu Konfirmasi
                                                    @break
                                                @case('confirmed')
                                                    Dikonfirmasi
                                                    @break
                                                @case('in_progress')
                                                    Sedang Dikerjakan
                                                    @break
                                                @case('completed')
                                                    Selesai
                                                    @break
                                                @case('cancelled')
                                                    Dibatalkan
                                                    @break
                                                @default
                                                    {{ ucfirst($order->status) }}
                                            @endswitch
                                        </span>

                                        <!-- Priority Badge -->
                                        @if($order->prioritas != 'normal')
                                            <span class="px-2 py-1 rounded text-xs font-medium
                                                @if($order->prioritas == 'cepat')
                                                    bg-orange-100 text-orange-800
                                                @elseif($order->prioritas == 'kilat')
                                                    bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($order->prioritas) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Order Details -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                                    <div>
                                        <p class="text-sm text-blue-500">Jenis Layanan</p>
                                        <p class="font-medium text-blue-800">{{ ucwords(str_replace('_', ' ', $order->layanan->jenis_layanan)) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-blue-500">Jumlah</p>
                                        <p class="font-medium text-blue-800">{{ $order->jumlah }} pcs</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-blue-500">Total Harga</p>
                                        <p class="font-bold text-blue-600">{{ $order->total_harga_format }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-blue-500">Estimasi Selesai</p>
                                        <p class="font-medium text-blue-800">{{ $order->estimasi_selesai ? $order->estimasi_selesai->format('d M Y') : '-' }}</p>
                                    </div>
                                </div>

                                <!-- Order Actions -->
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('pesanan.show', $order->pesanan_id) }}"
                                       class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors text-center">
                                        Lihat Detail
                                    </a>

                                    @if($order->status == 'confirmed' && !$order->bukti_pembayaran)
                                        <a href="{{ route('pesanan.payment', $order->pesanan_id) }}"
                                           class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-700 transition-colors text-center">
                                            Upload Pembayaran
                                        </a>
                                    @endif

                                    @if(in_array($order->status, ['pending', 'confirmed']))
                                        <form action="{{ route('pesanan.cancel', $order->pesanan_id) }}" method="POST" class="flex-1"
                                              onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                    class="w-full border-2 border-red-600 text-red-600 py-2 px-4 rounded-lg font-medium hover:bg-red-600 hover:text-white transition-colors">
                                                Batalkan
                                            </button>
                                        </form>
                                    @endif

                                    <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20ingin%20bertanya%20tentang%20pesanan%20%23{{ $order->pesanan_id }}"
                                       target="_blank"
                                       class="flex-1 border-2 border-blue-600 text-blue-600 py-2 px-4 rounded-lg font-medium hover:bg-blue-600 hover:text-white transition-colors text-center">
                                        Chat WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $pesanan->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <div class="text-6xl mb-4">📋</div>
                    <h3 class="text-2xl font-bold text-blue-800 mb-4">
                        @if(request('status'))
                            Tidak Ada Pesanan dengan Status "{{ ucfirst(str_replace('_', ' ', request('status'))) }}"
                        @else
                            Belum Ada Pesanan
                        @endif
                    </h3>
                    <p class="text-blue-600 mb-8">
                        @if(request('status'))
                            Coba lihat pesanan dengan status lain atau buat pesanan baru.
                        @else
                            Mulai buat pesanan pertama Anda untuk mendapatkan layanan jahit terbaik.
                        @endif
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('services') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Lihat Layanan
                        </a>
                        @if(request('status'))
                            <a href="{{ route('pesanan.index') }}" class="border-2 border-blue-300 text-blue-700 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                                Lihat Semua Pesanan
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
