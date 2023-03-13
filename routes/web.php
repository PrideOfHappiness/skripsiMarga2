<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('auth/login');
});

Auth::routes();

Route::middleware(['auth', 'user-status:user'])->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-status:karyawan'])->group(function()
{
    Route::get('/karyawan/home', [HomeController::class, 'karyawanHome'])->name('karyawan.dashboard');
});

Route::middleware(['auth', 'user-status:admin'])->group(function()
{
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.dashboard');
});

Route::middleware(['auth', 'user-status:pemilik'])->group(function()
{
    Route::get('/pemilik/home', [HomeController::class, 'pemilikHome'])->name('pemilik.dashboard');
});
