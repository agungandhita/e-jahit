<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display services page
     */
    public function index()
    {
        // Ambil semua layanan yang aktif dengan relasi layananUkuran
        $layanan = Layanan::aktif()->with('layananUkuran')->get();

        return view('frontend.services.index', compact('layanan'));
    }
}
