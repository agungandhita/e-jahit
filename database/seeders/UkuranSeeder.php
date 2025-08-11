<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ukuran;

class UkuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ukuran untuk Baju Dewasa (Pria)
        $ukuranBajuPria = [
            [
                'nama_ukuran' => 'S',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_pria',
                'harga_ukuran' => 0,
                'deskripsi_ukuran' => 'Ukuran Small untuk pria dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '88-92 cm',
                    'lingkar_pinggang' => '76-80 cm',
                    'panjang_baju' => '68-70 cm',
                    'panjang_lengan' => '58-60 cm',
                    'lebar_bahu' => '42-44 cm'
                ]
            ],
            [
                'nama_ukuran' => 'M',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_pria',
                'harga_ukuran' => 5000,
                'deskripsi_ukuran' => 'Ukuran Medium untuk pria dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '92-96 cm',
                    'lingkar_pinggang' => '80-84 cm',
                    'panjang_baju' => '70-72 cm',
                    'panjang_lengan' => '60-62 cm',
                    'lebar_bahu' => '44-46 cm'
                ]
            ],
            [
                'nama_ukuran' => 'L',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_pria',
                'harga_ukuran' => 10000,
                'deskripsi_ukuran' => 'Ukuran Large untuk pria dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '96-100 cm',
                    'lingkar_pinggang' => '84-88 cm',
                    'panjang_baju' => '72-74 cm',
                    'panjang_lengan' => '62-64 cm',
                    'lebar_bahu' => '46-48 cm'
                ]
            ],
            [
                'nama_ukuran' => 'XL',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_pria',
                'harga_ukuran' => 15000,
                'deskripsi_ukuran' => 'Ukuran Extra Large untuk pria dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '100-104 cm',
                    'lingkar_pinggang' => '88-92 cm',
                    'panjang_baju' => '74-76 cm',
                    'panjang_lengan' => '64-66 cm',
                    'lebar_bahu' => '48-50 cm'
                ]
            ],
            [
                'nama_ukuran' => 'XXL',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_pria',
                'harga_ukuran' => 20000,
                'deskripsi_ukuran' => 'Ukuran Double Extra Large untuk pria dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '104-108 cm',
                    'lingkar_pinggang' => '92-96 cm',
                    'panjang_baju' => '76-78 cm',
                    'panjang_lengan' => '66-68 cm',
                    'lebar_bahu' => '50-52 cm'
                ]
            ]
        ];

        // Ukuran untuk Baju Wanita
        $ukuranBajuWanita = [
            [
                'nama_ukuran' => 'S',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_wanita',
                'harga_ukuran' => 0,
                'deskripsi_ukuran' => 'Ukuran Small untuk wanita dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '82-86 cm',
                    'lingkar_pinggang' => '66-70 cm',
                    'lingkar_pinggul' => '90-94 cm',
                    'panjang_baju' => '58-60 cm',
                    'panjang_lengan' => '56-58 cm'
                ]
            ],
            [
                'nama_ukuran' => 'M',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_wanita',
                'harga_ukuran' => 5000,
                'deskripsi_ukuran' => 'Ukuran Medium untuk wanita dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '86-90 cm',
                    'lingkar_pinggang' => '70-74 cm',
                    'lingkar_pinggul' => '94-98 cm',
                    'panjang_baju' => '60-62 cm',
                    'panjang_lengan' => '58-60 cm'
                ]
            ],
            [
                'nama_ukuran' => 'L',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_wanita',
                'harga_ukuran' => 10000,
                'deskripsi_ukuran' => 'Ukuran Large untuk wanita dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '90-94 cm',
                    'lingkar_pinggang' => '74-78 cm',
                    'lingkar_pinggul' => '98-102 cm',
                    'panjang_baju' => '62-64 cm',
                    'panjang_lengan' => '60-62 cm'
                ]
            ],
            [
                'nama_ukuran' => 'XL',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'baju_wanita',
                'harga_ukuran' => 15000,
                'deskripsi_ukuran' => 'Ukuran Extra Large untuk wanita dewasa',
                'detail_ukuran' => [
                    'lingkar_dada' => '94-98 cm',
                    'lingkar_pinggang' => '78-82 cm',
                    'lingkar_pinggul' => '102-106 cm',
                    'panjang_baju' => '64-66 cm',
                    'panjang_lengan' => '62-64 cm'
                ]
            ]
        ];

        // Ukuran untuk Kebaya
        $ukuranKebaya = [
            [
                'nama_ukuran' => 'S',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'kebaya',
                'harga_ukuran' => 10000,
                'deskripsi_ukuran' => 'Ukuran Small untuk kebaya tradisional',
                'detail_ukuran' => [
                    'lingkar_dada' => '82-86 cm',
                    'lingkar_pinggang' => '66-70 cm',
                    'panjang_kebaya' => '55-58 cm',
                    'panjang_lengan' => '54-56 cm',
                    'lebar_bahu' => '36-38 cm'
                ]
            ],
            [
                'nama_ukuran' => 'M',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'kebaya',
                'harga_ukuran' => 15000,
                'deskripsi_ukuran' => 'Ukuran Medium untuk kebaya tradisional',
                'detail_ukuran' => [
                    'lingkar_dada' => '86-90 cm',
                    'lingkar_pinggang' => '70-74 cm',
                    'panjang_kebaya' => '58-60 cm',
                    'panjang_lengan' => '56-58 cm',
                    'lebar_bahu' => '38-40 cm'
                ]
            ],
            [
                'nama_ukuran' => 'L',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'kebaya',
                'harga_ukuran' => 20000,
                'deskripsi_ukuran' => 'Ukuran Large untuk kebaya tradisional',
                'detail_ukuran' => [
                    'lingkar_dada' => '90-94 cm',
                    'lingkar_pinggang' => '74-78 cm',
                    'panjang_kebaya' => '60-62 cm',
                    'panjang_lengan' => '58-60 cm',
                    'lebar_bahu' => '40-42 cm'
                ]
            ]
        ];

        // Ukuran untuk Baju Anak
        $ukuranBajuAnak = [
            [
                'nama_ukuran' => '2-3 Tahun',
                'kategori_ukuran' => 'anak',
                'jenis_pakaian' => 'baju_anak',
                'harga_ukuran' => 0,
                'deskripsi_ukuran' => 'Ukuran untuk anak usia 2-3 tahun',
                'detail_ukuran' => [
                    'tinggi_badan' => '85-95 cm',
                    'lingkar_dada' => '52-54 cm',
                    'panjang_baju' => '35-38 cm',
                    'panjang_lengan' => '28-30 cm'
                ]
            ],
            [
                'nama_ukuran' => '4-5 Tahun',
                'kategori_ukuran' => 'anak',
                'jenis_pakaian' => 'baju_anak',
                'harga_ukuran' => 2000,
                'deskripsi_ukuran' => 'Ukuran untuk anak usia 4-5 tahun',
                'detail_ukuran' => [
                    'tinggi_badan' => '95-105 cm',
                    'lingkar_dada' => '54-56 cm',
                    'panjang_baju' => '38-42 cm',
                    'panjang_lengan' => '30-32 cm'
                ]
            ],
            [
                'nama_ukuran' => '6-7 Tahun',
                'kategori_ukuran' => 'anak',
                'jenis_pakaian' => 'baju_anak',
                'harga_ukuran' => 5000,
                'deskripsi_ukuran' => 'Ukuran untuk anak usia 6-7 tahun',
                'detail_ukuran' => [
                    'tinggi_badan' => '105-115 cm',
                    'lingkar_dada' => '56-58 cm',
                    'panjang_baju' => '42-45 cm',
                    'panjang_lengan' => '32-35 cm'
                ]
            ]
        ];

        // Insert semua data ukuran
        foreach ($ukuranBajuPria as $ukuran) {
            Ukuran::create($ukuran);
        }

        foreach ($ukuranBajuWanita as $ukuran) {
            Ukuran::create($ukuran);
        }

        foreach ($ukuranKebaya as $ukuran) {
            Ukuran::create($ukuran);
        }

        foreach ($ukuranBajuAnak as $ukuran) {
            Ukuran::create($ukuran);
        }

        // Ukuran untuk Jas Formal
        $ukuranJas = [
            [
                'nama_ukuran' => '46',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'jas',
                'harga_ukuran' => 25000,
                'deskripsi_ukuran' => 'Ukuran 46 untuk jas formal pria',
                'detail_ukuran' => [
                    'lingkar_dada' => '92 cm',
                    'lingkar_pinggang' => '80 cm',
                    'panjang_jas' => '72 cm',
                    'panjang_lengan' => '60 cm',
                    'lebar_bahu' => '44 cm'
                ]
            ],
            [
                'nama_ukuran' => '48',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'jas',
                'harga_ukuran' => 30000,
                'deskripsi_ukuran' => 'Ukuran 48 untuk jas formal pria',
                'detail_ukuran' => [
                    'lingkar_dada' => '96 cm',
                    'lingkar_pinggang' => '84 cm',
                    'panjang_jas' => '74 cm',
                    'panjang_lengan' => '62 cm',
                    'lebar_bahu' => '46 cm'
                ]
            ],
            [
                'nama_ukuran' => '50',
                'kategori_ukuran' => 'dewasa',
                'jenis_pakaian' => 'jas',
                'harga_ukuran' => 35000,
                'deskripsi_ukuran' => 'Ukuran 50 untuk jas formal pria',
                'detail_ukuran' => [
                    'lingkar_dada' => '100 cm',
                    'lingkar_pinggang' => '88 cm',
                    'panjang_jas' => '76 cm',
                    'panjang_lengan' => '64 cm',
                    'lebar_bahu' => '48 cm'
                ]
            ]
        ];

        foreach ($ukuranJas as $ukuran) {
            Ukuran::create($ukuran);
        }
    }
}