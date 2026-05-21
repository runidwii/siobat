<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\ObatSampahController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PermintaanController;


Route::resource('obat', ObatController::class);
Route::resource('pemakaian', PemakaianController::class);
Route::resource('obat-sampah', ObatSampahController::class);
Route::resource('penerimaan', PenerimaanController::class);
Route::resource('permintaan', PermintaanController::class);
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');