<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pesanan::with(['user', 'layanan']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_pesanan', 'like', "%{$search}%")
                  ->orWhere('nama_pemesan', 'like', "%{$search}%")
                  ->orWhere('email_pemesan', 'like', "%{$search}%")
                  ->orWhere('telepon_pemesan', 'like', "%{$search}%")
                  ->orWhereHas('layanan', function($q) use ($search) {
                      $q->where('nama_layanan', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by jenis layanan
        if ($request->filled('jenis_layanan')) {
            $query->where('jenis_layanan', $request->jenis_layanan);
        }

        // Filter by prioritas
        if ($request->filled('prioritas')) {
            $query->where('prioritas', $request->prioritas);
        }

        // Filter by date range
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        // Get pesanan with pagination
        $pesanan = $query->orderBy('created_at', 'desc')->paginate(15);

        // Statistics for dashboard cards
        $stats = [
            'total' => Pesanan::count(),
            'pending' => Pesanan::where('status', 'pending')->count(),
            'konfirmasi' => Pesanan::where('status', 'konfirmasi')->count(),
            'diproses' => Pesanan::where('status', 'diproses')->count(),
            'selesai' => Pesanan::where('status', 'selesai')->count(),
            'dibatalkan' => Pesanan::where('status', 'dibatalkan')->count(),
        ];

        // Jenis layanan options for filter
        $jenisLayananOptions = Layanan::getJenisLayananOptions();

        return view('admin.pesanan.index', compact('pesanan', 'stats', 'jenisLayananOptions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['user', 'layanan']);
        
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Update status pesanan
     */
    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,konfirmasi,diproses,selesai,dibatalkan',
            'catatan_admin' => 'nullable|string|max:500'
        ]);

        $oldStatus = $pesanan->status;
        $newStatus = $validated['status'];

        // Update status
        $pesanan->update([
            'status' => $newStatus,
            'catatan' => $validated['catatan_admin'] ?? $pesanan->catatan
        ]);

        // Set tanggal selesai jika status berubah ke selesai
        if ($newStatus === 'selesai' && $oldStatus !== 'selesai') {
            $pesanan->update(['tanggal_selesai' => Carbon::now()]);
        }

        // Set tanggal bayar jika status berubah ke konfirmasi
        if ($newStatus === 'konfirmasi' && $oldStatus !== 'konfirmasi' && !$pesanan->tanggal_bayar) {
            $pesanan->update(['tanggal_bayar' => Carbon::now()]);
        }

        $statusLabels = [
            'pending' => 'Menunggu Konfirmasi',
            'konfirmasi' => 'Sudah Dikonfirmasi',
            'diproses' => 'Sedang Dikerjakan',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan'
        ];

        Alert::success('Berhasil!', "Status pesanan berhasil diubah menjadi {$statusLabels[$newStatus]}!");
        return redirect()->back();
    }

    /**
     * Konfirmasi pembayaran
     */
    public function konfirmasiPembayaran(Pesanan $pesanan)
    {
        if ($pesanan->status !== 'pending' || !$pesanan->bukti_pembayaran) {
            Alert::error('Gagal!', 'Pesanan tidak dapat dikonfirmasi!');
            return redirect()->back();
        }

        $pesanan->update([
            'status' => 'konfirmasi',
            'tanggal_bayar' => Carbon::now()
        ]);

        Alert::success('Berhasil!', 'Pembayaran berhasil dikonfirmasi!');
        return redirect()->back();
    }

    /**
     * Tolak pembayaran
     */
    public function tolakPembayaran(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:500'
        ]);

        if ($pesanan->status !== 'pending') {
            Alert::error('Gagal!', 'Pesanan tidak dapat ditolak!');
            return redirect()->back();
        }

        // Hapus bukti pembayaran jika ada
        if ($pesanan->bukti_pembayaran) {
            Storage::disk('public')->delete($pesanan->bukti_pembayaran);
        }

        $pesanan->update([
            'bukti_pembayaran' => null,
            'catatan' => $request->alasan_penolakan
        ]);

        Alert::success('Berhasil!', 'Pembayaran berhasil ditolak!');
        return redirect()->back();
    }

    /**
     * Update harga pesanan
     */
    public function updateHarga(Request $request, Pesanan $pesanan)
    {
        $validated = $request->validate([
            'harga_dasar' => 'required|numeric|min:0',
            'biaya_tambahan' => 'nullable|numeric|min:0',
            'catatan_harga' => 'nullable|string|max:500'
        ]);

        $totalHarga = $validated['harga_dasar'] + ($validated['biaya_tambahan'] ?? 0);

        $pesanan->update([
            'harga_dasar' => $validated['harga_dasar'],
            'biaya_tambahan' => $validated['biaya_tambahan'] ?? 0,
            'total_harga' => $totalHarga,
            'catatan' => $validated['catatan_harga'] ?? $pesanan->catatan
        ]);

        Alert::success('Berhasil!', 'Harga pesanan berhasil diperbarui!');
        return redirect()->back();
    }

    /**
     * Export pesanan ke Excel/CSV
     */
    public function export(Request $request)
    {
        // Implementasi export bisa ditambahkan nanti
        Alert::info('Info', 'Fitur export akan segera tersedia!');
        return redirect()->back();
    }

    /**
     * Hapus pesanan
     */
    public function destroy(Pesanan $pesanan)
    {
        // Hapus bukti pembayaran jika ada
        if ($pesanan->bukti_pembayaran) {
            Storage::disk('public')->delete($pesanan->bukti_pembayaran);
        }

        $pesanan->delete();

        Alert::success('Berhasil!', 'Pesanan berhasil dihapus!');
        return redirect()->route('admin.pesanan.index');
    }

    /**
     * Bulk action untuk multiple pesanan
     */
    public function bulkAction(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|in:delete,update_status',
            'pesanan_ids' => 'required|array',
            'pesanan_ids.*' => 'exists:pesanan,pesanan_id',
            'bulk_status' => 'required_if:action,update_status|in:pending,konfirmasi,diproses,selesai,dibatalkan'
        ]);

        $pesananIds = $validated['pesanan_ids'];
        $action = $validated['action'];

        if ($action === 'delete') {
            $pesanan = Pesanan::whereIn('pesanan_id', $pesananIds)->get();
            
            // Hapus bukti pembayaran
            foreach ($pesanan as $item) {
                if ($item->bukti_pembayaran) {
                    Storage::disk('public')->delete($item->bukti_pembayaran);
                }
            }
            
            Pesanan::whereIn('pesanan_id', $pesananIds)->delete();
            Alert::success('Berhasil!', count($pesananIds) . ' pesanan berhasil dihapus!');
            
        } elseif ($action === 'update_status') {
            $newStatus = $validated['bulk_status'];
            
            Pesanan::whereIn('pesanan_id', $pesananIds)->update([
                'status' => $newStatus,
                'updated_at' => Carbon::now()
            ]);
            
            $statusLabels = [
                'pending' => 'Menunggu Konfirmasi',
                'konfirmasi' => 'Sudah Dikonfirmasi',
                'diproses' => 'Sedang Dikerjakan',
                'selesai' => 'Selesai',
                'dibatalkan' => 'Dibatalkan'
            ];
            
            Alert::success('Berhasil!', count($pesananIds) . " pesanan berhasil diubah statusnya menjadi {$statusLabels[$newStatus]}!");
        }

        return redirect()->back();
    }
}