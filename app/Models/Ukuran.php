<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;

    protected $table = 'ukuran';
    protected $primaryKey = 'ukuran_id';

    protected $fillable = [
        'nama_ukuran',
        'kategori_ukuran',
        'jenis_pakaian',
        'harga_ukuran',
        'deskripsi_ukuran',
        'detail_ukuran',
        'status'
    ];

    protected $casts = [
        'harga_ukuran' => 'decimal:2',
        'detail_ukuran' => 'array'
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'ukuran_id';
    }

    // Scope untuk ukuran aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk ukuran berdasarkan kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori_ukuran', $kategori);
    }

    // Scope untuk ukuran berdasarkan jenis pakaian
    public function scopeJenisPakaian($query, $jenis)
    {
        return $query->where('jenis_pakaian', $jenis);
    }

    // Method untuk mendapatkan daftar kategori ukuran
    public static function getKategoriUkuranOptions()
    {
        return [
            'dewasa' => 'Dewasa',
            'anak' => 'Anak-anak',
            'bayi' => 'Bayi'
        ];
    }

    // Method untuk mendapatkan daftar jenis pakaian
    public static function getJenisPakaianOptions()
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



    // Method untuk mendapatkan label kategori ukuran
    public function getKategoriUkuranLabelAttribute()
    {
        $options = self::getKategoriUkuranOptions();
        return $options[$this->kategori_ukuran] ?? $this->kategori_ukuran;
    }

    // Method untuk mendapatkan label jenis pakaian
    public function getJenisPakaianLabelAttribute()
    {
        $options = self::getJenisPakaianOptions();
        return $options[$this->jenis_pakaian] ?? $this->jenis_pakaian;
    }



    // Method untuk mendapatkan status label
    public function getStatusLabelAttribute()
    {
        return $this->status == 'aktif' ? 'Aktif' : 'Nonaktif';
    }

    // Method untuk mendapatkan detail ukuran yang terformat
    public function getDetailUkuranFormatAttribute()
    {
        if (!$this->detail_ukuran) {
            return null;
        }

        $details = [];
        foreach ($this->detail_ukuran as $key => $value) {
            $label = $this->getDetailLabel($key);
            $details[] = $label . ': ' . $value;
        }

        return implode(', ', $details);
    }

    // Method untuk mendapatkan label detail ukuran
    private function getDetailLabel($key)
    {
        $labels = [
            'lingkar_dada' => 'Lingkar Dada',
            'lingkar_pinggang' => 'Lingkar Pinggang',
            'lingkar_pinggul' => 'Lingkar Pinggul',
            'panjang_baju' => 'Panjang Baju',
            'panjang_lengan' => 'Panjang Lengan',
            'lebar_bahu' => 'Lebar Bahu',
            'lingkar_leher' => 'Lingkar Leher',
            'panjang_celana' => 'Panjang Celana',
            'lingkar_paha' => 'Lingkar Paha',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan'
        ];

        return $labels[$key] ?? ucfirst(str_replace('_', ' ', $key));
    }

    // Relasi dengan layanan melalui tabel pivot
    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'layanan_ukuran', 'ukuran_id', 'layanan_id')
                    ->withPivot('harga', 'status', 'layanan_ukuran_id')
                    ->withTimestamps()
                    ->wherePivot('status', 'aktif');
    }

    // Relasi dengan layanan_ukuran
    public function layananUkuran()
    {
        return $this->hasMany(LayananUkuran::class, 'ukuran_id', 'ukuran_id');
    }

    // Relasi dengan pesanan melalui layanan_ukuran
    public function pesanan()
    {
        return $this->hasManyThrough(
            Pesanan::class,
            LayananUkuran::class,
            'ukuran_id', // Foreign key on layanan_ukuran table
            'layanan_ukuran_id', // Foreign key on pesanan table
            'ukuran_id', // Local key on ukuran table
            'layanan_ukuran_id' // Local key on layanan_ukuran table
        );
    }
}
