@extends('frontend.layouts.main')

@section('title', 'Buat Pesanan - E-Jahit')

@section('container')
<!-- Hero Section -->
<section class="bg-green-600 text-white py-20">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Buat Pesanan Baru</h1>
            <p class="text-xl text-green-100 max-w-2xl mx-auto">
                Isi detail pesanan Anda dengan lengkap untuk mendapatkan hasil jahitan terbaik
            </p>
                
        </div>
    </div>
</section>

<!-- Order Form Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="max-w-4xl mx-auto">
            <!-- Service Info -->
            @if(isset($layanan))
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8 border border-green-100">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-green-800 mb-2">{{ $layanan->nama_layanan }}</h2>
                        <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                            {{ $layanan->kategori }}
                        </span>
                    </div>
                </div>
                <p class="text-green-600 mb-4">{{ $layanan->deskripsi }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-green-600">{{ $layanan->harga_format }}</span>
                    <span class="text-sm text-green-500">Estimasi: {{ $layanan->estimasi_hari }} hari</span>
                </div>
            </div>
            @endif

            <!-- Order Form -->
            <div class="bg-white rounded-xl shadow-lg p-8 border border-green-100">
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                        <h4 class="font-semibold text-red-800 mb-2">Terjadi kesalahan:</h4>
                        <ul class="list-disc list-inside text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pesanan.store') }}" method="POST" id="orderForm">
                    @csrf

                    <!-- Detail Pesanan -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-green-800 mb-6">Detail Pesanan</h3>

                        <!-- Jumlah -->
                        <div class="mb-6">
                            <label for="jumlah" class="block text-sm font-medium text-green-700 mb-2">Jumlah yang ingin dijahit *</label>
                            <input type="number" id="jumlah" name="jumlah" min="1" value="{{ old('jumlah', 1) }}" required
                                   class="w-full px-4 py-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>

                        <!-- Kain -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-green-700 mb-2">Kain *</label>
                            <div class="space-y-3">
                                <label class="flex items-center">
                                    <input type="radio" name="kain_option" value="bawa_sendiri" class="mr-3 text-green-600" {{ old('kain_option') == 'bawa_sendiri' ? 'checked' : '' }} required>
                                    <span class="text-green-800">Membawa kain sendiri</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="kain_option" value="disediakan" class="mr-3 text-green-600" {{ old('kain_option') == 'disediakan' ? 'checked' : '' }} required>
                                    <span class="text-green-800">Disediakan oleh penjahit (biaya tambahan Rp 50.000/item)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Pilihan Ukuran -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-green-700 mb-2">Pilih Ukuran *</label>
                            @if($availableSizes->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($availableSizes as $size)
                                        <label class="flex items-center p-4 border border-green-200 rounded-lg hover:bg-green-50 cursor-pointer">
                                            <input type="radio" name="layanan_ukuran_id" value="{{ $size->layanan_ukuran_id }}" 
                                                   class="mr-3 text-green-600" {{ old('layanan_ukuran_id') == $size->layanan_ukuran_id ? 'checked' : '' }} required>
                                            <div class="flex-1">
                                                <div class="font-semibold text-green-800">{{ $size->ukuran->nama_ukuran }}</div>
                                                <div class="text-sm text-green-600">{{ $size->ukuran->kategori_ukuran }} - {{ $size->ukuran->jenis_pakaian }}</div>
                                                <div class="text-sm text-green-600 font-medium">Rp {{ number_format($size->harga, 0, ',', '.') }}</div>
                                                @if($size->ukuran->deskripsi_ukuran)
                                                    <div class="text-xs text-gray-500 mt-1">{{ $size->ukuran->deskripsi_ukuran }}</div>
                                                @endif
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            @else
                                <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                    <p class="text-yellow-800">Belum ada ukuran tersedia untuk layanan ini. Silakan hubungi admin.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Detail Ukuran Custom -->
                        <div class="mb-6">
                            <label for="ukuran" class="block text-sm font-medium text-green-700 mb-2">Detail Ukuran Tambahan</label>
                            <textarea id="ukuran" name="ukuran" rows="4" required
                                      placeholder="Contoh: Lingkar dada: 90cm, Lingkar pinggang: 70cm, Panjang: 100cm, dll."
                                      class="w-full px-4 py-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('ukuran') }}</textarea>
                            <p class="text-sm text-green-500 mt-1">Tuliskan detail ukuran spesifik sesuai kebutuhan Anda</p>
                        </div>

                        <!-- Catatan Khusus -->
                        <div class="mb-6">
                            <label for="catatan" class="block text-sm font-medium text-green-700 mb-2">Catatan Khusus</label>
                            <textarea id="catatan" name="catatan" rows="3"
                                      placeholder="Tambahkan catatan khusus untuk pesanan Anda (opsional)"
                                      class="w-full px-4 py-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('catatan') }}</textarea>
                        </div>
                    </div>

                    <!-- Prioritas Pengerjaan -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-green-800 mb-6">Prioritas Pengerjaan</h3>
                        <div class="space-y-4">
                            <label class="flex items-start p-4 border border-green-200 rounded-lg hover:bg-green-50 cursor-pointer">
                                <input type="radio" name="prioritas" value="normal" class="mt-1 mr-4 text-green-600" {{ old('prioritas') == 'normal' ? 'checked' : '' }} required>
                                <div class="flex-1">
                                    <div class="font-semibold text-green-800">Normal (Sesuai Antrian)</div>
                                    <div class="text-sm text-green-600">Estimasi: {{ $layanan->estimasi_hari ?? '7-14' }} hari kerja</div>
                                    <div class="text-sm text-green-600 font-medium">Tidak ada biaya tambahan</div>
                                </div>
                            </label>

                            <label class="flex items-start p-4 border border-green-200 rounded-lg hover:bg-green-50 cursor-pointer">
                                <input type="radio" name="prioritas" value="cepat" class="mt-1 mr-4 text-green-600" {{ old('prioritas') == 'cepat' ? 'checked' : '' }} required>
                                <div class="flex-1">
                                    <div class="font-semibold text-green-800">Cepat (Express)</div>
                                    <div class="text-sm text-green-600">Estimasi: 3-5 hari kerja</div>
                                    <div class="text-sm text-orange-600 font-medium">Biaya tambahan 50%</div>
                                </div>
                            </label>

                            <label class="flex items-start p-4 border border-green-200 rounded-lg hover:bg-green-50 cursor-pointer">
                                <input type="radio" name="prioritas" value="kilat" class="mt-1 mr-4 text-green-600" {{ old('prioritas') == 'kilat' ? 'checked' : '' }} required>
                                <div class="flex-1">
                                    <div class="font-semibold text-green-800">Kilat (Same Day)</div>
                                    <div class="text-sm text-green-600">Estimasi: 1-2 hari kerja</div>
                                    <div class="text-sm text-red-600 font-medium">Biaya tambahan 100%</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Estimasi Harga -->
                    <div class="mb-8 p-6 bg-green-50 rounded-lg border border-green-200">
                        <h3 class="text-xl font-bold text-green-800 mb-4">Estimasi Total Harga</h3>
                        <div id="price-breakdown" class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-green-700">Harga dasar layanan:</span>
                                <span id="service-price" class="text-green-800 font-medium">Rp {{ number_format($layanan->harga_mulai ?? 0, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-green-700">Harga ukuran:</span>
                                <span id="size-price" class="text-green-800 font-medium">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-green-700">Subtotal (x<span id="quantity-display">1</span>):</span>
                                <span id="base-price" class="text-green-800 font-medium">Rp 0</span>
                            </div>
                            <div class="flex justify-between" id="priority-fee" style="display: none;">
                                <span class="text-green-700">Biaya prioritas:</span>
                                <span id="priority-price" class="text-green-800 font-medium">Rp 0</span>
                            </div>
                            <div class="flex justify-between" id="fabric-fee" style="display: none;">
                                <span class="text-green-700">Biaya kain:</span>
                                <span id="fabric-price" class="text-green-800 font-medium">Rp 0</span>
                            </div>
                            <hr class="my-2 border-green-200">
                            <div class="flex justify-between font-bold text-lg">
                                <span class="text-green-800">Total:</span>
                                <span id="total-price" class="text-green-600">Rp 0</span>
                            </div>
                        </div>
                        @if($availableSizes->count() == 0)
                            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded">
                                <p class="text-yellow-800 text-sm">Silakan pilih ukuran terlebih dahulu untuk melihat estimasi harga.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="flex-1 bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                            Buat Pesanan
                        </button>
                        <a href="{{ route('services') }}" class="flex-1 border-2 border-green-300 text-green-700 py-3 px-6 rounded-lg font-semibold hover:bg-green-50 transition-colors text-center">
                            Kembali ke Layanan
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
// JavaScript untuk perhitungan harga dinamis
document.addEventListener('DOMContentLoaded', function() {
    const jumlahInput = document.getElementById('jumlah');
    const prioritasInputs = document.querySelectorAll('input[name="prioritas"]');
    const kainInputs = document.querySelectorAll('input[name="kain_option"]');
    const ukuranInputs = document.querySelectorAll('input[name="layanan_ukuran_id"]');
    
    function formatRupiah(amount) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
    }
    
    function getSelectedSizePrice() {
        const selectedSize = document.querySelector('input[name="layanan_ukuran_id"]:checked');
        if (selectedSize) {
            // Get price from the selected size element
            const priceText = selectedSize.closest('label').querySelector('.font-medium').textContent;
            const price = parseInt(priceText.replace(/[^0-9]/g, ''));
            return price || 0;
        }
        return 0;
    }
    
    function getServicePrice() {
        // Get service base price from the displayed value
        const servicePriceText = document.getElementById('service-price').textContent;
        const price = parseInt(servicePriceText.replace(/[^0-9]/g, ''));
        return price || 0;
    }
    
    function updatePrice() {
        const jumlah = parseInt(jumlahInput.value) || 1;
        const servicePrice = getServicePrice();
        const sizePrice = getSelectedSizePrice();
        const unitPrice = servicePrice + sizePrice; // Harga per unit (layanan + ukuran)
        let baseCost = unitPrice * jumlah; // Total harga dasar
        let priorityFee = 0;
        let fabricFee = 0;
        
        // Update quantity display
        document.getElementById('quantity-display').textContent = jumlah;
        
        // Update size price display
        document.getElementById('size-price').textContent = formatRupiah(sizePrice);
        
        // Hitung biaya prioritas
        const selectedPrioritas = document.querySelector('input[name="prioritas"]:checked');
        if (selectedPrioritas) {
            if (selectedPrioritas.value === 'cepat') {
                priorityFee = baseCost * 0.5;
                document.getElementById('priority-fee').style.display = 'flex';
                document.getElementById('priority-price').textContent = formatRupiah(priorityFee);
            } else if (selectedPrioritas.value === 'kilat') {
                priorityFee = baseCost * 1.0;
                document.getElementById('priority-fee').style.display = 'flex';
                document.getElementById('priority-price').textContent = formatRupiah(priorityFee);
            } else {
                document.getElementById('priority-fee').style.display = 'none';
                document.getElementById('priority-price').textContent = formatRupiah(0);
            }
        } else {
            document.getElementById('priority-fee').style.display = 'none';
            document.getElementById('priority-price').textContent = formatRupiah(0);
        }
        
        // Hitung biaya kain
        const selectedKain = document.querySelector('input[name="kain_option"]:checked');
        if (selectedKain && selectedKain.value === 'disediakan') {
            fabricFee = 50000 * jumlah;
            document.getElementById('fabric-fee').style.display = 'flex';
            document.getElementById('fabric-price').textContent = formatRupiah(fabricFee);
        } else {
            document.getElementById('fabric-fee').style.display = 'none';
            document.getElementById('fabric-price').textContent = formatRupiah(0);
        }
        
        const total = baseCost + priorityFee + fabricFee;
        
        // Update tampilan
        document.getElementById('base-price').textContent = formatRupiah(baseCost);
        document.getElementById('total-price').textContent = formatRupiah(total);
    }
    
    // Event listeners
    jumlahInput.addEventListener('input', updatePrice);
    prioritasInputs.forEach(input => input.addEventListener('change', updatePrice));
    kainInputs.forEach(input => input.addEventListener('change', updatePrice));
    ukuranInputs.forEach(input => input.addEventListener('change', updatePrice));
    
    // Select first available size if exists
    const firstSize = document.querySelector('input[name="layanan_ukuran_id"]');
    if (firstSize) {
        firstSize.checked = true;
    }
    
    // Initial calculation
    updatePrice();
});
</script>
@endsection
