<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\ProdukFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Produk::with(['fotoPrimary']);

        // Filter pencarian
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $produk = $query->orderBy('created_at', 'desc')->paginate(10);
        $kategoriOptions = Produk::getKategoriOptions();

        return view('admin.produk.index', compact('produk', 'kategoriOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriOptions = Produk::getKategoriOptions();
        return view('admin.produk.create', compact('kategoriOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:' . implode(',', array_keys(Produk::getKategoriOptions())),
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'jumlah_produksi' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produk = Produk::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produksi' => $request->jumlah_produksi,
            'status' => $request->status
        ]);

        // Upload foto jika ada
        if ($request->hasFile('fotos')) {
            $this->uploadFotos($request->file('fotos'), $produk->produk_id);
        }

        Alert::success('Berhasil', 'Produk berhasil ditambahkan!');
        return redirect()->route('admin.produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $produk->load(['fotos']);
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $produk->load(['fotos']);
        $kategoriOptions = Produk::getKategoriOptions();
        return view('admin.produk.edit', compact('produk', 'kategoriOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:' . implode(',', array_keys(Produk::getKategoriOptions())),
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'jumlah_produksi' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produk->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produksi' => $request->jumlah_produksi,
            'status' => $request->status
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('fotos')) {
            $this->uploadFotos($request->file('fotos'), $produk->produk_id);
        }

        Alert::success('Berhasil', 'Produk berhasil diperbarui!');
        return redirect()->route('admin.produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Hapus semua foto terkait
        foreach ($produk->fotos as $foto) {
            $foto->delete(); // Akan otomatis menghapus file karena ada boot method
        }

        $produk->delete();

        Alert::success('Berhasil', 'Produk berhasil dihapus!');
        return redirect()->route('admin.produk.index');
    }

    /**
     * Toggle status produk
     */
    public function toggleStatus(Produk $produk)
    {
        $produk->update([
            'status' => $produk->status === 'aktif' ? 'nonaktif' : 'aktif'
        ]);

        $status = $produk->status === 'aktif' ? 'diaktifkan' : 'dinonaktifkan';
        Alert::success('Berhasil', "Produk berhasil {$status}!");
        
        return redirect()->back();
    }

    /**
     * Hapus foto produk
     */
    public function deleteFoto(ProdukFoto $foto)
    {
        $foto->delete();
        
        Alert::success('Berhasil', 'Foto berhasil dihapus!');
        return redirect()->back();
    }

    /**
     * Set foto sebagai primary
     */
    public function setPrimaryFoto(ProdukFoto $foto)
    {
        $foto->setPrimary();
        
        Alert::success('Berhasil', 'Foto utama berhasil diubah!');
        return redirect()->back();
    }

    /**
     * Upload multiple fotos
     */
    private function uploadFotos($files, $produkId)
    {
        $isFirstPhoto = ProdukFoto::where('produk_id', $produkId)->count() === 0;
        
        foreach ($files as $index => $file) {
            $fileName = time() . '_' . $index . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('produk', $fileName, 'public');
            
            ProdukFoto::create([
                'produk_id' => $produkId,
                'nama_file' => $fileName,
                'path_file' => $path,
                'is_primary' => $isFirstPhoto && $index === 0, // Foto pertama jadi primary
                'urutan' => $index + 1
            ]);
        }
    }
}