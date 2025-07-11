@extends('admin.layouts.main')

@section('container')
    <div class="mt-20 pb-10">
        <!-- Header -->
        <div class="mb-8 px-4">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,2A2,2 0 0,1 14,4V8A2,2 0 0,1 12,10A2,2 0 0,1 10,8V4A2,2 0 0,1 12,2M21,9V7L15,1H5A2,2 0 0,0 3,3V21A2,2 0 0,0 5,23H19A2,2 0 0,0 21,21V9Z"/>
                        </svg>
                        <h1 class="text-3xl font-bold text-gray-800 mb-0">Edit Layanan</h1>
                    </div>
                    <p class="text-gray-600 pl-11">Edit data layanan: {{ $layanan->nama_layanan }}</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.layanan.show', $layanan) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5S21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12S9.24 7 12 7S17 9.24 17 12S14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12S10.34 15 12 15S15 13.66 15 12S13.66 9 12 9Z"/>
                        </svg>
                        Lihat Detail
                    </a>
                    <a href="{{ route('admin.layanan.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="px-4">
            <div class="bg-white rounded-xl shadow-md p-8">
                <form action="{{ route('admin.layanan.update', $layanan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Layanan -->
                        <div class="md:col-span-2">
                            <label for="nama_layanan" class="block text-sm font-medium text-gray-700 mb-2">Nama Layanan *</label>
                            <input type="text" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('nama_layanan') border-red-500 @enderror" 
                                   placeholder="Masukkan nama layanan" required>
                            @error('nama_layanan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jenis Layanan -->
                        <div>
                            <label for="jenis_layanan" class="block text-sm font-medium text-gray-700 mb-2">Jenis Layanan *</label>
                            <select id="jenis_layanan" name="jenis_layanan" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('jenis_layanan') border-red-500 @enderror" required>
                                <option value="">Pilih Jenis Layanan</option>
                                <option value="baju_pria" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_pria' ? 'selected' : '' }}>Baju Pria</option>
                                <option value="baju_wanita" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_wanita' ? 'selected' : '' }}>Baju Wanita</option>
                                <option value="baju_anak" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_anak' ? 'selected' : '' }}>Baju Anak</option>
                                <option value="celana" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'celana' ? 'selected' : '' }}>Celana</option>
                                <option value="rok" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'rok' ? 'selected' : '' }}>Rok</option>
                                <option value="dress" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'dress' ? 'selected' : '' }}>Dress</option>
                                <option value="kebaya" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'kebaya' ? 'selected' : '' }}>Kebaya</option>
                                <option value="seragam" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'seragam' ? 'selected' : '' }}>Seragam</option>
                                <option value="lainnya" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('jenis_layanan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select id="status" name="status" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('status') border-red-500 @enderror" required>
                                <option value="aktif" {{ old('status', $layanan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $layanan->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Mulai -->
                        <div>
                            <label for="harga_mulai" class="block text-sm font-medium text-gray-700 mb-2">Harga Mulai (Rp) *</label>
                            <input type="number" id="harga_mulai" name="harga_mulai" value="{{ old('harga_mulai', $layanan->harga_mulai) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('harga_mulai') border-red-500 @enderror" 
                                   placeholder="0" min="0" step="1000" required>
                            @error('harga_mulai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Sampai -->
                        <div>
                            <label for="harga_sampai" class="block text-sm font-medium text-gray-700 mb-2">Harga Sampai (Rp)</label>
                            <input type="number" id="harga_sampai" name="harga_sampai" value="{{ old('harga_sampai', $layanan->harga_sampai) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('harga_sampai') border-red-500 @enderror" 
                                   placeholder="0" min="0" step="1000">
                            @error('harga_sampai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Kosongkan jika harga tetap</p>
                        </div>

                        <!-- Estimasi Hari -->
                        <div>
                            <label for="estimasi_hari" class="block text-sm font-medium text-gray-700 mb-2">Estimasi Pengerjaan (Hari) *</label>
                            <input type="number" id="estimasi_hari" name="estimasi_hari" value="{{ old('estimasi_hari', $layanan->estimasi_hari) }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('estimasi_hari') border-red-500 @enderror" 
                                   placeholder="1" min="1" required>
                            @error('estimasi_hari')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Layanan *</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror" 
                                      placeholder="Masukkan deskripsi layanan" required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="md:col-span-2">
                            <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan Tambahan</label>
                            <textarea id="catatan" name="catatan" rows="3" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('catatan') border-red-500 @enderror" 
                                      placeholder="Catatan tambahan (opsional)">{{ old('catatan', $layanan->catatan) }}</textarea>
                            @error('catatan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.layanan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                            Batal
                        </a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z"/>
                            </svg>
                            Update Layanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Validasi harga sampai harus lebih besar dari harga mulai
        document.getElementById('harga_sampai').addEventListener('input', function() {
            const hargaMulai = parseInt(document.getElementById('harga_mulai').value) || 0;
            const hargaSampai = parseInt(this.value) || 0;
            
            if (hargaSampai > 0 && hargaSampai <= hargaMulai) {
                this.setCustomValidity('Harga sampai harus lebih besar dari harga mulai');
            } else {
                this.setCustomValidity('');
            }
        });
        
        document.getElementById('harga_mulai').addEventListener('input', function() {
            const hargaSampai = document.getElementById('harga_sampai');
            hargaSampai.dispatchEvent(new Event('input'));
        });
    </script>
    @endpush
@endsection