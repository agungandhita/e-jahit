<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('auth.Login.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Silakan periksa kembali email dan password Anda.');
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            Alert::success('Berhasil!', 'Selamat datang, ' . $user->name . '!');
            
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin');
            }
            
            return redirect()->intended('/');
        }

        Alert::error('Error', 'Email atau password salah.');
        return back();
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Berhasil!', 'Anda telah keluar dari sistem.');
        return redirect()->route('login');
    }
}
