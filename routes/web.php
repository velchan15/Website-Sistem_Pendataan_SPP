<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/forgot_password', [ForgotPasswordController::class, 'index'])->name('forgot_password');
Route::get('/reset_password', [ResetPasswordController::class, 'index'])->name('reset_password');
Route::get('/register', [RegisterController::class, 'index'])->name('register');


Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('/siswa', SiswaController::class);

Route::resource('/pembayaran', PembayaranController::class);

Route::resource('/tagihan', TagihanController::class);

Route::resource('/tabungan', TabunganController::class);

Route::resource('/tunggakan', TunggakanController::class);

Route::get('/admin/dashboard', [DashboardController::class, 'admin']);

Route::get('/petugas/dashboard', [DashboardController::class, 'petugas']);

Route::get('/siswa2/dashboard', [DashboardController::class, 'siswa']);