<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananUkuran extends Model
{
    use HasFactory;

    protected $table = 'layanan_ukuran';
    protected $primaryKey = 'layanan_ukuran_id';

    protected $fillable = [
        'layanan_id',
        'ukuran_id',
        'harga',
        'status'
    ];

    protected $casts = [
        'harga' => 'decimal:2'
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'layanan_ukuran_id';
    }

    // Scope untuk layanan ukuran aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Relasi dengan layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'layanan_id');
    }

    // Relasi dengan ukuran
    public function ukuran()
    {
        return $this->belongsTo(Ukuran::class, 'ukuran_id', 'ukuran_id');
    }

    // Relasi dengan pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'layanan_ukuran_id', 'layanan_ukuran_id');
    }

    // Method untuk format harga
    public function getHargaFormatAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Method untuk mendapatkan status label
    public function getStatusLabelAttribute()
    {
        return $this->status == 'aktif' ? 'Aktif' : 'Nonaktif';
    }

    // Method untuk mendapatkan nama lengkap (layanan + ukuran)
    public function getNamaLengkapAttribute()
    {
        return $this->layanan->nama_layanan . ' - ' . $this->ukuran->nama_ukuran;
    }
}