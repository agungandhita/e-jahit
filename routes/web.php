<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\KatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Frontend\PesananController as FrontendPesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/layanan', [\App\Http\Controllers\Frontend\LayananController::class, 'index'])->name('services');


// Gallery routes
Route::get('/galeri', [KatalogController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{id}', [KatalogController::class, 'show'])->name('gallery.detail');
Route::get('/galeri/filter/kategori', [KatalogController::class, 'filterByCategory'])->name('gallery.filter');

Route::get('/testimoni', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [HomeController::class, 'contactSubmit'])->name('contact.submit');

// Pesanan Routes (Frontend)
Route::middleware(['auth'])->group(function () {
    Route::get('/pesanan', [FrontendPesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/buat/{layanan_id}', [FrontendPesananController::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan', [FrontendPesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/{id}', [FrontendPesananController::class, 'show'])->name('pesanan.show');
    Route::get('/pesanan/{id}/pembayaran', [FrontendPesananController::class, 'payment'])->name('pesanan.payment');
    Route::post('/pesanan/{id}/upload-pembayaran', [FrontendPesananController::class, 'uploadPayment'])->name('pesanan.upload-payment');
    Route::patch('/pesanan/{id}/batal', [FrontendPesananController::class, 'cancel'])->name('pesanan.cancel');
    Route::post('/pesanan/estimasi-harga', [FrontendPesananController::class, 'getPriceEstimation'])->name('pesanan.price-estimation');
    
    // Profile Routes
    Route::get('/profil', [\App\Http\Controllers\Frontend\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profil', [\App\Http\Controllers\Frontend\ProfileController::class, 'update'])->name('profile.update');
});

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');

    // User Management Routes
    Route::resource('users', UserController::class, ['as' => 'admin']);
    Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');

    // Produk Management Routes
    Route::resource('produk', ProdukController::class, ['as' => 'admin']);
    Route::patch('produk/{produk}/toggle-status', [ProdukController::class, 'toggleStatus'])->name('admin.produk.toggle-status');
    Route::delete('produk-foto/{foto}', [ProdukController::class, 'deleteFoto'])->name('admin.produk.delete-foto');
    Route::patch('produk-foto/{foto}/set-primary', [ProdukController::class, 'setPrimaryFoto'])->name('admin.produk.set-primary-foto');

    // Layanan Management Routes
    Route::resource('layanan', LayananController::class, ['as' => 'admin']);
    Route::patch('layanan/{layanan}/toggle-status', [LayananController::class, 'toggleStatus'])->name('admin.layanan.toggle-status');

    // Pesanan Management Routes
    Route::resource('pesanan', PesananController::class, ['as' => 'admin']);
    Route::patch('pesanan/{pesanan}/update-status', [PesananController::class, 'updateStatus'])->name('admin.pesanan.update-status');
    Route::patch('pesanan/{pesanan}/konfirmasi-pembayaran', [PesananController::class, 'konfirmasiPembayaran'])->name('admin.pesanan.konfirmasi-pembayaran');
    Route::patch('pesanan/{pesanan}/tolak-pembayaran', [PesananController::class, 'tolakPembayaran'])->name('admin.pesanan.tolak-pembayaran');
    Route::patch('pesanan/{pesanan}/update-harga', [PesananController::class, 'updateHarga'])->name('admin.pesanan.update-harga');
    Route::post('pesanan/bulk-action', [PesananController::class, 'bulkAction'])->name('admin.pesanan.bulk-action');
    Route::get('pesanan/export', [PesananController::class, 'export'])->name('admin.pesanan.export');

});
