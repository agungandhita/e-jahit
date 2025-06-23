<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        // Data surat (placeholder - sesuaikan dengan model surat yang akan dibuat)
        $totalSuratMasuk = 0; // Akan diisi ketika model Surat dibuat
        $totalSuratKeluar = 0;
        $totalArsip = 0;

        // Target bulanan
        $targetSuratMasuk = 50;
        $targetSuratKeluar = 30;
        $targetArsip = 100;

        // Data baru hari ini/minggu ini
        $newSuratMasuk = 0;
        $newSuratKeluar = 0;
        $newArsip = 0;

        // Aktivitas terbaru sistem
        $recentActivities = collect([
            (object) [
                'title' => 'Pengguna Baru Terdaftar',
                'description' => $newUsersThisMonth . ' pengguna baru mendaftar bulan ini',
                'type_color' => 'blue',
                'icon_path' => '<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
                'created_at' => now()->subHours(2)
            ],
            (object) [
                'title' => 'Sistem Backup',
                'description' => 'Backup database berhasil dilakukan',
                'type_color' => 'green',
                'icon_path' => '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                'created_at' => now()->subHours(6)
            ],
            (object) [
                'title' => 'Update Sistem',
                'description' => 'Sistem telah diperbarui ke versi terbaru',
                'type_color' => 'purple',
                'icon_path' => '<path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>',
                'created_at' => now()->subDay()
            ]
        ]);

        // Statistik layanan surat (contoh jenis surat yang umum)
        $statistikLayanan = collect([
            (object) [
                'perihal' => 'Surat Keterangan Domisili',
                'total' => 0, // Akan diisi dari database
                'percentage' => 0,
                'change' => 0
            ],
            (object) [
                'perihal' => 'Surat Keterangan Tidak Mampu',
                'total' => 0,
                'percentage' => 0,
                'change' => 0
            ],
            (object) [
                'perihal' => 'Surat Keterangan Usaha',
                'total' => 0,
                'percentage' => 0,
                'change' => 0
            ],
            (object) [
                'perihal' => 'Surat Pengantar KTP',
                'total' => 0,
                'percentage' => 0,
                'change' => 0
            ],
            (object) [
                'perihal' => 'Surat Keterangan Kelahiran',
                'total' => 0,
                'percentage' => 0,
                'change' => 0
            ]
        ]);

        $statColors = ['blue', 'green', 'amber', 'red', 'purple'];

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalAdmins',
            'newUsersThisMonth',
            'totalArsip',
            'totalSuratMasuk',
            'totalSuratKeluar',
            'targetArsip',
            'targetSuratMasuk',
            'targetSuratKeluar',
            'newArsip',
            'newSuratMasuk',
            'newSuratKeluar',
            'recentActivities',
            'statistikLayanan',
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
