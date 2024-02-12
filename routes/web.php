<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.depan');
Route::get('/lomba/panduanpendaftaran', [App\Http\Controllers\HomeController::class, 'viewpanduanpdf'])->name('pendaftaran.panduan');
Route::get('/lomba/daftarlomba', [App\Http\Controllers\HomeController::class, 'lomba'])->name('lomba.depan');
Route::get('/lombadetail/${id}', [App\Http\Controllers\HomeController::class, 'lombadetail'])->name('lomba.detailomba');
Route::get('/lomba/pendaftaran', [App\Http\Controllers\HomeController::class, 'pendaftaranlomba'])->name('lomba.pendaftaran');
Route::post('/pendaftaranstore', [App\Http\Controllers\HomeController::class, 'storedaftarpeserta'])->name('pendaftaran.store');
Route::get('/detailpendaftaran/${id}', [App\Http\Controllers\HomeController::class, 'detailpendaftaran'])->name('pendaftaran.detail');
Route::get('/pencarianpendaftar', [App\Http\Controllers\HomeController::class, 'pencarianpendaftar'])->name('pendaftaran.pencarianpendaftar');
Route::post('/caripendaftar', [App\Http\Controllers\HomeController::class, 'caripendaftar'])->name('pendaftaran.caripendaftar');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('users/userlist', [App\Http\Controllers\UserController::class, 'getUser'])->name('userslist');
Route::get('lomba/lombalist', [App\Http\Controllers\LombaController::class, 'getLomba'])->name('lombalist');
Route::get('slider/sliderlist', [App\Http\Controllers\SliderController::class, 'getSlider'])->name('sliderlist');

Route::middleware('auth')->group(function () {
    // User
    Route::resource('/users', App\Http\Controllers\UserController::class);

    // Role
    Route::resource('/manage-roles', App\Http\Controllers\RoleController::class);

    // Role
    Route::resource('/manage-menus', App\Http\Controllers\MenuController::class);
    
    // Peserta -> Livewire
    Route::get('/peserta', [App\Http\Controllers\PesertaController::class, 'index'])->name('peserta');
    Route::get('/peserta/export_excel', [App\Http\Controllers\PesertaController::class, 'export_excel'])->name('peserta.exportexcel');

    // Lomba
    Route::resource('/lomba', App\Http\Controllers\LombaController::class);
    Route::post('/lombaupdate', [App\Http\Controllers\LombaController::class, 'update'])->name('lomba.update');    
    Route::delete('/lombadelete', [App\Http\Controllers\LombaController::class, 'destroy'])->name('lomba.destroy');    

    // Slider
    Route::resource('/slider', App\Http\Controllers\SliderController::class);
    Route::post('/sliderupdate', [App\Http\Controllers\SliderController::class, 'update'])->name('slider.update');    
    Route::delete('/sliderdelete', [App\Http\Controllers\SliderController::class, 'destroy'])->name('slider.destroy');    

    // Qrcode
    Route::resource('/qrcode', App\Http\Controllers\QrcodeController::class);

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
