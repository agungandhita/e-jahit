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
                        <h1 class="text-3xl font-bold text-gray-800 mb-0">Tambah Layanan</h1>
                    </div>
                    <p class="text-gray-600 pl-11">Tambah layanan jahit baru</p>
                </div>
                <a href="{{ route('admin.layanan.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"/>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="px-4">
            <div class="bg-white rounded-xl shadow-md p-8">
                <form action="{{ route('admin.layanan.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Layanan -->
                        <div class="md:col-span-2">
                            <label for="nama_layanan" class="block text-sm font-medium text-gray-700 mb-2">Nama Layanan *</label>
                            <input type="text" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan') }}"
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
                                <option value="baju_pengantin" {{ old('jenis_layanan') == 'baju_pengantin' ? 'selected' : '' }}>Baju Pengantin</option>
                                <option value="seragam_sekolah" {{ old('jenis_layanan') == 'seragam_sekolah' ? 'selected' : '' }}>Seragam Sekolah</option>
                                <option value="baju_kerja" {{ old('jenis_layanan') == 'baju_kerja' ? 'selected' : '' }}>Baju Kerja</option>
                                <option value="kebaya" {{ old('jenis_layanan') == 'kebaya' ? 'selected' : '' }}>Kebaya</option>
                                <option value="gamis" {{ old('jenis_layanan') == 'gamis' ? 'selected' : '' }}>Gamis</option>
                                <option value="jas" {{ old('jenis_layanan') == 'jas' ? 'selected' : '' }}>Jas</option>
                                <option value="baju_anak" {{ old('jenis_layanan') == 'baju_anak' ? 'selected' : '' }}>Baju Anak</option>
                                <option value="baju_pria" {{ old('jenis_layanan') == 'baju_pria' ? 'selected' : '' }}>Baju Pria</option>
                                <option value="baju_wanita" {{ old('jenis_layanan') == 'baju_wanita' ? 'selected' : '' }}>Baju Wanita</option>
                                <option value="celana" {{ old('jenis_layanan') == 'celana' ? 'selected' : '' }}>Celana</option>
                                <option value="rok" {{ old('jenis_layanan') == 'rok' ? 'selected' : '' }}>Rok</option>
                                <option value="dress" {{ old('jenis_layanan') == 'dress' ? 'selected' : '' }}>Dress</option>
                                <option value="seragam" {{ old('jenis_layanan') == 'seragam' ? 'selected' : '' }}>Seragam</option>
                                <option value="lainnya" {{ old('jenis_layanan') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                                <option value="aktif" {{ old('status', 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Mulai -->
                        <div>
                            <label for="harga_mulai" class="block text-sm font-medium text-gray-700 mb-2">Harga Mulai (Rp) *</label>
                            <input type="number" id="harga_mulai" name="harga_mulai" value="{{ old('harga_mulai') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('harga_mulai') border-red-500 @enderror"
                                   placeholder="0" min="0" step="1000" required>
                            @error('harga_mulai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>



                        <!-- Estimasi Hari -->
                        <div>
                            <label for="estimasi_hari" class="block text-sm font-medium text-gray-700 mb-2">Estimasi Pengerjaan (Hari) *</label>
                            <input type="number" id="estimasi_hari" name="estimasi_hari" value="{{ old('estimasi_hari') }}"
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
                                      placeholder="Masukkan deskripsi layanan" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catatan -->
                        <div class="md:col-span-2">
                            <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">Catatan Tambahan</label>
                            <textarea id="catatan" name="catatan" rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('catatan') border-red-500 @enderror"
                                      placeholder="Catatan tambahan (opsional)">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Section Ukuran -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="flex items-center gap-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2A2,2 0 0,1 14,4V8A2,2 0 0,1 12,10A2,2 0 0,1 10,8V4A2,2 0 0,1 12,2M21,9V7L15,1H5A2,2 0 0,0 3,3V21A2,2 0 0,0 5,23H19A2,2 0 0,0 21,21V9Z"/>
                            </svg>
                            <h2 class="text-xl font-semibold text-gray-800">Tambah Ukuran untuk Layanan</h2>
                        </div>
                        <p class="text-gray-600 mb-6">Tambahkan ukuran yang tersedia untuk layanan ini</p>

                        <div id="ukuran-container">
                            <div class="ukuran-item bg-gray-50 p-6 rounded-lg border border-gray-200 mb-4">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                    <!-- Nama Ukuran -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ukuran *</label>
                                        <input type="text" name="ukuran[0][nama_ukuran]"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                               placeholder="S, M, L, XL, dll">
                                    </div>

                                    <!-- Kategori Ukuran -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                                        <select name="ukuran[0][kategori_ukuran]"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                            <option value="">Pilih Kategori</option>
                                            @foreach($kategoriUkuranOptions as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Harga Tambahan -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Harga Tambahan</label>
                                        <div class="relative">
                                            <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                                            <input type="number" name="ukuran[0][harga_ukuran]"
                                                   class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                                   placeholder="0" min="0" step="1000" value="0">
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <div class="flex items-end">
                                        <button type="button" class="remove-ukuran w-full px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200" style="display: none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Deskripsi Ukuran -->
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Ukuran</label>
                                    <textarea name="ukuran[0][deskripsi_ukuran]" rows="2"
                                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                              placeholder="Deskripsi detail ukuran..."></textarea>
                                </div>

                                <!-- Detail Ukuran -->
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Detail Ukuran (Opsional)</label>
                                    <div class="detail-ukuran-container">
                                        <div class="grid grid-cols-12 gap-3 detail-ukuran-row mb-2">
                                            <div class="col-span-4">
                                                <select name="ukuran[0][detail_ukuran_key][]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                                    <option value="">Pilih Detail</option>
                                                    <option value="lingkar_dada">Lingkar Dada</option>
                                                    <option value="lingkar_pinggang">Lingkar Pinggang</option>
                                                    <option value="lingkar_pinggul">Lingkar Pinggul</option>
                                                    <option value="panjang_baju">Panjang Baju</option>
                                                    <option value="panjang_lengan">Panjang Lengan</option>
                                                    <option value="lebar_bahu">Lebar Bahu</option>
                                                    <option value="lingkar_leher">Lingkar Leher</option>
                                                    <option value="panjang_celana">Panjang Celana</option>
                                                    <option value="lingkar_paha">Lingkar Paha</option>
                                                    <option value="tinggi_badan">Tinggi Badan</option>
                                                    <option value="berat_badan">Berat Badan</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6">
                                                <input type="text" name="ukuran[0][detail_ukuran_value][]"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                                       placeholder="Contoh: 88-92 cm">
                                            </div>
                                            <div class="col-span-2">
                                                <button type="button" class="add-detail-ukuran w-full px-3 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="add-ukuran" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                            </svg>
                            Tambah Ukuran Lain
                        </button>
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
                            Simpan Layanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let ukuranIndex = 1;

    // Jenis pakaian options berdasarkan jenis layanan
    const jenisPakaianOptions = @json($jenisPakaianOptions);

    // Handle jenis layanan change untuk update jenis pakaian di ukuran
    const jenisLayananSelect = document.getElementById('jenis_layanan');
    if (jenisLayananSelect) {
        jenisLayananSelect.addEventListener('change', function() {
            updateJenisPakaianOptions(this.value);
        });
    }

    function updateJenisPakaianOptions(selectedJenisLayanan) {
        // Update semua select jenis pakaian yang ada
        const jenisPakaianSelects = document.querySelectorAll('select[name*="[jenis_pakaian]"]');
        jenisPakaianSelects.forEach(select => {
            // Clear existing options
            select.innerHTML = '<option value="">Pilih Jenis Pakaian</option>';

            // Add option yang sesuai dengan jenis layanan
            if (selectedJenisLayanan && jenisPakaianOptions[selectedJenisLayanan]) {
                select.innerHTML += `<option value="${selectedJenisLayanan}">${jenisPakaianOptions[selectedJenisLayanan]}</option>`;
                select.value = selectedJenisLayanan;
            } else {
                // Jika tidak ada jenis layanan dipilih, tampilkan semua opsi
                Object.keys(jenisPakaianOptions).forEach(key => {
                    select.innerHTML += `<option value="${key}">${jenisPakaianOptions[key]}</option>`;
                });
            }
        });
    }

    // Add ukuran functionality
    document.getElementById('add-ukuran').addEventListener('click', function() {
        const container = document.getElementById('ukuran-container');
        const newUkuranItem = createUkuranItem(ukuranIndex);
        container.appendChild(newUkuranItem);

        // Update jenis pakaian untuk item baru
        const selectedJenisLayanan = jenisLayananSelect ? jenisLayananSelect.value : '';
        updateJenisPakaianOptions(selectedJenisLayanan);

        ukuranIndex++;
        updateRemoveButtons();
    });

    function createUkuranItem(index) {
        const div = document.createElement('div');
        div.className = 'ukuran-item bg-gray-50 p-6 rounded-lg border border-gray-200 mb-4';
        div.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Nama Ukuran -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ukuran *</label>
                    <input type="text" name="ukuran[${index}][nama_ukuran]"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           placeholder="S, M, L, XL, dll">
                </div>

                <!-- Kategori Ukuran -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                    <select name="ukuran[${index}][kategori_ukuran]"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoriUkuranOptions as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Harga Tambahan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga Tambahan</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                        <input type="number" name="ukuran[${index}][harga_ukuran]"
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                               placeholder="0" min="0" step="1000" value="0">
                    </div>
                </div>

                <!-- Action Button -->
                <div class="flex items-end">
                    <button type="button" class="remove-ukuran w-full px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Deskripsi Ukuran -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Ukuran</label>
                <textarea name="ukuran[${index}][deskripsi_ukuran]" rows="2"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                          placeholder="Deskripsi detail ukuran..."></textarea>
            </div>

            <!-- Detail Ukuran -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Detail Ukuran (Opsional)</label>
                <div class="detail-ukuran-container">
                    <div class="grid grid-cols-12 gap-3 detail-ukuran-row mb-2">
                        <div class="col-span-4">
                            <select name="ukuran[${index}][detail_ukuran_key][]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                <option value="">Pilih Detail</option>
                                <option value="lingkar_dada">Lingkar Dada</option>
                                <option value="lingkar_pinggang">Lingkar Pinggang</option>
                                <option value="lingkar_pinggul">Lingkar Pinggul</option>
                                <option value="panjang_baju">Panjang Baju</option>
                                <option value="panjang_lengan">Panjang Lengan</option>
                                <option value="lebar_bahu">Lebar Bahu</option>
                                <option value="lingkar_leher">Lingkar Leher</option>
                                <option value="panjang_celana">Panjang Celana</option>
                                <option value="lingkar_paha">Lingkar Paha</option>
                                <option value="tinggi_badan">Tinggi Badan</option>
                                <option value="berat_badan">Berat Badan</option>
                            </select>
                        </div>
                        <div class="col-span-6">
                            <input type="text" name="ukuran[${index}][detail_ukuran_value][]"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                   placeholder="Contoh: 88-92 cm">
                        </div>
                        <div class="col-span-2">
                            <button type="button" class="add-detail-ukuran w-full px-3 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return div;
    }

    // Remove ukuran functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-ukuran')) {
            e.target.closest('.ukuran-item').remove();
            updateRemoveButtons();
        }
    });

    function updateRemoveButtons() {
        const ukuranItems = document.querySelectorAll('.ukuran-item');
        ukuranItems.forEach((item, index) => {
            const removeBtn = item.querySelector('.remove-ukuran');
            if (ukuranItems.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Add detail ukuran functionality
    document.addEventListener('click', function(e) {
        if (e.target.closest('.add-detail-ukuran')) {
            const container = e.target.closest('.detail-ukuran-container');
            const ukuranItem = e.target.closest('.ukuran-item');
            const ukuranIndex = Array.from(ukuranItem.parentNode.children).indexOf(ukuranItem);

            const newDetailRow = document.createElement('div');
            newDetailRow.className = 'grid grid-cols-12 gap-3 detail-ukuran-row mb-2';
            newDetailRow.innerHTML = `
                <div class="col-span-4">
                    <select name="ukuran[${ukuranIndex}][detail_ukuran_key][]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="">Pilih Detail</option>
                        <option value="lingkar_dada">Lingkar Dada</option>
                        <option value="lingkar_pinggang">Lingkar Pinggang</option>
                        <option value="lingkar_pinggul">Lingkar Pinggul</option>
                        <option value="panjang_baju">Panjang Baju</option>
                        <option value="panjang_lengan">Panjang Lengan</option>
                        <option value="lebar_bahu">Lebar Bahu</option>
                        <option value="lingkar_leher">Lingkar Leher</option>
                        <option value="panjang_celana">Panjang Celana</option>
                        <option value="lingkar_paha">Lingkar Paha</option>
                        <option value="tinggi_badan">Tinggi Badan</option>
                        <option value="berat_badan">Berat Badan</option>
                    </select>
                </div>
                <div class="col-span-6">
                    <input type="text" name="ukuran[${ukuranIndex}][detail_ukuran_value][]"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           placeholder="Contoh: 88-92 cm">
                </div>
                <div class="col-span-2">
                    <button type="button" class="remove-detail-ukuran w-full px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"/>
                        </svg>
                    </button>
                </div>
            `;

            container.appendChild(newDetailRow);
        }

        // Remove detail ukuran
        if (e.target.closest('.remove-detail-ukuran')) {
            const detailRow = e.target.closest('.detail-ukuran-row');
            const container = detailRow.parentNode;
            if (container.children.length > 1) {
                detailRow.remove();
            }
        }
    });

    // Initialize remove buttons visibility
    updateRemoveButtons();
});
</script>
@endpush
