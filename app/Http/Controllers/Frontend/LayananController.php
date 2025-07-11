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
        // Ambil semua layanan yang aktif
        $layanan = Layanan::aktif()->get();

        return view('frontend.services.index', compact('layanan'));
    }
}
