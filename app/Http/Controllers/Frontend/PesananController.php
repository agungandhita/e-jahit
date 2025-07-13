<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::with(['layanan'])
            ->byUser(Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('frontend.pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($layanan_id)
    {
        $layanan = Layanan::where('layanan_id', $layanan_id)
            ->where('status', 'aktif')
            ->firstOrFail();

        $user = Auth::user();

        return view('frontend.pesanan.create', compact('layanan', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'layanan_id' => 'required|exists:layanan,layanan_id',
            'kain_option' => 'required|in:bawa_sendiri,disediakan', // Sesuaikan nama field
            'ukuran' => 'required|string|max:1000', // Sesuaikan nama field
            'jumlah' => 'required|integer|min:1',
            'prioritas' => 'required|in:normal,cepat,kilat', // Sesuaikan nama field
            'catatan' => 'nullable|string|max:1000',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $layanan = Layanan::findOrFail($request->layanan_id);
        $user = Auth::user();
        
        // Hitung harga
        $harga_dasar = $layanan->harga_mulai * $request->jumlah;
        $biaya_tambahan = 0;
        
        // Biaya tambahan untuk prioritas
        switch ($request->prioritas) {
            case 'cepat':
                $biaya_tambahan += $harga_dasar * 0.5; // 50% tambahan
                break;
            case 'kilat':
                $biaya_tambahan += $harga_dasar * 1.0; // 100% tambahan
                break;
        }
        
        // Biaya tambahan untuk kain disediakan
        if ($request->kain_option === 'disediakan') {
            $biaya_tambahan += 50000 * $request->jumlah; // Rp 50.000 per item
        }
        
        $total_harga = $harga_dasar + $biaya_tambahan;
    
        // Generate nomor pesanan
        $nomor_pesanan = Pesanan::generateNomorPesanan();
    
        // Konversi ukuran text menjadi array untuk detail_ukuran
        $detail_ukuran = [
            [
                'jenis' => 'ukuran_detail',
                'nilai' => $request->ukuran,
                'satuan' => 'text'
            ]
        ];
    
        // Simpan pesanan
        $pesanan = Pesanan::create([
            'nomor_pesanan' => $nomor_pesanan,
            'user_id' => Auth::id(),
            'layanan_id' => $request->layanan_id,
            'jenis_layanan' => $layanan->jenis_layanan,
            'opsi_kain' => $request->kain_option,
            'detail_ukuran' => $detail_ukuran,
            'jumlah' => $request->jumlah,
            'estimasi_waktu' => $request->prioritas === 'normal' ? 'normal' : 'cepat',
            'prioritas' => $request->prioritas,
            'catatan' => $request->catatan,
            'nama_pemesan' => $user->name,
            'email_pemesan' => $user->email,
            'telepon_pemesan' => $user->phone ?? '',
            'alamat_pemesan' => $user->address ?? '',
            'harga_dasar' => $harga_dasar,
            'biaya_tambahan' => $biaya_tambahan,
            'total_harga' => $total_harga,
            'status' => 'pending'
        ]);
    
        return redirect()->route('pesanan.show', $pesanan->pesanan_id)
            ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pesanan = Pesanan::with(['layanan', 'user'])
            ->where('pesanan_id', $id)
            ->byUser(Auth::id())
            ->firstOrFail();

        return view('frontend.pesanan.show', compact('pesanan'));
    }

    /**
     * Show payment form
     */
    public function payment($id)
    {
        $pesanan = Pesanan::with(['layanan'])
            ->where('pesanan_id', $id)
            ->byUser(Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        return view('frontend.pesanan.payment', compact('pesanan'));
    }

    /**
     * Upload payment proof
     */
    public function uploadPayment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $pesanan = Pesanan::where('pesanan_id', $id)
            ->byUser(Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        // Upload file
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = 'payment_' . $pesanan->nomor_pesanan . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('payments', $filename, 'public');

            // Update pesanan
            $pesanan->update([
                'bukti_pembayaran' => $path,
                'tanggal_bayar' => Carbon::now(),
                'status' => 'dibayar'
            ]);

            return redirect()->route('pesanan.show', $pesanan->pesanan_id)
                ->with('success', 'Bukti pembayaran berhasil diupload! Pesanan Anda sedang diverifikasi.');
        }

        return redirect()->back()
            ->with('error', 'Gagal mengupload bukti pembayaran.');
    }

    /**
     * Cancel order
     */
    public function cancel($id)
    {
        $pesanan = Pesanan::where('pesanan_id', $id)
            ->byUser(Auth::id())
            ->firstOrFail();

        if (!$pesanan->canBeCancelled()) {
            return redirect()->back()
                ->with('error', 'Pesanan tidak dapat dibatalkan.');
        }

        $pesanan->update(['status' => 'dibatalkan']);

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }

    /**
     * Get price estimation via AJAX
     */
    public function getPriceEstimation(Request $request)
    {
        $layanan = Layanan::findOrFail($request->layanan_id);
        $jumlah = $request->jumlah ?? 1;
        $estimasi_waktu = $request->estimasi_waktu ?? 'normal';
        $opsi_kain = $request->opsi_kain ?? 'bawa_sendiri';
        
        $harga_dasar = $layanan->harga_mulai * $jumlah;
        $biaya_tambahan = 0;
        
        if ($estimasi_waktu === 'cepat') {
            $biaya_tambahan += $harga_dasar * 0.3;
        }
        
        if ($opsi_kain === 'disediakan') {
            $biaya_tambahan += $harga_dasar * 0.2;
        }
        
        $total_harga = $harga_dasar + $biaya_tambahan;
        
        return response()->json([
            'harga_dasar' => $harga_dasar,
            'biaya_tambahan' => $biaya_tambahan,
            'total_harga' => $total_harga,
            'harga_dasar_format' => 'Rp ' . number_format($harga_dasar, 0, ',', '.'),
            'biaya_tambahan_format' => 'Rp ' . number_format($biaya_tambahan, 0, ',', '.'),
            'total_harga_format' => 'Rp ' . number_format($total_harga, 0, ',', '.')
        ]);
    }
}