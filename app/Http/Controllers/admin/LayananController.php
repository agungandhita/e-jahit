<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Layanan::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_layanan', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhere('catatan', 'like', "%{$search}%");
            });
        }

        // Filter by jenis layanan
        if ($request->filled('jenis_layanan')) {
            $query->where('jenis_layanan', $request->jenis_layanan);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Get layanan with pagination
        $layanan = $query->orderBy('created_at', 'desc')->paginate(10);

        // Jenis layanan options for filter
        $jenisLayananOptions = [
            'baju_pengantin' => 'Baju Pengantin',
            'seragam_sekolah' => 'Seragam Sekolah',
            'baju_kerja' => 'Baju Kerja',
            'kebaya' => 'Kebaya',
            'gamis' => 'Gamis',
            'jas' => 'Jas',
            'baju_anak' => 'Baju Anak',
            'baju_pria' => 'Baju Pria',
            'baju_wanita' => 'Baju Wanita',
            'celana' => 'Celana',
            'rok' => 'Rok',
            'dress' => 'Dress',
            'seragam' => 'Seragam',
            'lainnya' => 'Lainnya'
        ];

        return view('admin.layanan.index', compact('layanan', 'jenisLayananOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisPakaianOptions = \App\Models\Ukuran::getJenisPakaianOptions();
        $kategoriUkuranOptions = \App\Models\Ukuran::getKategoriUkuranOptions();

        return view('admin.layanan.create', compact('jenisPakaianOptions', 'kategoriUkuranOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'jenis_layanan' => 'required|in:baju_pengantin,seragam_sekolah,baju_kerja,kebaya,gamis,jas,baju_anak,baju_pria,baju_wanita,celana,rok,dress,seragam,lainnya',
            'deskripsi' => 'required|string',
            'harga_mulai' => 'required|numeric|min:0',
            'estimasi_hari' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
            // Validasi untuk ukuran
            'ukuran' => 'nullable|array',
            'ukuran.*.nama_ukuran' => 'required_with:ukuran|string|max:255',
            'ukuran.*.kategori_ukuran' => 'required_with:ukuran|in:dewasa,anak,bayi',
            'ukuran.*.harga_ukuran' => 'nullable|numeric|min:0',
            'ukuran.*.deskripsi_ukuran' => 'nullable|string',
            'ukuran.*.detail_ukuran_key' => 'nullable|array',
            'ukuran.*.detail_ukuran_value' => 'nullable|array'
        ], [
            'nama_layanan.required' => 'Nama layanan wajib diisi.',
            'jenis_layanan.required' => 'Jenis layanan wajib dipilih.',
            'deskripsi.required' => 'Deskripsi layanan wajib diisi.',
            'harga_mulai.required' => 'Harga mulai wajib diisi.',
            'harga_mulai.numeric' => 'Harga mulai harus berupa angka.',
            'estimasi_hari.required' => 'Estimasi pengerjaan wajib diisi.',
            'estimasi_hari.min' => 'Estimasi pengerjaan minimal 1 hari.',
            'status.required' => 'Status wajib dipilih.',
            'ukuran.*.nama_ukuran.required_with' => 'Nama ukuran wajib diisi.',
            'ukuran.*.kategori_ukuran.required_with' => 'Kategori ukuran wajib dipilih.',
            'ukuran.*.harga_ukuran.numeric' => 'Harga ukuran harus berupa angka.'
        ]);

        try {
            DB::beginTransaction();

            // Simpan layanan
            $layanan = Layanan::create([
                'nama_layanan' => $validated['nama_layanan'],
                'jenis_layanan' => $validated['jenis_layanan'],
                'deskripsi' => $validated['deskripsi'],
                'harga_mulai' => $validated['harga_mulai'],
                'estimasi_hari' => $validated['estimasi_hari'],
                'catatan' => $validated['catatan'] ?? null,
                'status' => $validated['status']
            ]);

            // Simpan ukuran jika ada
            if (!empty($validated['ukuran'])) {
                foreach ($validated['ukuran'] as $ukuranData) {
                    if (!empty($ukuranData['nama_ukuran'])) {
                        // Proses detail ukuran
                        $detailUkuran = [];
                        if (!empty($ukuranData['detail_ukuran_key']) && !empty($ukuranData['detail_ukuran_value'])) {
                            $keys = $ukuranData['detail_ukuran_key'];
                            $values = $ukuranData['detail_ukuran_value'];

                            for ($i = 0; $i < count($keys); $i++) {
                                if (!empty($keys[$i]) && !empty($values[$i])) {
                                    $detailUkuran[$keys[$i]] = $values[$i];
                                }
                            }
                        }

                        // Simpan ukuran
                        $ukuran = \App\Models\Ukuran::create([
                            'nama_ukuran' => $ukuranData['nama_ukuran'],
                            'kategori_ukuran' => $ukuranData['kategori_ukuran'],
                            'jenis_pakaian' => $validated['jenis_layanan'], // Set jenis pakaian sama dengan jenis layanan
                            'deskripsi_ukuran' => $ukuranData['deskripsi_ukuran'] ?? null,
                            'detail_ukuran' => !empty($detailUkuran) ? json_encode($detailUkuran) : null,
                            'harga_ukuran' => $ukuranData['harga_ukuran'] ?? 0,
                            'status' => 'aktif'
                        ]);

                        // Buat relasi di layanan_ukuran
                        \App\Models\LayananUkuran::create([
                            'layanan_id' => $layanan->layanan_id,
                            'ukuran_id' => $ukuran->ukuran_id,
                            'harga' => $ukuranData['harga_ukuran'] ?? 0,
                            'status' => 'aktif'
                        ]);
                    }
                }
            }

            DB::commit();
            Alert::success('Berhasil!', 'Layanan dan ukuran berhasil ditambahkan!');
            return redirect()->route('admin.layanan.index');

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Gagal!', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        // Get sizes for this layanan with proper error handling
        try {
            $sizes = $layanan->layananUkuran()
                ->with(['ukuran' => function($query) {
                    $query->where('status', 'aktif');
                }])
                ->where('status', 'aktif')
                ->get();

            // Filter out any null ukuran relationships
            $sizes = $sizes->filter(function($layananUkuran) {
                return $layananUkuran->ukuran !== null;
            });

        } catch (\Exception $e) {
            // If there's an error, set empty collection
            $sizes = collect();
            \Illuminate\Support\Facades\Log::error('Error loading sizes for layanan ' . $layanan->layanan_id . ': ' . $e->getMessage());
        }

        return view('admin.layanan.show', compact('layanan', 'sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        // Get options for dropdowns
        $jenisPakaianOptions = Ukuran::getJenisPakaianOptions();
        $kategoriUkuranOptions = Ukuran::getKategoriUkuranOptions();

        // Get existing sizes for this layanan
        $existingSizes = $layanan->layananUkuran()->with('ukuran')->get();

        return view('admin.layanan.edit', compact('layanan', 'jenisPakaianOptions', 'kategoriUkuranOptions', 'existingSizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'jenis_layanan' => 'required|in:baju_pengantin,seragam_sekolah,baju_kerja,kebaya,gamis,jas,baju_anak,baju_pria,baju_wanita,celana,rok,dress,seragam,lainnya',
            'deskripsi' => 'required|string',
            'harga_mulai' => 'required|numeric|min:0',
            'estimasi_hari' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
            // Validasi untuk ukuran
            'ukuran' => 'nullable|array',
            'ukuran.*.nama_ukuran' => 'required_with:ukuran|string|max:255',
            'ukuran.*.kategori_ukuran' => 'required_with:ukuran|in:dewasa,anak,bayi',
            'ukuran.*.harga_ukuran' => 'nullable|numeric|min:0',
            'ukuran.*.deskripsi_ukuran' => 'nullable|string',
            'ukuran.*.detail_ukuran_key' => 'nullable|array',
            'ukuran.*.detail_ukuran_value' => 'nullable|array',
            'ukuran.*.ukuran_id' => 'nullable|exists:ukuran,ukuran_id',
            'ukuran.*.layanan_ukuran_id' => 'nullable|exists:layanan_ukuran,layanan_ukuran_id'
        ], [
            'nama_layanan.required' => 'Nama layanan wajib diisi.',
            'jenis_layanan.required' => 'Jenis layanan wajib dipilih.',
            'deskripsi.required' => 'Deskripsi layanan wajib diisi.',
            'harga_mulai.required' => 'Harga mulai wajib diisi.',
            'harga_mulai.numeric' => 'Harga mulai harus berupa angka.',
            'estimasi_hari.required' => 'Estimasi pengerjaan wajib diisi.',
            'estimasi_hari.min' => 'Estimasi pengerjaan minimal 1 hari.',
            'status.required' => 'Status wajib dipilih.',
            'ukuran.*.nama_ukuran.required_with' => 'Nama ukuran wajib diisi.',
            'ukuran.*.kategori_ukuran.required_with' => 'Kategori ukuran wajib dipilih.',
            'ukuran.*.harga_ukuran.numeric' => 'Harga ukuran harus berupa angka.'
        ]);

        try {
            DB::beginTransaction();

            // Update layanan
            $layanan->update($validated);

            // Handle ukuran updates
            if (isset($validated['ukuran'])) {
                // Get existing ukuran IDs that should be kept
                $keepUkuranIds = [];
                $keepLayananUkuranIds = [];

                foreach ($validated['ukuran'] as $ukuranData) {
                    if (!empty($ukuranData['nama_ukuran'])) {
                        // Proses detail ukuran
                        $detailUkuran = [];
                        if (!empty($ukuranData['detail_ukuran_key']) && !empty($ukuranData['detail_ukuran_value'])) {
                            $keys = $ukuranData['detail_ukuran_key'];
                            $values = $ukuranData['detail_ukuran_value'];

                            for ($i = 0; $i < count($keys); $i++) {
                                if (!empty($keys[$i]) && !empty($values[$i])) {
                                    $detailUkuran[$keys[$i]] = $values[$i];
                                }
                            }
                        }

                        if (!empty($ukuranData['ukuran_id'])) {
                            // Update existing ukuran
                            $ukuran = \App\Models\Ukuran::find($ukuranData['ukuran_id']);
                            if ($ukuran) {
                                $ukuran->update([
                                    'nama_ukuran' => $ukuranData['nama_ukuran'],
                                    'kategori_ukuran' => $ukuranData['kategori_ukuran'],
                                    'jenis_pakaian' => $validated['jenis_layanan'],
                                    'deskripsi_ukuran' => $ukuranData['deskripsi_ukuran'] ?? null,
                                    'detail_ukuran' => !empty($detailUkuran) ? json_encode($detailUkuran) : null,
                                    'harga_ukuran' => $ukuranData['harga_ukuran'] ?? 0
                                ]);
                                $keepUkuranIds[] = $ukuran->ukuran_id;

                                // Update layanan_ukuran
                                if (!empty($ukuranData['layanan_ukuran_id'])) {
                                    $layananUkuran = \App\Models\LayananUkuran::find($ukuranData['layanan_ukuran_id']);
                                    if ($layananUkuran) {
                                        $layananUkuran->update([
                                            'harga' => $ukuranData['harga_ukuran'] ?? 0
                                        ]);
                                        $keepLayananUkuranIds[] = $layananUkuran->layanan_ukuran_id;
                                    }
                                }
                            }
                        } else {
                            // Create new ukuran
                            $ukuran = \App\Models\Ukuran::create([
                                'nama_ukuran' => $ukuranData['nama_ukuran'],
                                'kategori_ukuran' => $ukuranData['kategori_ukuran'],
                                'jenis_pakaian' => $validated['jenis_layanan'],
                                'deskripsi_ukuran' => $ukuranData['deskripsi_ukuran'] ?? null,
                                'detail_ukuran' => !empty($detailUkuran) ? json_encode($detailUkuran) : null,
                                'harga_ukuran' => $ukuranData['harga_ukuran'] ?? 0,
                                'status' => 'aktif'
                            ]);
                            $keepUkuranIds[] = $ukuran->ukuran_id;

                            // Create layanan_ukuran
                            $layananUkuran = \App\Models\LayananUkuran::create([
                                'layanan_id' => $layanan->layanan_id,
                                'ukuran_id' => $ukuran->ukuran_id,
                                'harga' => $ukuranData['harga_ukuran'] ?? 0,
                                'status' => 'aktif'
                            ]);
                            $keepLayananUkuranIds[] = $layananUkuran->layanan_ukuran_id;
                        }
                    }
                }

                // Remove layanan_ukuran that are not in the keep list
                \App\Models\LayananUkuran::where('layanan_id', $layanan->layanan_id)
                    ->whereNotIn('layanan_ukuran_id', $keepLayananUkuranIds)
                    ->delete();

                // Remove ukuran that are not used by any layanan_ukuran
                $unusedUkuranIds = \App\Models\Ukuran::whereNotIn('ukuran_id', $keepUkuranIds)
                    ->whereDoesntHave('layananUkuran')
                    ->where('jenis_pakaian', $validated['jenis_layanan'])
                    ->pluck('ukuran_id');
                
                if ($unusedUkuranIds->isNotEmpty()) {
                    \App\Models\Ukuran::whereIn('ukuran_id', $unusedUkuranIds)->delete();
                }
            }

            DB::commit();
            Alert::success('Berhasil!', 'Layanan dan ukuran berhasil diperbarui!');
            return redirect()->route('admin.layanan.index');

        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Gagal!', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        Alert::success('Berhasil!', 'Layanan berhasil dihapus!');
        return redirect()->route('admin.layanan.index');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Layanan $layanan)
    {
        $layanan->update([
            'status' => $layanan->status === 'aktif' ? 'nonaktif' : 'aktif'
        ]);

        $status = $layanan->status === 'aktif' ? 'diaktifkan' : 'dinonaktifkan';

        Alert::success('Berhasil!', "Layanan berhasil {$status}!");
        return redirect()->back();
    }
}
