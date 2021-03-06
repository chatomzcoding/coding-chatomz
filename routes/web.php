<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Aplikasi\AksiController;
use App\Http\Controllers\Aplikasi\AplikasiController;
use App\Http\Controllers\Aplikasi\FiturController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('admin',[HomeController::class,'index']);

    Route::resource('aplikasi',AplikasiController::class);
    Route::resource('fitur',FiturController::class);
    Route::resource('aksi',AksiController::class);
});
