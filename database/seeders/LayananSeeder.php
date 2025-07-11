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
                'nama_layanan' => 'Jahit Kemeja Pria',
                'jenis_layanan' => 'baju_pria',
                'deskripsi' => 'Layanan jahit kemeja pria dengan berbagai model dan ukuran. Menggunakan bahan berkualitas tinggi dan jahitan rapi.',
                'harga_mulai' => 150000,
                'harga_sampai' => 300000,
                'estimasi_hari' => 7,
                'catatan' => 'Harga dapat bervariasi tergantung model dan bahan yang dipilih',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Blouse Wanita',
                'jenis_layanan' => 'baju_wanita',
                'deskripsi' => 'Layanan jahit blouse dan atasan wanita dengan desain modern dan elegan.',
                'harga_mulai' => 120000,
                'harga_sampai' => 250000,
                'estimasi_hari' => 5,
                'catatan' => 'Tersedia berbagai model dari casual hingga formal',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Baju Anak',
                'jenis_layanan' => 'baju_anak',
                'deskripsi' => 'Layanan jahit pakaian anak-anak dengan motif dan warna yang menarik.',
                'harga_mulai' => 80000,
                'harga_sampai' => 150000,
                'estimasi_hari' => 4,
                'catatan' => 'Menggunakan bahan yang aman dan nyaman untuk anak-anak',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Celana Formal',
                'jenis_layanan' => 'celana',
                'deskripsi' => 'Layanan jahit celana formal untuk pria dan wanita dengan cutting yang presisi.',
                'harga_mulai' => 100000,
                'harga_sampai' => 200000,
                'estimasi_hari' => 6,
                'catatan' => 'Termasuk service fitting untuk hasil yang sempurna',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Rok Wanita',
                'jenis_layanan' => 'rok',
                'deskripsi' => 'Layanan jahit rok dengan berbagai model dari A-line hingga pencil skirt.',
                'harga_mulai' => 90000,
                'harga_sampai' => 180000,
                'estimasi_hari' => 5,
                'catatan' => 'Tersedia berbagai panjang dan model sesuai kebutuhan',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Dress Pesta',
                'jenis_layanan' => 'dress',
                'deskripsi' => 'Layanan jahit dress untuk acara pesta dan formal dengan desain eksklusif.',
                'harga_mulai' => 300000,
                'harga_sampai' => 800000,
                'estimasi_hari' => 14,
                'catatan' => 'Termasuk konsultasi desain dan fitting berkali-kali',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Kebaya Tradisional',
                'jenis_layanan' => 'kebaya',
                'deskripsi' => 'Layanan jahit kebaya tradisional dan modern dengan detail bordir yang indah.',
                'harga_mulai' => 400000,
                'harga_sampai' => 1200000,
                'estimasi_hari' => 21,
                'catatan' => 'Menggunakan bahan premium dan teknik jahit tradisional',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Seragam Sekolah',
                'jenis_layanan' => 'seragam',
                'deskripsi' => 'Layanan jahit seragam sekolah dengan standar kualitas tinggi.',
                'harga_mulai' => 120000,
                'harga_sampai' => 200000,
                'estimasi_hari' => 7,
                'catatan' => 'Tersedia paket hemat untuk pembelian dalam jumlah banyak',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Alterasi Pakaian',
                'jenis_layanan' => 'lainnya',
                'deskripsi' => 'Layanan alterasi dan perbaikan pakaian seperti mengecilkan, membesarkan, atau memperbaiki jahitan.',
                'harga_mulai' => 30000,
                'harga_sampai' => 100000,
                'estimasi_hari' => 3,
                'catatan' => 'Harga tergantung tingkat kesulitan alterasi',
                'status' => 'aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_layanan' => 'Jahit Jas Formal',
                'jenis_layanan' => 'baju_pria',
                'deskripsi' => 'Layanan jahit jas formal untuk acara resmi dengan cutting yang presisi.',
                'harga_mulai' => 500000,
                'harga_sampai' => 1500000,
                'estimasi_hari' => 21,
                'catatan' => 'Termasuk celana dan konsultasi styling',
                'status' => 'nonaktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($layanan as $item) {
            Layanan::create($item);
        }
    }
}
