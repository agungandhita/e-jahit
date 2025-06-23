<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        $query = Produk::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->search($search);
        }
        
        // Filter by kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->byKategori($request->kategori);
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->byStatus($request->status);
        }
        
        $produk = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:baju_pengantin,seragam_sekolah,baju_kerja,kebaya,gamis,jas,baju_anak',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak valid!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['nama', 'kategori', 'deskripsi', 'harga', 'stok', 'status']);
            
            // Handle file upload
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('produk', $filename, 'public');
                $data['gambar'] = $path;
            }

            Produk::create($data);

            Alert::success('Berhasil', 'Produk berhasil ditambahkan!');
            return redirect()->route('admin.produk.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menambahkan produk!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:baju_pengantin,seragam_sekolah,baju_kerja,kebaya,gamis,jas,baju_anak',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak valid!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = $request->only(['nama', 'kategori', 'deskripsi', 'harga', 'stok', 'status']);
            
            // Handle file upload
            if ($request->hasFile('gambar')) {
                // Delete old image if exists
                if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                    Storage::disk('public')->delete($produk->gambar);
                }
                
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('produk', $filename, 'public');
                $data['gambar'] = $path;
            }

            $produk->update($data);

            Alert::success('Berhasil', 'Produk berhasil diperbarui!');
            return redirect()->route('admin.produk.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat memperbarui produk!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            // Delete image if exists
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            
            $produk->delete();
            
            Alert::success('Berhasil', 'Produk berhasil dihapus!');
            return redirect()->route('admin.produk.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menghapus produk!');
            return redirect()->back();
        }
    }

    /**
     * Toggle status of the specified resource.
     */
    public function toggleStatus(Produk $produk)
    {
        try {
            $produk->status = $produk->status === 'aktif' ? 'nonaktif' : 'aktif';
            $produk->save();
            
            $statusText = $produk->status === 'aktif' ? 'diaktifkan' : 'dinonaktifkan';
            Alert::success('Berhasil', "Produk berhasil {$statusText}!");
            
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengubah status produk!');
            return redirect()->back();
        }
    }
}