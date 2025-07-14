<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanPendapatanExport;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Default periode: bulan ini
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        
        // Query pesanan yang sudah selesai dalam periode tertentu
        $pesananQuery = Pesanan::with(['user', 'layanan'])
            ->where('status', 'selesai')
            ->whereBetween('tanggal_selesai', [$startDate, $endDate]);
        
        $pesanan = $pesananQuery->orderBy('tanggal_selesai', 'desc')->get();
        
        // Hitung statistik
        $totalPendapatan = $pesanan->sum('total_harga');
        $totalPesanan = $pesanan->count();
        $rataRataPendapatan = $totalPesanan > 0 ? $totalPendapatan / $totalPesanan : 0;
        
        // Pendapatan per hari
        $pendapatanPerHari = $pesanan->groupBy(function($item) {
            return Carbon::parse($item->tanggal_selesai)->format('Y-m-d');
        })->map(function($group) {
            return $group->sum('total_harga');
        });
        
        // Pendapatan per layanan
        $pendapatanPerLayanan = $pesanan->groupBy('layanan.nama_layanan')
            ->map(function($group) {
                return [
                    'total' => $group->sum('total_harga'),
                    'count' => $group->count()
                ];
            });
        
        return view('admin.laporan.index', compact(
            'pesanan',
            'totalPendapatan',
            'totalPesanan',
            'rataRataPendapatan',
            'pendapatanPerHari',
            'pendapatanPerLayanan',
            'startDate',
            'endDate'
        ));
    }
    
    public function export(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        
        $fileName = 'laporan-pendapatan-' . $startDate . '-to-' . $endDate . '.xlsx';
        
        return Excel::download(new LaporanPendapatanExport($startDate, $endDate), $fileName);
    }
}