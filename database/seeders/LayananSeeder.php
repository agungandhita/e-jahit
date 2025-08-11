<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;
use Carbon\Carbon;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanan = [
            [
                'nama_layanan' => 'Jahit Baju Pengantin',
                'jenis_layanan' => 'baju_pengantin',
                'deskripsi' => 'Layanan jahit baju pengantin dengan desain eksklusif dan detail yang sempurna.',
                'harga_mulai' => 2000000,
                'estimasi_hari' => 30,
                'catatan' => 'Termasuk konsultasi desain dan fitting berkali-kali',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Seragam Sekolah',
                'jenis_layanan' => 'seragam_sekolah',
                'deskripsi' => 'Layanan jahit seragam sekolah dengan standar kualitas tinggi.',
                'harga_mulai' => 120000,
                'estimasi_hari' => 7,
                'catatan' => 'Tersedia paket hemat untuk pembelian dalam jumlah banyak',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Baju Kerja',
                'jenis_layanan' => 'baju_kerja',
                'deskripsi' => 'Layanan jahit baju kerja formal dan casual dengan kualitas terbaik.',
                'harga_mulai' => 150000,
                'estimasi_hari' => 10,
                'catatan' => 'Tersedia berbagai model dari kemeja hingga blazer',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Kebaya Tradisional',
                'jenis_layanan' => 'kebaya',
                'deskripsi' => 'Layanan jahit kebaya tradisional dan modern dengan detail bordir yang indah.',
                'harga_mulai' => 400000,
                'estimasi_hari' => 21,
                'catatan' => 'Menggunakan bahan premium dan teknik jahit tradisional',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Gamis Modern',
                'jenis_layanan' => 'gamis',
                'deskripsi' => 'Layanan jahit gamis dengan desain modern dan nyaman digunakan.',
                'harga_mulai' => 200000,
                'estimasi_hari' => 14,
                'catatan' => 'Tersedia berbagai model dan motif',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Jas Formal',
                'jenis_layanan' => 'jas',
                'deskripsi' => 'Layanan jahit jas formal untuk acara resmi dengan cutting yang presisi.',
                'harga_mulai' => 500000,
                'estimasi_hari' => 21,
                'catatan' => 'Termasuk celana dan konsultasi styling',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Baju Anak',
                'jenis_layanan' => 'baju_anak',
                'deskripsi' => 'Layanan jahit pakaian anak-anak dengan motif dan warna yang menarik.',
                'harga_mulai' => 80000,
                'estimasi_hari' => 7,
                'catatan' => 'Menggunakan bahan yang aman dan nyaman untuk anak-anak',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($layanan as $item) {
            Layanan::create($item);
        }
    }
}
