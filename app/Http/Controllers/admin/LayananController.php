<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
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
            'baju_pria' => 'Baju Pria',
            'baju_wanita' => 'Baju Wanita',
            'baju_anak' => 'Baju Anak',
            'celana' => 'Celana',
            'rok' => 'Rok',
            'dress' => 'Dress',
            'kebaya' => 'Kebaya',
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
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'jenis_layanan' => 'required|in:baju_pria,baju_wanita,baju_anak,celana,rok,dress,kebaya,seragam,lainnya',
            'deskripsi' => 'required|string',
            'harga_mulai' => 'required|numeric|min:0',
            'harga_sampai' => 'nullable|numeric|min:0|gt:harga_mulai',
            'estimasi_hari' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ], [
            'nama_layanan.required' => 'Nama layanan wajib diisi.',
            'jenis_layanan.required' => 'Jenis layanan wajib dipilih.',
            'deskripsi.required' => 'Deskripsi layanan wajib diisi.',
            'harga_mulai.required' => 'Harga mulai wajib diisi.',
            'harga_mulai.numeric' => 'Harga mulai harus berupa angka.',
            'harga_sampai.gt' => 'Harga sampai harus lebih besar dari harga mulai.',
            'estimasi_hari.required' => 'Estimasi pengerjaan wajib diisi.',
            'estimasi_hari.min' => 'Estimasi pengerjaan minimal 1 hari.',
            'status.required' => 'Status wajib dipilih.'
        ]);

        Layanan::create($validated);

        Alert::success('Berhasil!', 'Layanan berhasil ditambahkan!');
        return redirect()->route('admin.layanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        return view('admin.layanan.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'jenis_layanan' => 'required|in:baju_pria,baju_wanita,baju_anak,celana,rok,dress,kebaya,seragam,lainnya',
            'deskripsi' => 'required|string',
            'harga_mulai' => 'required|numeric|min:0',
            'harga_sampai' => 'nullable|numeric|min:0|gt:harga_mulai',
            'estimasi_hari' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ], [
            'nama_layanan.required' => 'Nama layanan wajib diisi.',
            'jenis_layanan.required' => 'Jenis layanan wajib dipilih.',
            'deskripsi.required' => 'Deskripsi layanan wajib diisi.',
            'harga_mulai.required' => 'Harga mulai wajib diisi.',
            'harga_mulai.numeric' => 'Harga mulai harus berupa angka.',
            'harga_sampai.gt' => 'Harga sampai harus lebih besar dari harga mulai.',
            'estimasi_hari.required' => 'Estimasi pengerjaan wajib diisi.',
            'estimasi_hari.min' => 'Estimasi pengerjaan minimal 1 hari.',
            'status.required' => 'Status wajib dipilih.'
        ]);

        $layanan->update($validated);

        Alert::success('Berhasil!', 'Layanan berhasil diperbarui!');
        return redirect()->route('admin.layanan.index');
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