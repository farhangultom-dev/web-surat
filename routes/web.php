<?php

use Illuminate\Support\Facades\Route;

//landing
use App\Http\Controllers\Landing\LandingController;


//dashboard
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AduanController;
use App\Http\Controllers\Dashboard\AntrianController;
use App\Http\Controllers\Dashboard\AdminDesaController;
use App\Http\Controllers\Dashboard\PengajuanSuratController;
use App\Http\Controllers\Dashboard\WargaDesaController;


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

Route::get('explore', [LandingController::class, 'explore'])->name('explore.landing');
Route::get('detail/{id}', [LandingController::class, 'detail'])->name('detail.landing');
Route::resource('/', LandingController::class);

Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth:sanctum', 'verified']],
function(){
    //dashboard
    Route::resource('dashboard', DashboardController::class);

    //admin desa
    Route::resource('admin_desa', AdminDesaController::class);

    //warga desa
    Route::resource('warga_desa', WargaDesaController::class);

    //aduan
    Route::resource('aduan', AduanController::class);

    //antrian
    Route::resource('admin_desa', AntrianController::class);

    //pengajuan surat
    Route::get('detail/{id}', [PengajuanSuratController::class,'detail'])->name('detail.pengajuan_surat');
    Route::get('approve/{id}', [PengajuanSuratController::class,'approve'])->name('approve.pengajuan_surat');
    Route::get('reject/{id}', [PengajuanSuratController::class,'reject'])->name('reject.pengajuan_surat');
    Route::resource('pengajuan_surat', PengajuanSuratController::class);

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
