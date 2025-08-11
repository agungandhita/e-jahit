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
                                <option value="baju_pengantin" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_pengantin' ? 'selected' : '' }}>Baju Pengantin</option>
                                <option value="seragam_sekolah" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'seragam_sekolah' ? 'selected' : '' }}>Seragam Sekolah</option>
                                <option value="baju_kerja" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_kerja' ? 'selected' : '' }}>Baju Kerja</option>
                                <option value="kebaya" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'kebaya' ? 'selected' : '' }}>Kebaya</option>
                                <option value="gamis" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'gamis' ? 'selected' : '' }}>Gamis</option>
                                <option value="jas" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'jas' ? 'selected' : '' }}>Jas</option>
                                <option value="baju_anak" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_anak' ? 'selected' : '' }}>Baju Anak</option>
                                <option value="baju_pria" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_pria' ? 'selected' : '' }}>Baju Pria</option>
                                <option value="baju_wanita" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'baju_wanita' ? 'selected' : '' }}>Baju Wanita</option>
                                <option value="celana" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'celana' ? 'selected' : '' }}>Celana</option>
                                <option value="rok" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'rok' ? 'selected' : '' }}>Rok</option>
                                <option value="dress" {{ old('jenis_layanan', $layanan->jenis_layanan) == 'dress' ? 'selected' : '' }}>Dress</option>
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

                    <!-- Ukuran Section -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12,2A2,2 0 0,1 14,4V8A2,2 0 0,1 12,10A2,2 0 0,1 10,8V4A2,2 0 0,1 12,2M21,9V7L15,1H5A2,2 0 0,0 3,3V21A2,2 0 0,0 5,23H19A2,2 0 0,0 21,21V9Z"/>
                                    </svg>
                                    Ukuran Layanan
                                </h3>
                                <p class="text-gray-600 text-sm mt-1">Kelola ukuran yang tersedia untuk layanan ini</p>
                            </div>
                            <button type="button" id="addSizeBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                                </svg>
                                Tambah Ukuran
                            </button>
                        </div>

                        <div id="sizesContainer">
                            @if($existingSizes && $existingSizes->count() > 0)
                                @foreach($existingSizes as $index => $layananUkuran)
                                    @php $ukuran = $layananUkuran->ukuran; @endphp
                                    <div class="size-item bg-gray-50 rounded-lg p-6 mb-4 border border-gray-200">
                                        <div class="flex items-center justify-between mb-4">
                                            <h4 class="text-md font-semibold text-gray-700">Ukuran {{ $index + 1 }}</h4>
                                            <button type="button" class="remove-size-btn text-red-600 hover:text-red-800 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Hidden fields for existing ukuran -->
                                        <input type="hidden" name="ukuran[{{ $index }}][ukuran_id]" value="{{ $ukuran->ukuran_id }}">
                                        <input type="hidden" name="ukuran[{{ $index }}][layanan_ukuran_id]" value="{{ $layananUkuran->layanan_ukuran_id }}">

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <!-- Nama Ukuran -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ukuran *</label>
                                                <input type="text" name="ukuran[{{ $index }}][nama_ukuran]" value="{{ $ukuran->nama_ukuran }}"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                                       placeholder="Contoh: S, M, L, XL, 48, 2-3 Tahun" required>
                                            </div>

                                            <!-- Kategori Ukuran -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Ukuran *</label>
                                                <select name="ukuran[{{ $index }}][kategori_ukuran]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach($kategoriUkuranOptions as $key => $label)
                                                        <option value="{{ $key }}" {{ $ukuran->kategori_ukuran == $key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Harga Tambahan -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Harga Tambahan (Rp)</label>
                                                <input type="number" name="ukuran[{{ $index }}][harga_ukuran]" value="{{ $layananUkuran->harga }}"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                                       placeholder="0" min="0" step="1000">
                                                <p class="text-xs text-gray-500 mt-1">Harga tambahan untuk ukuran ini (0 jika tidak ada tambahan)</p>
                                            </div>

                                            <!-- Deskripsi Ukuran -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Ukuran</label>
                                                <textarea name="ukuran[{{ $index }}][deskripsi_ukuran]" rows="2"
                                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                                          placeholder="Deskripsi detail ukuran...">{{ $ukuran->deskripsi_ukuran }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Detail Ukuran (Opsional) -->
                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Detail Ukuran (Opsional)</label>
                                            <div class="detail-ukuran-container">
                                                @if($ukuran->detail_ukuran)
                                                    @php $details = json_decode($ukuran->detail_ukuran, true) ?? []; @endphp
                                                    @foreach($details as $key => $value)
                                                        <div class="detail-ukuran-item flex gap-2 mb-2">
                                                            <select name="ukuran[{{ $index }}][detail_ukuran_key][]" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                                                <option value="">Pilih Detail</option>
                                                                <option value="lingkar_dada" {{ $key == 'lingkar_dada' ? 'selected' : '' }}>Lingkar Dada</option>
                                                                <option value="lingkar_pinggang" {{ $key == 'lingkar_pinggang' ? 'selected' : '' }}>Lingkar Pinggang</option>
                                                                <option value="lingkar_pinggul" {{ $key == 'lingkar_pinggul' ? 'selected' : '' }}>Lingkar Pinggul</option>
                                                                <option value="panjang_baju" {{ $key == 'panjang_baju' ? 'selected' : '' }}>Panjang Baju</option>
                                                                <option value="panjang_lengan" {{ $key == 'panjang_lengan' ? 'selected' : '' }}>Panjang Lengan</option>
                                                                <option value="lebar_bahu" {{ $key == 'lebar_bahu' ? 'selected' : '' }}>Lebar Bahu</option>
                                                                <option value="panjang_celana" {{ $key == 'panjang_celana' ? 'selected' : '' }}>Panjang Celana</option>
                                                                <option value="lingkar_paha" {{ $key == 'lingkar_paha' ? 'selected' : '' }}>Lingkar Paha</option>
                                                            </select>
                                                            <input type="text" name="ukuran[{{ $index }}][detail_ukuran_value][]" value="{{ $value }}"
                                                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                                                   placeholder="Contoh: 88-92 cm">
                                                            <button type="button" class="remove-detail-btn text-red-600 hover:text-red-800 px-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                                    <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <button type="button" class="add-detail-btn text-green-600 hover:text-green-800 text-sm font-medium mt-2 flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                                                </svg>
                                                Tambah Detail
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let sizeIndex = {{ $existingSizes ? $existingSizes->count() : 0 }};
            const sizesContainer = document.getElementById('sizesContainer');
            const addSizeBtn = document.getElementById('addSizeBtn');
            const jenisLayananSelect = document.getElementById('jenis_layanan');

            // Jenis pakaian options mapping
            const jenisPakaianOptions = @json($jenisPakaianOptions);
            const kategoriUkuranOptions = @json($kategoriUkuranOptions);

            // Add new size
            addSizeBtn.addEventListener('click', function() {
                const sizeItem = createSizeItem(sizeIndex);
                sizesContainer.appendChild(sizeItem);
                sizeIndex++;
            });

            // Update jenis pakaian when jenis layanan changes
            jenisLayananSelect.addEventListener('change', function() {
                const selectedJenisLayanan = this.value;
                updateJenisPakaianInSizes(selectedJenisLayanan);
            });

            function createSizeItem(index) {
                const div = document.createElement('div');
                div.className = 'size-item bg-gray-50 rounded-lg p-6 mb-4 border border-gray-200';

                let kategoriOptions = '';
                Object.entries(kategoriUkuranOptions).forEach(([key, label]) => {
                    kategoriOptions += `<option value="${key}">${label}</option>`;
                });

                div.innerHTML = `
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-md font-semibold text-gray-700">Ukuran ${index + 1}</h4>
                        <button type="button" class="remove-size-btn text-red-600 hover:text-red-800 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"/>
                            </svg>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama Ukuran -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ukuran *</label>
                            <input type="text" name="ukuran[${index}][nama_ukuran]"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                   placeholder="Contoh: S, M, L, XL, 48, 2-3 Tahun" required>
                        </div>

                        <!-- Kategori Ukuran -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Ukuran *</label>
                            <select name="ukuran[${index}][kategori_ukuran]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                                <option value="">Pilih Kategori</option>
                                ${kategoriOptions}
                            </select>
                        </div>

                        <!-- Harga Tambahan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Tambahan (Rp)</label>
                            <input type="number" name="ukuran[${index}][harga_ukuran]"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                   placeholder="0" min="0" step="1000">
                            <p class="text-xs text-gray-500 mt-1">Harga tambahan untuk ukuran ini (0 jika tidak ada tambahan)</p>
                        </div>

                        <!-- Deskripsi Ukuran -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Ukuran</label>
                            <textarea name="ukuran[${index}][deskripsi_ukuran]" rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                      placeholder="Deskripsi detail ukuran..."></textarea>
                        </div>
                    </div>

                    <!-- Detail Ukuran (Opsional) -->
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Detail Ukuran (Opsional)</label>
                        <div class="detail-ukuran-container">
                            <!-- Detail items will be added here -->
                        </div>
                        <button type="button" class="add-detail-btn text-green-600 hover:text-green-800 text-sm font-medium mt-2 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                            </svg>
                            Tambah Detail
                        </button>
                    </div>
                `;

                // Add event listeners
                const removeBtn = div.querySelector('.remove-size-btn');
                removeBtn.addEventListener('click', function() {
                    div.remove();
                    updateSizeNumbers();
                });

                const addDetailBtn = div.querySelector('.add-detail-btn');
                addDetailBtn.addEventListener('click', function() {
                    const detailContainer = div.querySelector('.detail-ukuran-container');
                    const detailItem = createDetailItem(index);
                    detailContainer.appendChild(detailItem);
                });

                return div;
            }

            function createDetailItem(sizeIndex) {
                const div = document.createElement('div');
                div.className = 'detail-ukuran-item flex gap-2 mb-2';

                div.innerHTML = `
                    <select name="ukuran[${sizeIndex}][detail_ukuran_key][]" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">Pilih Detail</option>
                        <option value="lingkar_dada">Lingkar Dada</option>
                        <option value="lingkar_pinggang">Lingkar Pinggang</option>
                        <option value="lingkar_pinggul">Lingkar Pinggul</option>
                        <option value="panjang_baju">Panjang Baju</option>
                        <option value="panjang_lengan">Panjang Lengan</option>
                        <option value="lebar_bahu">Lebar Bahu</option>
                        <option value="panjang_celana">Panjang Celana</option>
                        <option value="lingkar_paha">Lingkar Paha</option>
                    </select>
                    <input type="text" name="ukuran[${sizeIndex}][detail_ukuran_value][]"
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           placeholder="Contoh: 88-92 cm">
                    <button type="button" class="remove-detail-btn text-red-600 hover:text-red-800 px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
                        </svg>
                    </button>
                `;

                const removeDetailBtn = div.querySelector('.remove-detail-btn');
                removeDetailBtn.addEventListener('click', function() {
                    div.remove();
                });

                return div;
            }

            function updateSizeNumbers() {
                const sizeItems = sizesContainer.querySelectorAll('.size-item');
                sizeItems.forEach((item, index) => {
                    const title = item.querySelector('h4');
                    title.textContent = `Ukuran ${index + 1}`;
                });
            }

            function updateJenisPakaianInSizes(jenisLayanan) {
                // This function can be used to update jenis pakaian in existing sizes if needed
                // For now, we'll keep it simple since jenis_pakaian is set automatically
            }

            // Add event listeners for existing size items
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-size-btn')) {
                    e.target.closest('.size-item').remove();
                    updateSizeNumbers();
                }

                if (e.target.closest('.add-detail-btn')) {
                    const sizeItem = e.target.closest('.size-item');
                    const sizeItemIndex = Array.from(sizesContainer.children).indexOf(sizeItem);
                    const detailContainer = sizeItem.querySelector('.detail-ukuran-container');
                    const detailItem = createDetailItem(sizeItemIndex);
                    detailContainer.appendChild(detailItem);
                }

                if (e.target.closest('.remove-detail-btn')) {
                    e.target.closest('.detail-ukuran-item').remove();
                }
            });
        });
    </script>

@endsection
