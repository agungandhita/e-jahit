<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProdukFoto extends Model
{
    use HasFactory;

    protected $table = 'produk_foto';

    protected $fillable = [
        'produk_id',
        'nama_file',
        'path_file',
        'is_primary',
        'urutan'
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'urutan' => 'integer'
    ];

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }

    // Accessor untuk URL foto
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path_file);
    }

    // Method untuk menghapus file foto dari storage
    public function deleteFile()
    {
        if (Storage::disk('public')->exists($this->path_file)) {
            Storage::disk('public')->delete($this->path_file);
        }
    }

    // Boot method untuk auto delete file ketika record dihapus
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($foto) {
            $foto->deleteFile();
        });
    }

    // Scope untuk foto primary
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    // Method untuk set sebagai foto primary
    public function setPrimary()
    {
        // Reset semua foto lain menjadi bukan primary
        self::where('produk_id', $this->produk_id)
            ->where('id', '!=', $this->id)
            ->update(['is_primary' => false]);
        
        // Set foto ini sebagai primary
        $this->update(['is_primary' => true]);
    }
}