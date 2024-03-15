<?php

use App\Http\Controllers\Admin\AbsenController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Riwayat\RiwayatController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Auth\CodeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RedirectController;


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

// Route::get('/', function () {
//     return view('login');
// });


Route::get('/logout', [LoginController::class, 'logout']);

// Auth::routes();

Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [LoginController::class, 'view_login'])->name("login");
    Route::post('/login', [LoginController::class, 'postlogin']);    
});

Route::group(['middleware' => ['auth', 'cekrole:admin,pj,asisten']], function() {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/redirect', [redirectController::class, 'cek']);
    Route::resource('/dashboard', AdminController::class);
    Route::resource('/absen', AbsenController::class);
    // Route::post('/absen', [App\Http\Controllers\Admin\AbsenController::class, 'store'])->name('absen.store');
    // Route::resource('/generate-code', CodeController::class);
    Route::get('/riwayat-absen', [App\Http\Controllers\Riwayat\RiwayatController::class, 'create'])->name('riwayat-absen.create');
    // Route::resource('/riwayat', RiwayatController::class);
});

Route::group(['middleware' => ['auth', 'cekrole:pj,admin']], function() {
    Route::resource('/generate-code', CodeController::class);

    // Route::get('/riwayat-absen', [App\Http\Controllers\Riwayat\RiwayatController::class, 'create'])->name('riwayat.create');
    // Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    // Route::post('/dashboard/store', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('dashboard.store');
    // Route::resource('/dashboard', AdminController::class);
    // Route::resource('/generate-code', CodeController::class);
    // Route::post('/generate', [CodeController::class, 'store']);
});

Route::group(['middleware' => ['auth', 'cekrole:admin']], function() {
    // Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/dataasisten', [App\Http\Controllers\Admin\AsistenController::class, 'index'])->name('dataasisten');
    Route::post('posts/store', [App\Http\Controllers\Admin\AsistenController::class, 'store'])->name('posts.store');
    Route::put('dataasisten/{post}', [App\Http\Controllers\Admin\AsistenController::class, 'update'])->name('dataasisten.update');
    Route::delete('dataasisten/{post}', [App\Http\Controllers\Admin\AsistenController::class, 'destroy'])->name('dataasisten.destroy');
    Route::resource('/datakelas', KelasController::class);
    Route::resource('/datamateri', MateriController::class);
    Route::get('/riwayat', [App\Http\Controllers\Riwayat\RiwayatController::class, 'index'])->name('riwayat.index');

});

Route::group(['middleware' => ['auth', 'cekrole:pj']], function() {
    // Route::get('/generate', [App\Http\Controllers\PJ\PjController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'cekrole:asisten']], function() {
    // Route::get('/absen', [App\Http\Controllers\Asisten\AsistenController::class, 'index']);
});
