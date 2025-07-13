<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';

    protected $fillable = [
        'nomor_pesanan',
        'user_id',
        'layanan_id',
        'jenis_layanan',
        'opsi_kain',
        'detail_ukuran',
        'jumlah',
        'estimasi_waktu',
        'prioritas', // Tambahkan field ini
        'catatan',
        'nama_pemesan',
        'email_pemesan',
        'telepon_pemesan',
        'alamat_pemesan',
        'harga_dasar',
        'biaya_tambahan',
        'total_harga',
        'status',
        'bukti_pembayaran',
        'tanggal_bayar',
        'tanggal_selesai'
    ];

    protected $casts = [
        'detail_ukuran' => 'array',
        'harga_dasar' => 'decimal:2',
        'biaya_tambahan' => 'decimal:2',
        'total_harga' => 'decimal:2',
        'tanggal_bayar' => 'datetime',
        'tanggal_selesai' => 'datetime'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan Layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'layanan_id');
    }

    // Scope untuk status tertentu
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk user tertentu
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Method untuk generate nomor pesanan
    public static function generateNomorPesanan()
    {
        $prefix = 'EJ';
        $date = Carbon::now()->format('ymd');
        $lastOrder = self::whereDate('created_at', Carbon::today())
                        ->orderBy('pesanan_id', 'desc')
                        ->first();
        
        $sequence = $lastOrder ? (int)substr($lastOrder->nomor_pesanan, -3) + 1 : 1;
        
        return $prefix . $date . str_pad($sequence, 3, '0', STR_PAD_LEFT);
    }

    // Method untuk format total harga
    public function getTotalHargaFormatAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }

    // Method untuk mendapatkan status badge class
    public function getStatusBadgeClassAttribute()
    {
        $classes = [
            'pending' => 'bg-yellow-100 text-yellow-800',
            'dibayar' => 'bg-blue-100 text-blue-800',
            'diproses' => 'bg-purple-100 text-purple-800',
            'selesai' => 'bg-green-100 text-green-800',
            'dibatalkan' => 'bg-red-100 text-red-800'
        ];
        
        return $classes[$this->status] ?? 'bg-gray-100 text-gray-800';
    }

    // Method untuk mendapatkan status label
    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Menunggu Konfirmasi',
            'dibayar' => 'Sudah Dibayar', 
            'diproses' => 'Sedang Dikerjakan',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan'
        ];
        
        return $labels[$this->status] ?? $this->status;
    }
    
    // Tambahkan accessor untuk estimasi selesai
    public function getEstimasiSelesaiAttribute()
    {
        if (!$this->tanggal_bayar) {
            return null;
        }
        
        $estimasiHari = $this->layanan->estimasi_hari ?? 7;
        
        // Sesuaikan berdasarkan prioritas
        switch ($this->prioritas) {
            case 'cepat':
                $estimasiHari = ceil($estimasiHari / 2);
                break;
            case 'kilat':
                $estimasiHari = 1;
                break;
        }
        
        return $this->tanggal_bayar->addDays($estimasiHari);
    }

    // Method untuk mendapatkan progress percentage
    public function getProgressPercentageAttribute()
    {
        $progress = [
            'pending' => 25,
            'dibayar' => 50,
            'diproses' => 75,
            'selesai' => 100,
            'dibatalkan' => 0
        ];
        
        return $progress[$this->status] ?? 0;
    }

    // Method untuk cek apakah bisa dibatalkan
    public function canBeCancelled()
    {
        return in_array($this->status, ['pending', 'dibayar']);
    }

    // Method untuk cek apakah bisa upload bukti pembayaran
    public function canUploadPayment()
    {
        return $this->status === 'pending';
    }
}
