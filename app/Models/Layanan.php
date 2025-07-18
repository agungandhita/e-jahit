<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    protected $primaryKey = 'layanan_id';

    protected $fillable = [
        'nama_layanan',
        'jenis_layanan',
        'deskripsi',
        'harga_mulai',
        'harga_sampai',
        'estimasi_hari',
        'catatan',
        'status'
    ];

    protected $casts = [
        'harga_mulai' => 'decimal:2',
        'harga_sampai' => 'decimal:2',
        'estimasi_hari' => 'integer'
    ];

    // Scope untuk layanan aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk layanan berdasarkan jenis
    public function scopeJenis($query, $jenis)
    {
        return $query->where('jenis_layanan', $jenis);
    }


    // Method untuk mendapatkan label jenis layanan
    public function getJenisLayananLabelAttribute()
    {
        $options = self::getJenisLayananOptions();
        return $options[$this->jenis_layanan] ?? $this->jenis_layanan;
    }

    // Method untuk format harga
    public function getHargaFormatAttribute()
    {
        if ($this->harga_sampai && $this->harga_sampai > $this->harga_mulai) {
            return 'Rp ' . number_format($this->harga_mulai, 0, ',', '.') . ' - Rp ' . number_format($this->harga_sampai, 0, ',', '.');
        }
        return 'Mulai Rp ' . number_format($this->harga_mulai, 0, ',', '.');
    }

    // Method untuk format estimasi
    public function getEstimasiWaktuAttribute()
    {
        return $this->estimasi_hari . ' hari';
    }

    // Method untuk format estimasi (alias)
    public function getEstimasiFormatAttribute()
    {
        return $this->estimasi_hari . ' hari';
    }

    // Update method getJenisLayananOptions untuk sesuai dengan enum database
    public static function getJenisLayananOptions()
    {
        return [
            'baju_pengantin' => 'Baju Pengantin',
            'seragam_sekolah' => 'Seragam Sekolah',
            'baju_kerja' => 'Baju Kerja',
            'kebaya' => 'Kebaya',
            'gamis' => 'Gamis',
            'jas' => 'Jas',
            'baju_anak' => 'Baju Anak',
            'baju_pria' => 'Baju Pria',
            'baju_wanita' => 'Baju Wanita',
            'celana' => 'Celana',
            'rok' => 'Rok',
            'dress' => 'Dress',
            'seragam' => 'Seragam',
            'lainnya' => 'Lainnya'
        ];
    }

    // Update method getGradientClassAttribute
    public function getGradientClassAttribute()
    {
        $gradients = [
            'baju_pengantin' => 'from-pink-500 to-rose-700',
            'seragam_sekolah' => 'from-blue-500 to-blue-700',
            'baju_kerja' => 'from-gray-500 to-gray-700',
            'kebaya' => 'from-emerald-500 to-emerald-700',
            'gamis' => 'from-purple-500 to-purple-700',
            'jas' => 'from-indigo-500 to-indigo-700',
            'baju_anak' => 'from-yellow-500 to-orange-600',
            'baju_pria' => 'from-blue-600 to-blue-800',
            'baju_wanita' => 'from-pink-400 to-pink-600',
            'celana' => 'from-slate-500 to-slate-700',
            'rok' => 'from-rose-400 to-rose-600',
            'dress' => 'from-violet-500 to-violet-700',
            'seragam' => 'from-cyan-500 to-cyan-700',
            'lainnya' => 'from-green-500 to-green-700'
        ];

        return $gradients[$this->jenis_layanan] ?? 'from-green-500 to-green-700';
    }

    // Method untuk mendapatkan icon SVG berdasarkan jenis layanan
    public function getIconSvgAttribute()
    {
        $icons = [
            'baju_pengantin' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM8 7V2H16V7L18 22H6L8 7Z"/>',
            'seragam_sekolah' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'baju_kerja' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'kebaya' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM8 7V2H16V7L18 22H6L8 7Z"/>',
            'gamis' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM8 7V2H16V7L18 22H6L8 7Z"/>',
            'jas' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'baju_anak' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'baju_pria' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'baju_wanita' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'celana' => '<path d="M8 2V7L6 21H10L11 14H13L14 21H18L16 7V2H8Z"/>',
            'rok' => '<path d="M8 2V7L6 21H18L16 7V2H8Z"/>',
            'dress' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM8 7V2H16V7L18 22H6L8 7Z"/>',
            'seragam' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'lainnya' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>',
            'default' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 13V22H13V18H11V22H9V13L3 7V9H1V7C1 5.9 1.9 5 3 5V4C3 2.9 3.9 2 5 2H19C20.1 2 21 2.9 21 4V5C22.1 5 23 5.9 23 7V9H21Z"/>'
        ];

        return $icons[$this->jenis_layanan] ?? $icons['default'];
    }
}
