@extends('admin.layouts.main')

@section('container')
    <div class="mt-20 pb-10">
        <!-- Header -->
        <div class="mb-8 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5S21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12S9.24 7 12 7S17 9.24 17 12S14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12S10.34 15 12 15S15 13.66 15 12S13.66 9 12 9Z"/>
                        </svg>
                        <h1 class="text-3xl font-bold text-gray-800 mb-0">Detail Pesanan</h1>
                    </div>
                    <p class="text-gray-600 pl-11">{{ $pesanan->nomor_pesanan }}</p>
                </div>
                <div class="flex gap-3">
                    <button onclick="openStatusModal()" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z"/>
                        </svg>
                        Update Status
                    </button>
                    @if($pesanan->bukti_pembayaran && $pesanan->status === 'pending')
                        <form action="{{ route('admin.pesanan.konfirmasi-pembayaran', $pesanan) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"/>
                                </svg>
                                Konfirmasi Pembayaran
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('admin.pesanan.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="px-4 grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Order Info -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M19,19H5V5H19V19M17,12H7V10H17V12M15,16H7V14H15V16M17,8H7V6H17V8Z"/>
                        </svg>
                        Informasi Pesanan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Pesanan</label>
                            <p class="text-lg font-semibold text-gray-900">{{ $pesanan->nomor_pesanan }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $pesanan->status_badge_class }}">
                                {{ $pesanan->status_label }}
                            </span>
                            @if($pesanan->prioritas !== 'normal')
                                <span class="ml-2 inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $pesanan->prioritas === 'kilat' ? 'bg-red-100 text-red-800' : 'bg-orange-100 text-orange-800' }}">
                                    {{ ucfirst($pesanan->prioritas) }}
                                </span>
                            @endif
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pesanan</label>
                            <p class="text-gray-900">{{ $pesanan->created_at->format('d F Y, H:i') }}</p>
                        </div>
                        @if($pesanan->tanggal_bayar)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pembayaran</label>
                                <p class="text-gray-900">{{ $pesanan->tanggal_bayar->format('d F Y, H:i') }}</p>
                            </div>
                        @endif
                        @if($pesanan->estimasi_selesai)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Estimasi Selesai</label>
                                <p class="text-gray-900">{{ $pesanan->estimasi_selesai->format('d F Y') }}</p>
                            </div>
                        @endif
                        @if($pesanan->tanggal_selesai)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                                <p class="text-gray-900">{{ $pesanan->tanggal_selesai->format('d F Y, H:i') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Service Details -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,2A2,2 0 0,1 14,4V8A2,2 0 0,1 12,10A2,2 0 0,1 10,8V4A2,2 0 0,1 12,2M21,9V7L15,1H5A2,2 0 0,0 3,3V21A2,2 0 0,0 5,23H19A2,2 0 0,0 21,21V9Z"/>
                        </svg>
                        Detail Layanan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Layanan</label>
                            <p class="text-gray-900">{{ $pesanan->layanan->nama_layanan ?? 'Layanan Dihapus' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Layanan</label>
                            <p class="text-gray-900">{{ $pesanan->jenis_layanan }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                            <p class="text-gray-900">{{ $pesanan->jumlah }} pcs</p>
                        </div>
                        @if($pesanan->opsi_kain)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Opsi Kain</label>
                                <p class="text-gray-900">{{ ucfirst($pesanan->opsi_kain) }}</p>
                            </div>
                        @endif
                        @if($pesanan->estimasi_waktu)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Estimasi Waktu</label>
                                <p class="text-gray-900">{{ $pesanan->estimasi_waktu }} hari</p>
                            </div>
                        @endif
                    </div>
                    
                    @if($pesanan->detail_ukuran)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Detail Ukuran</label>
                            <div class="bg-gray-50 rounded-lg p-4">
                                @foreach($pesanan->detail_ukuran as $key => $value)
                                    <div class="flex justify-between py-1">
                                        <span class="text-gray-600">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span>
                                        <span class="text-gray-900 font-medium">
                                            @if(is_array($value))
                                                {{ implode(', ', $value) }}
                                            @else
                                                {{ $value }}
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    @if($pesanan->catatan)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-900">{{ $pesanan->catatan }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Customer Info -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 14V16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"/>
                        </svg>
                        Informasi Pemesan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <p class="text-gray-900">{{ $pesanan->nama_pemesan }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <p class="text-gray-900">{{ $pesanan->email_pemesan }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <p class="text-gray-900">{{ $pesanan->telepon_pemesan }}</p>
                        </div>
                        @if($pesanan->user)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">User Account</label>
                                <p class="text-gray-900">{{ $pesanan->user->name }} ({{ $pesanan->user->email }})</p>
                            </div>
                        @endif
                    </div>
                    
                    @if($pesanan->alamat_pemesan)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-900">{{ $pesanan->alamat_pemesan }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Pricing -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z"/>
                        </svg>
                        Rincian Harga
                    </h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Harga Dasar:</span>
                            <span class="text-gray-900 font-medium">Rp {{ number_format($pesanan->harga_dasar, 0, ',', '.') }}</span>
                        </div>
                        @if($pesanan->biaya_tambahan > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Biaya Tambahan:</span>
                                <span class="text-gray-900 font-medium">Rp {{ number_format($pesanan->biaya_tambahan, 0, ',', '.') }}</span>
                            </div>
                        @endif
                        <hr class="border-gray-200">
                        <div class="flex justify-between text-lg font-bold">
                            <span class="text-gray-900">Total Tagihan:</span>
                            <span class="text-indigo-600">{{ $pesanan->total_harga_format }}</span>
                        </div>
                        @if($pesanan->nominal_konfirmasi)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nominal Dikonfirmasi:</span>
                                <span class="text-gray-900 font-medium">{{ $pesanan->nominal_konfirmasi_format }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <button onclick="openPriceModal()" class="w-full mt-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        Update Harga
                    </button>
                </div>

                <!-- Payment Proof -->
                @if($pesanan->bukti_pembayaran)
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                            </svg>
                            Bukti Pembayaran
                        </h2>
                        <div class="text-center">
                            <img src="{{ Storage::url($pesanan->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-full max-w-sm mx-auto rounded-lg shadow-md mb-4">
                            <a href="{{ Storage::url($pesanan->bukti_pembayaran) }}" target="_blank" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                                </svg>
                                Lihat Ukuran Penuh
                            </a>
                        </div>
                        
                        @if($pesanan->status === 'pending')
                            <div class="mt-4 flex gap-2">
                                <form action="{{ route('admin.pesanan.konfirmasi-pembayaran', $pesanan) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                        Konfirmasi
                                    </button>
                                </form>
                                <button onclick="openRejectModal()" class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                    Tolak
                                </button>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Progress -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z"/>
                        </svg>
                        Progress Pesanan
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Progress</span>
                            <span class="text-gray-900 font-medium">{{ $pesanan->progress_percentage }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-indigo-600 h-2 rounded-full transition-all duration-300" style="width: {{ $pesanan->progress_percentage }}%"></div>
                        </div>
                        
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center gap-2 {{ $pesanan->progress_percentage >= 25 ? 'text-green-600' : 'text-gray-400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"/>
                                </svg>
                                Pesanan Diterima
                            </div>
                            <div class="flex items-center gap-2 {{ $pesanan->progress_percentage >= 50 ? 'text-green-600' : 'text-gray-400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"/>
                                </svg>
                                Pembayaran Dikonfirmasi
                            </div>
                            <div class="flex items-center gap-2 {{ $pesanan->progress_percentage >= 75 ? 'text-green-600' : 'text-gray-400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"/>
                                </svg>
                                Sedang Dikerjakan
                            </div>
                            <div class="flex items-center gap-2 {{ $pesanan->progress_percentage >= 100 ? 'text-green-600' : 'text-gray-400' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"/>
                                </svg>
                                Pesanan Selesai
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Update Modal -->
    <div id="statusModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Update Status Pesanan</h3>
                <form action="{{ route('admin.pesanan.update-status', $pesanan) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Baru</label>
                        <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="pending" {{ $pesanan->status === 'pending' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                            <option value="konfirmasi" {{ $pesanan->status === 'konfirmasi' ? 'selected' : '' }}>Sudah Dikonfirmasi</option>
                            <option value="diproses" {{ $pesanan->status === 'diproses' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                            <option value="selesai" {{ $pesanan->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan" {{ $pesanan->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin (Opsional)</label>
                        <textarea name="catatan_admin" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Tambahkan catatan jika diperlukan...">{{ $pesanan->catatan }}</textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeStatusModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Price Update Modal -->
    <div id="priceModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Update Harga Pesanan</h3>
                <form action="{{ route('admin.pesanan.update-harga', $pesanan) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Harga Dasar</label>
                        <input type="number" name="harga_dasar" value="{{ $pesanan->harga_dasar }}" min="0" step="1000" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Biaya Tambahan</label>
                        <input type="number" name="biaya_tambahan" value="{{ $pesanan->biaya_tambahan }}" min="0" step="1000" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Harga (Opsional)</label>
                        <textarea name="catatan_harga" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Alasan perubahan harga..."></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closePriceModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Update Harga
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Reject Payment Modal -->
    <div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Tolak Pembayaran</h3>
                <form action="{{ route('admin.pesanan.tolak-pembayaran', $pesanan) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alasan Penolakan</label>
                        <textarea name="alasan_penolakan" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Jelaskan alasan penolakan pembayaran..." required></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeRejectModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Tolak Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Modal Functions
    function openStatusModal() {
        document.getElementById('statusModal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.add('hidden');
    }

    function openPriceModal() {
        document.getElementById('priceModal').classList.remove('hidden');
    }

    function closePriceModal() {
        document.getElementById('priceModal').classList.add('hidden');
    }

    function openRejectModal() {
        document.getElementById('rejectModal').classList.remove('hidden');
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
    }

    // Close modals when clicking outside
    window.addEventListener('click', function(e) {
        const statusModal = document.getElementById('statusModal');
        const priceModal = document.getElementById('priceModal');
        const rejectModal = document.getElementById('rejectModal');
        
        if (e.target === statusModal) {
            closeStatusModal();
        }
        if (e.target === priceModal) {
            closePriceModal();
        }
        if (e.target === rejectModal) {
            closeRejectModal();
        }
    });
</script>
@endpush