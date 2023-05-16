<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::prefix('artikel')->name('artikel.')->group(function () {
        Route::get('', [ArtikelController::class, 'index'])->name('get');
        Route::post('', [ArtikelController::class, 'store'])->name('post');
        Route::put('/{id}', [ArtikelController::class, 'update'])->name('put');
        Route::delete('/{id}', [ArtikelController::class, 'destroy'])->name('delete');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('', [AdminController::class, 'index'])->name('get');
        Route::post('', [AdminController::class, 'store'])->name('post');
        Route::put('/{id}', [AdminController::class, 'update'])->name('put');
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('delete');
    });

    Route::prefix('penulis')->name('penulis.')->group(function () {
        Route::get('', [PenulisController::class, 'index'])->name('get');
        Route::post('', [PenulisController::class, 'store'])->name('post');
        Route::put('/{id}', [PenulisController::class, 'update'])->name('put');
        Route::delete('/{id}', [PenulisController::class, 'destroy'])->name('delete');
    });

    Route::prefix('komentar')->name('komentar.')->group(function () {
        Route::get('', [KomentarController::class, 'index'])->name('get');
        Route::post('', [KomentarController::class, 'store'])->name('post');
        Route::put('/{id}', [KomentarController::class, 'update'])->name('put');
        Route::delete('/{id}', [KomentarController::class, 'destroy'])->name('delete');
    });
});
