<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'produk_id';

    protected $fillable = [
        'nama',
        'kategori',
        'deskripsi',
        'harga',
        'gambar',
        'status',
        'stok'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer'
    ];

    // Relasi ke tabel foto
    public function fotos()
    {
        return $this->hasMany(ProdukFoto::class, 'produk_id', 'produk_id')->orderBy('urutan');
    }

    // Relasi untuk foto utama
    public function fotoPrimary()
    {
        return $this->hasOne(ProdukFoto::class, 'produk_id', 'produk_id')->where('is_primary', true);
    }

    // Accessor untuk mendapatkan URL foto utama
    public function getFotoUtamaAttribute()
    {
        $fotoPrimary = $this->fotoPrimary;
        if ($fotoPrimary) {
            return asset('storage/' . $fotoPrimary->path_file);
        }
        
        // Fallback ke gambar field jika ada
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        
        // Default image jika tidak ada foto
        return asset('img/no-image.png');
    }

    // Scope untuk produk aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk produk berdasarkan kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Method untuk mendapatkan daftar kategori
    public static function getKategoriOptions()
    {
        return [
            'baju_pengantin' => 'Baju Pengantin',
            'seragam_sekolah' => 'Seragam Sekolah',
            'baju_kerja' => 'Baju Kerja',
            'kebaya' => 'Kebaya',
            'gamis' => 'Gamis',
            'jas' => 'Jas',
            'baju_anak' => 'Baju Anak'
        ];
    }

    // Method untuk mendapatkan label kategori
    public function getKategoriLabelAttribute()
    {
        $options = self::getKategoriOptions();
        return $options[$this->kategori] ?? $this->kategori;
    }

    // Method untuk format harga
    public function getHargaFormatAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}