<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenulisAuthController;
use App\Http\Controllers\PenulisController;
use App\Http\Middleware\HasSession;
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

Route::get('/', [GuestController::class, 'index'])->name('landingpage');
Route::get('/read/{id}', [GuestController::class, 'artikel'])->name('artikel');
Route::post('/', [GuestController::class, 'komentar'])->name('komentar');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::prefix('auth')->name('auth.')->group(function () {
        Route::name('login.')->group(function () {
            Route::get('login', [PenulisAuthController::class, 'index'])->name('page');
            Route::post('login', [PenulisAuthController::class, 'login'])->name('submit');
        });
    });



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
        Route::put('', [PenulisController::class, 'update'])->name('put');
        Route::delete('', [PenulisController::class, 'destroy'])->name('delete');
    });

    Route::prefix('komentar')->name('komentar.')->group(function () {
        Route::get('', [KomentarController::class, 'index'])->name('get');
        Route::post('', [KomentarController::class, 'store'])->name('post');
        Route::put('/{id}', [KomentarController::class, 'update'])->name('put');
        Route::delete('/{id}', [KomentarController::class, 'destroy'])->name('delete');
    });
});

Route::prefix('penulis')->name('penulis.')->group(function () {


    Route::prefix('auth')->name('auth.')->group(function () {
        Route::name('login.')->group(function () {
            Route::get('login', [PenulisAuthController::class, 'index'])->name('page');
            Route::post('login', [PenulisAuthController::class, 'login'])->name('submit');
        });

        Route::name('register.')->group(function () {
            Route::get('register', [PenulisAuthController::class, 'registerPage'])->name('page');
            Route::post('register', [PenulisAuthController::class, 'register'])->name('submit');
        });
    });


    Route::middleware(HasSession::class)->group(function () {
        Route::get('/', [PenulisController::class, 'dashboard'])->name('dashboard');
        Route::prefix('artikel')->name('artikel.')->group(function () {
            Route::get('/buat', [PenulisController::class, 'buatArtikel'])->name('buat');
            Route::post('/buat', [ArtikelController::class, 'post'])->name('post');
            Route::get('/{id}/edit', [ArtikelController::class, 'edit'])->name('edit');
            Route::get('/', [ArtikelController::class, 'showMyArtikel'])->name('daftar');
            Route::put('',[ArtikelController::class,'put'])->name('put');
            Route::delete('/',[ArtikelController::class,'delete'])->name('delete');
        });
    });
});
