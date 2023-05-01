<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\motorcontroller;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('frontpage.landingpage', [
        'title' => 'Home',
        'active' => 'Home'
    ]);
});
Route::get('/about', function () {
    return view('frontpage.about', [
        'title' => 'About',
        'active' => 'About'
    ]);
})->name('about');
Route::get('/contak', function () {
    return view('frontpage.contak', [
        'title' => 'Contact',
        'active' => 'Contact'
    ]);
})->name('contak');
Route::get('/motor', function () {
    return view('frontpage.motor', [
        'title' => 'Motors',
        'active' => 'Motors'
    ]);
})->name('motor');
Route::get('/detail', function () {
    return view('frontpage.detail', [
        'title' => 'Detail',
        'active' => 'Detail'
    ]);
})->name('detail');

Route::get('/alert', function () {
    return view('frontpage.tes.alert');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Profile LARAVEL BREZEE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// ADMIN
Route::middleware('auth')->group(function () {
    // transaksi
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/transaksi/{kode_transaksi}/pengembalian', [TransaksiController::class, 'pengembalianForm'])->name('transaksi.pengembalianForm');
    Route::post('/transaksi/{kode_transaksi}/pengembalian', [TransaksiController::class, 'pengembalian'])->name('transaksi.pengembalian');
    Route::get('/transaksi/create/data-transaksi', [TransaksiController::class, 'viewadd'])->name('transaksi.viewadd');
    Route::post('/transaksi/create/data-transaksi', [TransaksiController::class, 'tambah'])->name('transaksi.tambah');

    //Motor
    Route::resource('/motors', MotorController::class);

    // Penyewa
    Route::resource('/penyewa', PenyewaController::class);

    // Pegawai
    // Route::resource('/pegawai', PengawaiController::class);
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    //Pengeluaran
    Route::resource('/pengeluaran', PengeluaranController::class);
    Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
    Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/pengeluarans/create', [PengeluaranController::class, 'create'])->name('pengeluarans.create');
    Route::resource('/pengeluarans', PengeluaranController::class);

});
