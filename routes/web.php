<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Profile LARAVEL BREZEE
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// profile
Route::get('/profile', [ProfileController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::post('/profile', [ProfileController::class, 'change_profile'])->middleware(['auth'])->name('profile.change');

// change password
Route::get('/change-password', [ProfileController::class, 'password'])->middleware(['auth'])->name('change-password');
Route::post('/change-password', [ProfileController::class, 'change_password'])->middleware(['auth'])->name('change-password.change');

require __DIR__ . '/auth.php';


// AUTH
Route::middleware('auth',)->group(function () {
    // Auth Operator
    Route::middleware('operator')->group(function () {
        // Transaksi
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/transaksi/{kode_transaksi}/pengembalian', [TransaksiController::class, 'pengembalianForm'])->name('transaksi.pengembalianForm');
        Route::post('/transaksi/{kode_transaksi}/pengembalian', [TransaksiController::class, 'pengembalian'])->name('transaksi.pengembalian');
        Route::get('/transaksi/create/data-transaksi', [TransaksiController::class, 'viewadd'])->name('transaksi.viewadd');
        Route::post('/transaksi/create/data-transaksi', [TransaksiController::class, 'tambah'])->name('transaksi.tambah');
        Route::get('/motors', [MotorController::class, 'index'])->name('motor.index');
        // Penyewa
        Route::resource('/penyewa', PenyewaController::class);
        // Pengeluaran
        Route::get('/pengeluarans', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
    });

    // Auth Manajer mengelola motor
    Route::middleware('manajer')->group(function () {
        Route::resource('/motor', MotorController::class);
        // Pengeluaran
        Route::resource('/pengeluaran', PengeluaranController::class);
    });

    // Auth Owner & manajer kelola pegawai
    Route::middleware(['manajer',])->group(function () {
        Route::resource('/pegawai', UserController::class);
    });

    // Auth Owner/Pemilik
    Route::middleware('owner')->group(function () {
        Route::patch('/pegawai/{id}/update-status', [UserController::class, 'statusPegawai'])->name('pegawai.statusPegawai');
        Route::patch('/pegawai/{id}/update', [UserController::class, 'statusNonAktif'])->name('pegawai.statusNonAktif');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});


// Frontpage Rental Motor
Route::get('/view-motor', [FrontPageController::class, 'viewMotor'])->name('frontpage.motors');
Route::get('/', [FrontPageController::class, 'viewHome'])->name('frontpage.home');
