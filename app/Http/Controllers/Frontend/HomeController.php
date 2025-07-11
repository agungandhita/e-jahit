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

    /**
     * Display testimonials page
     */
    public function testimonials()
    {
        return view('frontend.testimonials.index');
    }
}
