<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\PanduanController;
use App\Http\Controllers\Admin\LapanganController;
use App\Http\Controllers\Admin\PelatihController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KasirController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda bisa mendaftarkan rute-rute web untuk aplikasi Anda.
| Semua rute ini akan dimuat oleh RouteServiceProvider dan semuanya akan
| ditempatkan dalam grup middleware "web". Buatlah yang hebat!
|
*/

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index_user'])->name('dashboard');
});

Route::get('/home', function () {
    return view('user.home');
});

Route::get('/', function () {return view('user.home');
});

Auth::routes();

Route::middleware(['guest'])->group(function () {
    // Rute untuk pengunjung...
});

// Rute untuk event...
Route::get('/events', [\App\Http\Controllers\Auth\EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [\App\Http\Controllers\Auth\EventController::class, 'show'])->name('events.show');

Route::middleware(['auth', 'role:owner'])->group(function () {Route::get('/owner-dashboard', [OwnerController::class, 'index'])->middleware('owner')->name('owner.dashboard');});
Route::get('/owner-dashboard', [OwnerController::class, 'index'])->middleware('owner')->name('owner.dashboard');

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/petugas-dashboard', [PetugasController::class, 'index'])->middleware('petugas')->name('petugas.dashboard');
    Route::get('/petugas/pemesanan', [PetugasController::class, 'reservasi'])->name('petugas.index');
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
Route::get('/kasir-dashboard', [KasirController::class, 'index'])->middleware('kasir')->name('kasir.dashboard');


// Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard')->middleware('role:owner');
// Route::get('/petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.dashboard')->middleware('role:petugas');
// Route::get('/kasir/dashboard', [KasirController::class, 'index'])->name('kasir.dashboard')->middleware('role:kasir');
});

 // Rute untuk admin...
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/dashboard_admin', [HomeController::class, 'index'])->name('dashboard_admin');
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/dashboard_admin', [DashboardController::class, 'index'])->name('dashboard_admin');


