@extends('frontend.layouts.main')

@section('title', 'Pembayaran Pesanan #' . $pesanan->pesanan_id . ' - E-Jahit')

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
                    <li><a href="{{ route('pesanan.show', $pesanan->pesanan_id) }}" class="text-green-200 hover:text-white">Detail Pesanan</a></li>
                    <li class="text-green-200">/</li>
                    <li class="text-white font-medium">Pembayaran</li>
                </ol>
            </nav>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="{{ route('pesanan.show', $pesanan->pesanan_id) }}" class="mr-4 text-white hover:text-green-200 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-4xl lg:text-5xl font-bold mb-2 text-white">Pembayaran</h1>
                        <p class="text-xl lg:text-2xl text-green-100">Pesanan #{{ $pesanan->pesanan_id }} - {{ $pesanan->layanan->nama_layanan }}</p>
                    </div>
                </div>

                <!-- Payment Status -->
                <div class="text-right">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg px-4 py-2">
                        <div class="text-sm text-green-200">Total Pembayaran</div>
                        <div class="text-2xl font-bold text-white">{{ $pesanan->total_harga_format }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Section -->
<section class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto max-w-6xl">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Payment Instructions -->
                <div class="bg-white rounded-xl shadow-lg p-8 border border-green-100">
                    <h2 class="text-2xl font-bold text-green-800 mb-6">Instruksi Pembayaran</h2>

                    <!-- Payment Amount -->
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Total Pembayaran</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $pesanan->total_harga_format }}</p>
                    </div>

                    <!-- Bank Transfer Options -->
                    <div class="space-y-4 mb-6">
                        <h3 class="text-lg font-semibold text-green-800">Pilih Metode Pembayaran</h3>

                        <!-- BRI -->
                        <div class="border border-green-200 rounded-lg p-4 hover:bg-green-50">
                            <div class="flex items-center mb-2">
                                <div class="w-12 h-8 bg-green-800 rounded flex items-center justify-center mr-3">
                                    <span class="text-white font-bold text-sm">BRI</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-800">Bank Rakyat Indonesia (BRI)</p>
                                    <p class="text-sm text-green-600">Transfer Bank</p>
                                </div>
                            </div>
                            <div class="ml-15">
                                <p class="text-sm text-green-600">No. Rekening:</p>
                                <p class="font-mono font-bold text-lg text-green-800">5678901234</p>
                                <p class="text-sm text-green-600">a.n. E-Jahit Indonesia</p>
                            </div>
                        </div>

                        <!-- DANA -->
                        <div class="border border-green-200 rounded-lg p-4 hover:bg-green-50">
                            <div class="flex items-center mb-2">
                                <div class="w-12 h-8 bg-blue-600 rounded flex items-center justify-center mr-3">
                                    <span class="text-white font-bold text-xs">DANA</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-800">DANA</p>
                                    <p class="text-sm text-green-600">E-Wallet</p>
                                </div>
                            </div>
                            <div class="ml-15">
                                <p class="text-sm text-green-600">No. DANA:</p>
                                <p class="font-mono font-bold text-lg text-green-800">081234567890</p>
                                <p class="text-sm text-green-600">a.n. E-Jahit Indonesia</p>
                            </div>
                        </div>

                        <!-- Mandiri -->
                        <div class="border border-green-200 rounded-lg p-4 hover:bg-green-50">
                            <div class="flex items-center mb-2">
                                <div class="w-12 h-8 bg-yellow-500 rounded flex items-center justify-center mr-3">
                                    <span class="text-white font-bold text-xs">MDR</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-green-800">Bank Mandiri</p>
                                    <p class="text-sm text-green-600">Transfer Bank</p>
                                </div>
                            </div>
                            <div class="ml-15">
                                <p class="text-sm text-green-600">No. Rekening:</p>
                                <p class="font-mono font-bold text-lg text-green-800">0987654321</p>
                                <p class="text-sm text-green-600">a.n. E-Jahit Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <h4 class="font-semibold text-green-800 mb-2">Langkah Pembayaran:</h4>
                        <ol class="list-decimal list-inside text-sm text-green-700 space-y-1">
                            <li>Transfer sesuai nominal yang tertera</li>
                            <li>Simpan bukti transfer</li>
                            <li>Upload bukti transfer di form sebelah</li>
                            <li>Tunggu konfirmasi dari admin</li>
                        </ol>
                    </div>
                </div>

                <!-- Upload Form -->
                <div class="bg-white rounded-xl shadow-lg p-8 border border-green-100">
                    <h2 class="text-2xl font-bold text-green-800 mb-6">Upload Bukti Pembayaran</h2>

                    @if($pesanan->bukti_pembayaran)
                        <!-- Already Uploaded -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-6 text-center">
                            <div class="text-4xl mb-4">✅</div>
                            <h3 class="text-lg font-semibold text-green-800 mb-2">Bukti Pembayaran Sudah Diupload</h3>
                            <p class="text-green-600 mb-4">Terima kasih! Bukti pembayaran Anda sudah kami terima dan sedang dalam proses verifikasi.</p>

                            <!-- Show uploaded image -->
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $pesanan->bukti_pembayaran) }}"
                                     alt="Bukti Pembayaran"
                                     class="max-w-xs mx-auto rounded-lg border border-green-200">
                            </div>

                            <div class="space-y-3">
                                <a href="{{ route('pesanan.show', $pesanan->pesanan_id) }}"
                                   class="block bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                                    Kembali ke Detail Pesanan
                                </a>
                                <a href="https://wa.me/6281234567890?text=Halo%20E-Jahit,%20saya%20sudah%20upload%20bukti%20pembayaran%20untuk%20pesanan%20%23{{ $pesanan->pesanan_id }}"
                                   target="_blank"
                                   class="block border-2 border-green-600 text-green-600 py-3 px-6 rounded-lg font-semibold hover:bg-green-600 hover:text-white transition-colors">
                                    Konfirmasi via WhatsApp
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- Upload Form -->
                        <form action="{{ route('pesanan.upload-payment', $pesanan->pesanan_id) }}" method="POST" enctype="multipart/form-data" id="paymentForm">
                            @csrf

                            <!-- Order Summary -->
                            <div class="bg-green-50 rounded-lg p-4 mb-6 border border-green-200">
                                <h3 class="font-semibold text-green-800 mb-3">Ringkasan Pesanan</h3>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-green-600">Pesanan:</span>
                                        <span class="font-medium text-green-800">#{{ $pesanan->pesanan_id }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-green-600">Layanan:</span>
                                        <span class="font-medium text-green-800">{{ $pesanan->layanan->nama_layanan }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-green-600">Jumlah:</span>
                                        <span class="font-medium text-green-800">{{ $pesanan->jumlah }} pcs</span>
                                    </div>
                                    <hr class="my-2 border-green-200">
                                    <div class="flex justify-between font-bold">
                                        <span class="text-green-800">Total:</span>
                                        <span class="text-green-600">{{ $pesanan->total_harga_format }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Nominal Pembayaran -->
                            <div class="mb-6">
                                <label for="nominal_konfirmasi" class="block text-sm font-medium text-green-700 mb-2">
                                    Nominal yang Dikonfirmasi *
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-green-600 font-medium">Rp</span>
                                    <input type="number"
                                           id="nominal_konfirmasi"
                                           name="nominal_konfirmasi"
                                           value="{{ old('nominal_konfirmasi', $pesanan->total_harga) }}"
                                           min="0"
                                           step="1000"
                                           required
                                           class="w-full pl-12 pr-4 pt-6 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                           placeholder="Masukkan nominal yang dikonfirmasi">
                                </div>
                                <p class="text-sm text-green-600 mt-1">Total yang harus dikonfirmasi: <span class="font-semibold">{{ $pesanan->total_harga_format }}</span></p>
                            </div>

                            <!-- File Upload -->
                            <div class="mb-6">
                                <label for="bukti_pembayaran" class="block text-sm font-medium text-green-700 mb-2">
                                    Bukti Pembayaran *
                                </label>
                                <div class="border-2 border-dashed border-green-300 rounded-lg p-6 text-center hover:border-green-500 transition-colors" id="dropZone">
                                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" required class="hidden">
                                    <div id="uploadText">
                                        <div class="text-4xl mb-4 text-green-400">📁</div>
                                        <p class="text-green-600 mb-2">Klik untuk pilih file atau drag & drop</p>
                                        <p class="text-sm text-green-500">Format: JPG, PNG, JPEG (Max: 2MB)</p>
                                    </div>
                                    <div id="previewContainer" class="hidden">
                                        <img id="imagePreview" class="max-w-xs mx-auto rounded-lg border border-green-200">
                                        <p id="fileName" class="mt-2 text-sm text-green-600"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button type="submit" id="submitBtn" class="flex-1 bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors disabled:bg-green-300" disabled>
                                    Upload Bukti Pembayaran
                                </button>
                                <a href="{{ route('pesanan.show', $pesanan->pesanan_id) }}" class="flex-1 border-2 border-green-300 text-green-700 py-3 px-6 rounded-lg font-semibold hover:bg-green-50 transition-colors text-center">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// JavaScript untuk upload file
document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('bukti_pembayaran');
    const uploadText = document.getElementById('uploadText');
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const fileName = document.getElementById('fileName');
    const submitBtn = document.getElementById('submitBtn');

    // Click to select file
    dropZone.addEventListener('click', () => fileInput.click());

    // Drag and drop
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-green-500', 'bg-green-50');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-green-500', 'bg-green-50');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-green-500', 'bg-green-50');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFileSelect(files[0]);
        }
    });

    // File input change
    fileInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            handleFileSelect(e.target.files[0]);
        }
    });

    function handleFileSelect(file) {
        // Validate file
        if (!file.type.startsWith('image/')) {
            alert('Harap pilih file gambar (JPG, PNG, JPEG)');
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file maksimal 2MB');
            return;
        }

        // Show preview
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            fileName.textContent = file.name;
            uploadText.classList.add('hidden');
            previewContainer.classList.remove('hidden');
            submitBtn.disabled = false;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
