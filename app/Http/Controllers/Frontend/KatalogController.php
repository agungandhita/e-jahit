<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Display the gallery page with products from database
     */
    public function index()
    {
        // Ambil semua produk aktif dengan foto
        $produk = Produk::with(['fotos', 'fotoPrimary'])
            ->aktif()
            ->orderBy('created_at', 'desc')
            ->get();

        // Group produk berdasarkan kategori untuk filter
        $kategori = Produk::getKategoriOptions();

        return view('frontend.gallery.index', compact('produk', 'kategori'));
    }

    /**
     * Display the specified product detail
     */
    public function show($id)
    {
        $produk = Produk::with(['fotos', 'fotoPrimary'])
            ->aktif()
            ->where('produk_id', $id)
            ->firstOrFail();

        return view('frontend.gallery.detail', compact('produk'));
    }

    /**
     * Filter products by category via AJAX
     */
    public function filterByCategory(Request $request)
    {
        $kategori = $request->get('kategori');
        
        $query = Produk::with(['fotos', 'fotoPrimary'])->aktif();
        
        if ($kategori && $kategori !== 'semua') {
            $query->where('kategori', $kategori);
        }
        
        $produk = $query->orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'data' => $produk->map(function($item) {
                return [
                    'id' => $item->produk_id,
                    'nama' => $item->nama,
                    'deskripsi' => $item->deskripsi,
                    'kategori' => $item->kategori,
                    'kategori_label' => $item->kategori_label,
                    'foto_utama' => $item->foto_utama,
                    'harga_format' => $item->harga_format
                ];
            })
        ]);
    }
}