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
                    <input type="hidden" name="layanan_id" value="{{ $layanan->layanan_id ?? '' }}">

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

                        <!-- Ukuran -->
                        <div class="mb-6">
                            <label for="ukuran" class="block text-sm font-medium text-green-700 mb-2">Ukuran Detail *</label>
                            <textarea id="ukuran" name="ukuran" rows="4" required
                                      placeholder="Contoh: Lingkar dada: 90cm, Lingkar pinggang: 70cm, Panjang: 100cm, dll."
                                      class="w-full px-4 py-3 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('ukuran') }}</textarea>
                            <p class="text-sm text-green-500 mt-1">Tuliskan ukuran detail sesuai jenis pakaian yang akan dijahit</p>
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
                                <span class="text-green-700">Harga dasar:</span>
                                <span id="base-price" class="text-green-800 font-medium">{{ $layanan->harga_format ?? 'Rp 0' }}</span>
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
                                <span id="total-price" class="text-green-600">{{ $layanan->harga_format ?? 'Rp 0' }}</span>
                            </div>
                        </div>
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
    const basePrice = {{ $layanan->harga_mulai ?? 0 }};
    const jumlahInput = document.getElementById('jumlah');
    const prioritasInputs = document.querySelectorAll('input[name="prioritas"]');
    const kainInputs = document.querySelectorAll('input[name="kain_option"]');
    
    function formatRupiah(amount) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
    }
    
    function updatePrice() {
        const jumlah = parseInt(jumlahInput.value) || 1;
        let baseCost = basePrice * jumlah;
        let priorityFee = 0;
        let fabricFee = 0;
        
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
    
    // Initial calculation
    updatePrice();
});
</script>
@endsection