// Rute untuk bagian SEO
// Contoh penggunaan routing yang bersih di Laravel
Route::get('/artikel/{slug}', 'ArtikelController@show');


    Route::get('/lapangan', [\App\Http\Controllers\Admin\LapanganController::class, 'index'])->name('lapangan.index')->middleware('role:admin');
    Route::get('/lapangan/create', [\App\Http\Controllers\Admin\LapanganController::class, 'create'])->middleware('role:admin');
    Route::post('/lapangan/store', [\App\Http\Controllers\Admin\LapanganController::class,'store'])->middleware('role:admin');
    Route::get('/lapangan/{id}/update', [\App\Http\Controllers\Admin\LapanganController::class, 'update'])->middleware('role:admin');
    Route::put('/lapangan/{id}', [\App\Http\Controllers\Admin\LapanganController::class, 'edit'])->middleware('role:admin');
    Route::get('/lapangan/{id}/delete', [\App\Http\Controllers\Admin\LapanganController::class, 'delete'])->middleware('role:admin');
    
   
    
    Route::get('/admin/member', [\App\Http\Controllers\Admin\MemberController::class, 'index'])->name('member.admin.index')->middleware('role:admin');
    Route::get('/admin/member/create', [\App\Http\Controllers\Admin\MemberController::class, 'create'])->name('member.admin.create')->middleware('role:admin');
    Route::post('/admin/member/store', [\App\Http\Controllers\Admin\MemberController::class,'store'])->name('member.admin.store')->middleware('role:admin');
    Route::get('/admin/member/{id}/update', [\App\Http\Controllers\Admin\MemberController::class, 'update'])->middleware('role:admin');
    Route::put('/admin/member/{id}', [\App\Http\Controllers\Admin\MemberController::class, 'edit']);
    Route::get('/admin/member/{id}/delete', [\App\Http\Controllers\Admin\MemberController::class, 'delete'])->middleware('role:admin');
    Route::get('/admin/dataMember', [\App\Http\Controllers\Admin\MemberController::class, 'cetak'])->name('member.admin.cetak')->middleware('role:admin');
    Route::get('/admin/member/{id}/nota', [\App\Http\Controllers\Admin\MemberController::class, 'nota'])->middleware('role:admin');
   
    Route::get('/admin/pemesanan', [\App\Http\Controllers\Admin\PemesananController::class, 'index'])->name('pemesanan.admin.index')->middleware('role:admin');
    Route::get('/admin/pemesanan/create', [\App\Http\Controllers\Admin\PemesananController::class, 'create'])->name('pemesanan.admin.create')->middleware('role:admin');
    Route::post('/admin/pemesanan/store', [\App\Http\Controllers\Admin\PemesananController::class,'store'])->name('pemesanan.admin.store')->middleware('role:admin');
    Route::get('/admin/pemesanan/{id}/update', [\App\Http\Controllers\Admin\PemesananController::class, 'update'])->middleware('role:admin');
    Route::put('/admin/pemesanan/{id}', [\App\Http\Controllers\Admin\PemesananController::class, 'edit'])->middleware('role:admin');
    Route::get('/admin/pemesanan/{id}/delete', [\App\Http\Controllers\Admin\PemesananController::class, 'delete'])->middleware('role:admin');
    Route::post('/admin/cetakPemesanan', [\App\Http\Controllers\Admin\PemesananController::class, 'cetak'])->name('cetak')->middleware('role:admin');
    Route::get('/admin/pemesanan/{id}/nota', [\App\Http\Controllers\Admin\PemesananController::class, 'nota'])->middleware('role:admin');

    Route::get('/panduan', [\App\Http\Controllers\Admin\PanduanController::class, 'index'])->name('panduan.index')->middleware('role:admin');
    Route::get('/panduan/create', [\App\Http\Controllers\Admin\PanduanController::class, 'create'])->middleware('role:admin');
    Route::post('/panduan/store', [\App\Http\Controllers\Admin\PanduanController::class,'store'])->middleware('role:admin');
    Route::get('/panduan/{id}/update', [\App\Http\Controllers\Admin\PanduanController::class, 'update'])->middleware('role:admin');
    Route::put('/panduan/{id}', [\App\Http\Controllers\Admin\PanduanController::class, 'edit'])->middleware('role:admin');
    Route::get('/panduan/{id}/delete', [\App\Http\Controllers\Admin\PanduanController::class, 'delete'])->middleware('role:admin');
});
});

// Rute untuk dashboard
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// Rute untuk login dan register
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticating']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Rute untuk pemesanan, kursus, member, autentikasi Google, dll.
Route::get('/pemesanan', [PemesananController::class,'index']);
Route::get('pemesanan/create', [PemesananController::class,'pemesanan'])->name('pemesanan')->middleware('auth');
Route::post('pemesanan', [PemesananController::class,'store'])->name('pemesanan.store');
Route::get('/pemesanan/{id}', [PemesananController::class, 'success'])->name('pemesanan.success');

Route::get('/kursus', [KursusController::class, 'index']);
Route::get('kursus/create', [KursusController::class, 'create'])->name('kursus');
Route::get('kursus/success', [KursusController::class,'success'])->name('kursus.success');
Route::post('/kursus/store', [KursusController::class, 'store'])->name('kursus.store');

Route::get('/member', [MemberController::class, 'index']);
Route::get('member/create', [MemberController::class, 'create'])->name('member');
Route::post('/member/store', [MemberController::class, 'store']);
Route::get('/member/{id}', [MemberController::class, 'success'])->name('member.success');
// Route::get('/member/{id}/success', [MemberController::class, 'success'])->name('member.success');

// // Rute untuk Google Login
// Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']); 

// Rute untuk Google Login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/callback/google', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
Route::post('/callback/google', [RegisterController::class, 'create'])->name('store.akun');
Route::get('/about', function () {
    return view('user.about');
});

Route::get('/transaksi', [\App\Http\Controllers\TransaksiController::class, 'userReservasi']);
Route::get('/transaksi/{id}/nota', [\App\Http\Controllers\TransaksiController::class, 'nota']);
