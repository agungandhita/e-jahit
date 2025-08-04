<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        // Data pengguna
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $newUsersThisMonth = User::where('role', 'user')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Data produk
        $totalProduk = Produk::count();
        $produkAktif = Produk::where('status', 'aktif')->count();

        // Data pesanan
        $totalPesanan = Pesanan::count();
        $pesananBaru = Pesanan::where('status', 'pending')->count();
        $pesananBulanIni = Pesanan::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Data pendapatan
        $pendapatanBulanIni = Pesanan::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->where('status', '!=', 'dibatalkan')
            ->sum('total_harga');
        
        $pendapatanBulanLalu = Pesanan::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->where('status', '!=', 'dibatalkan')
            ->sum('total_harga');
        
        // Hitung perubahan persentase pendapatan
        $perubahanPendapatan = 0;
        if ($pendapatanBulanLalu > 0) {
            $perubahanPendapatan = round((($pendapatanBulanIni - $pendapatanBulanLalu) / $pendapatanBulanLalu) * 100, 1);
        } elseif ($pendapatanBulanIni > 0) {
            $perubahanPendapatan = 100;
        }

        // Aktivitas terbaru sistem
        $recentActivities = collect();
        
        // Tambahkan aktivitas pengguna baru jika ada
        if ($newUsersThisMonth > 0) {
            $recentActivities->push((object) [
                'title' => 'Pengguna Baru Terdaftar',
                'description' => $newUsersThisMonth . ' pengguna baru mendaftar bulan ini',
                'type_color' => 'blue',
                'icon_path' => '<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
                'created_at' => now()->subHours(2)
            ]);
        }
        
        // Tambahkan aktivitas pesanan baru jika ada
        if ($pesananBaru > 0) {
            $recentActivities->push((object) [
                'title' => 'Pesanan Baru',
                'description' => $pesananBaru . ' pesanan baru menunggu konfirmasi',
                'type_color' => 'amber',
                'icon_path' => '<path d="M7,4V2A1,1 0 0,1 8,1H16A1,1 0 0,1 17,2V4H20A1,1 0 0,1 21,5V19A1,1 0 0,1 20,20H4A1,1 0 0,1 3,19V5A1,1 0 0,1 4,4H7M9,3V4H15V3H9M5,6V18H19V6H5Z"/>',
                'created_at' => now()->subHour()
            ]);
        }
        
        // Tambahkan aktivitas produk baru jika ada produk yang dibuat hari ini
        $produkHariIni = Produk::whereDate('created_at', today())->count();
        if ($produkHariIni > 0) {
            $recentActivities->push((object) [
                'title' => 'Produk Baru Ditambahkan',
                'description' => $produkHariIni . ' produk baru ditambahkan hari ini',
                'type_color' => 'green',
                'icon_path' => '<path d="M12,2A3,3 0 0,1 15,5V7H20A1,1 0 0,1 21,8V19A1,1 0 0,1 20,20H4A1,1 0 0,1 3,19V8A1,1 0 0,1 4,7H9V5A3,3 0 0,1 12,2M12,4A1,1 0 0,0 11,5V7H13V5A1,1 0 0,0 12,4Z"/>',
                'created_at' => now()->subHours(3)
            ]);
        }
        
        // Jika tidak ada aktivitas, tambahkan aktivitas default
        if ($recentActivities->isEmpty()) {
            $recentActivities->push((object) [
                'title' => 'Sistem Berjalan Normal',
                'description' => 'Semua sistem berjalan dengan baik',
                'type_color' => 'green',
                'icon_path' => '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                'created_at' => now()->subHours(1)
            ]);
        }

        // Statistik produk terpopuler berdasarkan pesanan
        $produkPopuler = collect();
        
        // Ambil data produk berdasarkan layanan yang paling banyak dipesan
        $layananPopuler = DB::table('pesanan')
            ->join('layanan', 'pesanan.layanan_id', '=', 'layanan.layanan_id')
            ->select(
                'layanan.nama_layanan as nama',
                'layanan.jenis_layanan',
                DB::raw('COUNT(pesanan.pesanan_id) as total_pesanan'),
                DB::raw('SUM(pesanan.total_harga) as total_pendapatan')
            )
            ->where('pesanan.status', '!=', 'dibatalkan')
            ->groupBy('layanan.layanan_id', 'layanan.nama_layanan', 'layanan.jenis_layanan')
            ->orderBy('total_pesanan', 'desc')
            ->limit(5)
            ->get();
        
        // Hitung total pesanan untuk persentase
        $totalPesananValid = Pesanan::where('status', '!=', 'dibatalkan')->count();
        
        foreach ($layananPopuler as $layanan) {
            $percentage = $totalPesananValid > 0 ? round(($layanan->total_pesanan / $totalPesananValid) * 100, 1) : 0;
            
            $produkPopuler->push((object) [
                'nama' => $layanan->nama,
                'jenis_layanan' => $layanan->jenis_layanan,
                'total_pesanan' => $layanan->total_pesanan,
                'total_pendapatan' => $layanan->total_pendapatan,
                'percentage' => $percentage
            ]);
        }
        
        // Jika tidak ada data, buat data kosong
        if ($produkPopuler->isEmpty()) {
            for ($i = 1; $i <= 5; $i++) {
                $produkPopuler->push((object) [
                    'nama' => 'Belum ada data',
                    'jenis_layanan' => 'lainnya',
                    'total_pesanan' => 0,
                    'total_pendapatan' => 0,
                    'percentage' => 0
                ]);
            }
        }

        $statColors = ['blue', 'green', 'amber', 'red', 'purple'];

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalAdmins',
            'newUsersThisMonth',
            'totalProduk',
            'produkAktif',
            'totalPesanan',
            'pesananBaru',
            'pesananBulanIni',
            'pendapatanBulanIni',
            'perubahanPendapatan',
            'recentActivities',
            'produkPopuler',
            'statColors'
        ));
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    // Method untuk mendapatkan statistik berdasarkan periode
    public function getStatistics(Request $request)
    {
        $period = $request->get('period', 'month');

        // Logic untuk mengambil data berdasarkan periode
        // Akan diimplementasi ketika model Surat sudah ada

        return response()->json([
            'success' => true,
            'data' => []
        ]);
    }
}
