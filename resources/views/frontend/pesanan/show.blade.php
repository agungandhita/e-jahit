@extends('frontend.layouts.main')

@section('title', 'Detail Pesanan #' . $pesanan->pesanan_id . ' - E-Jahit')

@section('container')
<!-- Hero Section -->
<section class="bg-green-600 text-white py-20">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="text-green-200 hover:text-white">Beranda</a></li>
                    <li class="text-green-200">/</li>
                    <li><a href="{{ route('pesanan.index') }}" class="text-green-200 hover:text-white">Pesanan Saya</a></li>
                    <li class="text-green-200">/</li>
                    <li class="text-white font-medium">Detail Pesanan</li>
                </ol>
            </nav>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="{{ route('pesanan.index') }}" class="mr-4 text-white hover:text-green-200 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold mb-2 text-white">Detail Pesanan</h1>
                        <p class="text-xl lg:text-2xl text-green-100">Pesanan #{{ $pesanan->pesanan_id }} - {{ $pesanan->layanan->nama_layanan }}</p>
                    </div>
                </div>

                <!-- Order Status -->
                <div class="text-right">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-sm text-green-200">Status Pesanan</div>
                        <div class="text-lg font-bold text-white">
                            @switch($pesanan->status)
                                @case('pending')
                                    Menunggu Konfirmasi
                                    @break
                                @case('konfirmasi')
                                    Dikonfirmasi
                                    @break
                                @case('diproses')
                                    Sedang Dikerjakan
                                    @break
                                @case('selesai')
                                    Selesai
                                    @break
                                @case('dibatalkan')
                                    Dibatalkan
                                    @break
                                @default
                                    {{ ucfirst($pesanan->status) }}
                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Order Details Section -->
