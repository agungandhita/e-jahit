<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        return view('frontend.beranda.index');
    }

    /**
     * Display about us page
     */
    public function about()
    {
        return view('frontend.about.index');
    }

    /**
     * Display services page
     */
    public function services()
    {
        $services = [
            [
                'name' => 'Baju Pengantin',
                'description' => 'Jahit baju pengantin custom sesuai keinginan dengan detail yang sempurna',
                'image' => 'pengantin.jpg',
                'price_range' => 'Rp 2.000.000 - Rp 10.000.000'
            ],
            [
                'name' => 'Seragam Sekolah',
                'description' => 'Jahit seragam sekolah berkualitas dengan bahan terbaik',
                'image' => 'seragam.jpg',
                'price_range' => 'Rp 150.000 - Rp 300.000'
            ],
            [
                'name' => 'Baju Kerja',
                'description' => 'Jahit baju kerja formal dan casual sesuai kebutuhan profesi',
                'image' => 'kerja.jpg',
                'price_range' => 'Rp 200.000 - Rp 500.000'
            ],
            [
                'name' => 'Kebaya',
                'description' => 'Jahit kebaya tradisional dan modern dengan detail bordir yang indah',
                'image' => 'kebaya.jpg',
                'price_range' => 'Rp 500.000 - Rp 2.000.000'
            ],
            [
                'name' => 'Gamis',
                'description' => 'Jahit gamis syari dengan berbagai model dan bahan pilihan',
                'image' => 'gamis.jpg',
                'price_range' => 'Rp 200.000 - Rp 800.000'
            ],
            [
                'name' => 'Jas & Blazer',
                'description' => 'Jahit jas dan blazer formal dengan cutting yang presisi',
                'image' => 'jas.jpg',
                'price_range' => 'Rp 400.000 - Rp 1.500.000'
            ],
            [
                'name' => 'Baju Anak',
                'description' => 'Jahit baju anak dengan model lucu dan bahan yang aman',
                'image' => 'anak.jpg',
                'price_range' => 'Rp 100.000 - Rp 300.000'
            ]
        ];

        return view('frontend.services.index', compact('services'));
    }

    /**
     * Display gallery page
     */
    public function gallery()
    {
        $portfolios = [
            [
                'title' => 'Baju Pengantin Adat Jawa',
                'category' => 'pengantin',
                'image' => 'portfolio1.jpg',
                'description' => 'Baju pengantin adat Jawa dengan detail payet dan bordir emas'
            ],
            [
                'title' => 'Seragam Kantor',
                'category' => 'kerja',
                'image' => 'portfolio2.jpg',
                'description' => 'Seragam kantor dengan cutting modern dan bahan berkualitas'
            ],
            [
                'title' => 'Kebaya Modern',
                'category' => 'kebaya',
                'image' => 'portfolio3.jpg',
                'description' => 'Kebaya modern dengan sentuhan kontemporer'
            ]
        ];

        return view('frontend.gallery.index', compact('portfolios'));
    }

    /**
     * Display testimonials page
     */
    public function testimonials()
    {
        $testimonials = [
            [
                'name' => 'Siti Aminah',
                'service' => 'Baju Pengantin',
                'rating' => 5,
                'comment' => 'Hasil jahitan sangat memuaskan! Detail dan kualitasnya luar biasa. Terima kasih sudah membuat hari pernikahan saya sempurna.',
                'image' => 'customer1.jpg'
            ],
            [
                'name' => 'Budi Santoso',
                'service' => 'Jas Kantor',
                'rating' => 5,
                'comment' => 'Jas yang dijahit sangat pas dan berkualitas. Pelayanannya juga ramah dan profesional.',
                'image' => 'customer2.jpg'
            ],
            [
                'name' => 'Dewi Sartika',
                'service' => 'Kebaya',
                'rating' => 5,
                'comment' => 'Kebaya yang dijahit sangat cantik dan sesuai dengan keinginan. Recommended banget!',
                'image' => 'customer3.jpg'
            ]
        ];

        return view('frontend.testimonials.index', compact('testimonials'));
    }

    /**
     * Display contact page
     */
    public function contact()
    {
        return view('frontend.contact.index');
    }

    /**
     * Handle contact form submission
     */
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string',
            'message' => 'required|string'
        ]);

        // Here you can add logic to save to database or send email
        // For now, we'll just redirect back with success message

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Kami akan menghubungi Anda segera.');
    }
}
