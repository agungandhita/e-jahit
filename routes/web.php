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
});