<section class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Order Status -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Status Pesanan</h2>

                        <!-- Status Timeline -->
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full {{ in_array($pesanan->status, ['pending', 'konfirmasi', 'diproses', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' }} mr-4"></div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Pesanan Dibuat</p>
                                    <p class="text-sm text-gray-500">{{ $pesanan->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full {{ in_array($pesanan->status, ['konfirmasi', 'diproses', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' }} mr-4"></div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Pesanan Dikonfirmasi</p>
                                    <p class="text-sm text-gray-500">
                                        @if(in_array($pesanan->status, ['konfirmasi', 'diproses', 'selesai']))
                                            {{ $pesanan->updated_at->format('d M Y, H:i') }}
                                        @else
                                            Menunggu konfirmasi
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full {{ in_array($pesanan->status, ['diproses', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' }} mr-4"></div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Sedang Dikerjakan</p>
                                    <p class="text-sm text-gray-500">
                                        @if(in_array($pesanan->status, ['diproses', 'selesai']))
                                            Pesanan sedang dalam proses pengerjaan
                                        @else
                                            Belum dimulai
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full {{ $pesanan->status == 'selesai' ? 'bg-green-500' : 'bg-gray-300' }} mr-4"></div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">Pesanan Selesai</p>
                                    <p class="text-sm text-gray-500">
                                        @if($pesanan->status == 'selesai')
                                            Pesanan telah selesai dikerjakan
                                        @else
                                            Estimasi: {{ $pesanan->estimasi_selesai ? $pesanan->estimasi_selesai->format('d M Y') : '-' }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Information -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Pesanan</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3">Detail Layanan</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Nama Layanan:</span>
                                        <span class="font-medium text-gray-800">{{ $pesanan->layanan->nama_layanan }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Jenis:</span>
                                        <span class="font-medium text-gray-800">{{ ucwords(str_replace('_', ' ', $pesanan->layanan->jenis_layanan)) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Ukuran:</span>
                                        <span class="font-medium text-gray-800">{{ $pesanan->layananUkuran->ukuran->nama_ukuran ?? 'Custom' }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Jumlah:</span>
                                        <span class="font-medium text-gray-800">{{ $pesanan->jumlah }} pcs</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Prioritas:</span>
                                        <span class="font-medium text-gray-800
                                            @if($pesanan->prioritas == 'cepat')
                                                text-orange-600
                                            @elseif($pesanan->prioritas == 'kilat')
                                                text-red-600
                                            @endif">
                                            {{ ucfirst($pesanan->prioritas) }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3">Detail Kain</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Kain:</span>
                                        <span class="font-medium text-gray-800">
                                            {{ $pesanan->kain_option == 'bawa_sendiri' ? 'Membawa sendiri' : 'Disediakan penjahit' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Measurements -->
                        <div class="mt-6">
                            <h3 class="font-semibold text-gray-800 mb-3">Ukuran Detail</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                @if(is_array($pesanan->detail_ukuran) && count($pesanan->detail_ukuran) > 0)
                                    @foreach($pesanan->detail_ukuran as $ukuran)
                                        @if(isset($ukuran['nilai']))
                                            <p class="text-gray-700 whitespace-pre-line">{{ $ukuran['nilai'] }}</p>
                                        @endif
                                    @endforeach
                                @elseif(is_string($pesanan->detail_ukuran))
                                    <p class="text-gray-700 whitespace-pre-line">{{ $pesanan->detail_ukuran }}</p>
                                @else
                                    <p class="text-gray-500 italic">Data ukuran tidak tersedia</p>
                                @endif
                            </div>
                        </div>

                        <!-- Notes -->
                        @if($pesanan->catatan)
                        <div class="mt-6">
                            <h3 class="font-semibold text-gray-800 mb-3">Catatan Khusus</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-700 whitespace-pre-line">{{ $pesanan->catatan }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Payment Information -->
                    @if($pesanan->bukti_pembayaran)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Pembayaran</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3">Detail Pembayaran</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status:</span>
                                        <span class="font-medium text-green-600">Sudah Upload Bukti</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Tanggal Upload:</span>
                                        <span class="font-medium text-gray-800">{{ $pesanan->updated_at->format('d M Y, H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Total Tagihan:</span>
                                        <span class="font-medium text-gray-800">{{ $pesanan->total_harga_format }}</span>
                                    </div>
                                    @if($pesanan->nominal_konfirmasi)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Nominal Dikonfirmasi:</span>
                                        <span class="font-medium text-gray-800">{{ $pesanan->nominal_konfirmasi_format }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800 mb-3">Bukti Pembayaran</h3>
                                <img src="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}"
                                     alt="Bukti Pembayaran"
                                     class="w-full max-w-xs rounded-lg border">
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Order Summary -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pesanan</h3>

                        <!-- Status Badge -->
                        <div class="mb-4">
                            <span class="px-3 py-2 rounded-full text-sm font-medium
                                @switch($pesanan->status)
                                    @case('pending')
                                        bg-yellow-100 text-yellow-800
                                        @break
                                    @case('konfirmasi')
                                    bg-blue-100 text-blue-800
                                    @break
                                    @case('diproses')
                                        bg-purple-100 text-purple-800
                                        @break
                                    @case('selesai')
                                        bg-green-100 text-green-800
                                        @break
                                    @case('dibatalkan')
                                        bg-red-100 text-red-800
                                        @break
                                    @default
                                        bg-gray-100 text-gray-800
                                @endswitch">
                                @switch($pesanan->status)
                                    @case('pending')
                                        Menunggu Konfirmasi
                                        @break
                                    @case('konfirmasi')
                                        Dikonfirmasi
                                        @break
                                    @case('diproses')
                                        Sedang Dikerjakan
                                        @break
                                    @case('selesai')
                                        Selesai
                                        @break
                                    @case('dibatalkan')
                                        Dibatalkan
                                        @break
                                    @default
                                        {{ ucfirst($pesanan->status) }}
                                @endswitch
                            </span>
                        </div>

                        <!-- Price Breakdown -->
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Harga Dasar:</span>
                                <span>{{ $pesanan->harga_dasar_format }}</span>
                            </div>
                            @if($pesanan->biaya_prioritas > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Biaya Prioritas:</span>
                                <span>{{ $pesanan->biaya_prioritas_format }}</span>
                            </div>
                            @endif
                            @if($pesanan->biaya_kain > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Biaya Kain:</span>
                                <span>{{ $pesanan->biaya_kain_format }}</span>
                            </div>
                            @endif
                            <hr class="my-2">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total:</span>
                                <span class="text-green-600">{{ $pesanan->total_harga_format }}</span>
                            </div>
                        </div>

                        <!-- Estimated Completion -->
                        @if($pesanan->estimasi_selesai)
                        <div class="mb-6">
                            <p class="text-sm text-gray-600 mb-1">Estimasi Selesai:</p>
                            <p class="font-semibold text-gray-800">{{ $pesanan->estimasi_selesai->format('d M Y') }}</p>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            @if($pesanan->status == 'pending' && !$pesanan->bukti_pembayaran)
                                <a href="{{ route('pesanan.payment', $pesanan->pesanan_id) }}"
                                   class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-center block">
                                    Upload Pembayaran
                                </a>
                            @endif

                            @if(in_array($pesanan->status, ['pending']))
                                <form action="{{ route('pesanan.cancel', $pesanan->pesanan_id) }}" method="POST"
                                      onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="w-full border-2 border-red-600 text-red-600 py-3 px-4 rounded-lg font-semibold hover:bg-red-600 hover:text-white transition-colors">
                                        Batalkan Pesanan
                                    </button>
                                </form>
                            @endif

                            <a href="https://wa.me/6281341349239?text=Halo%20E-Jahit,%20saya%20ingin%20bertanya%20tentang%20pesanan%20%23{{ $pesanan->pesanan_id }}"
                               target="_blank"
                               class="w-full border-2 border-green-600 text-green-600 py-3 px-4 rounded-lg font-semibold hover:bg-green-600 hover:text-white transition-colors text-center block">
                                Chat WhatsApp
                            </a>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Butuh Bantuan?</h3>
                        <p class="text-gray-600 mb-4">Hubungi kami jika ada pertanyaan tentang pesanan Anda.</p>

                        <div class="space-y-3">
                            <div class="flex items-center">
                                <span class="text-green-600 mr-3">📞</span>
                                <span class="text-sm">+62 812-3456-7890</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-green-600 mr-3">📧</span>
                                <span class="text-sm">info@e-jahit.com</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-green-600 mr-3">🕒</span>
                                <span class="text-sm">Senin - Sabtu: 08:00 - 17:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
