<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'kategori',
        'deskripsi',
        'harga',
        'gambar',
        'status',
        'stok',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Konstanta untuk kategori produk
    const KATEGORI = [
        'baju_pengantin' => 'Baju Pengantin',
        'seragam_sekolah' => 'Seragam Sekolah',
        'baju_kerja' => 'Baju Kerja',
        'kebaya' => 'Kebaya',
        'gamis' => 'Gamis',
        'jas' => 'Jas',
        'baju_anak' => 'Baju Anak',
    ];

    // Konstanta untuk status
    const STATUS = [
        'aktif' => 'Aktif',
        'nonaktif' => 'Non-aktif',
    ];

    // Accessor untuk kategori
    public function getKategoriLabelAttribute()
    {
        return self::KATEGORI[$this->kategori] ?? $this->kategori;
    }

    // Accessor untuk status
    public function getStatusLabelAttribute()
    {
        return self::STATUS[$this->status] ?? $this->status;
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk filter berdasarkan status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%')
              ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });
    }
}