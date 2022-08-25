<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PPTKController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MurniController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UraianController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\SubkegiatanController;

Route::get('/', [LoginController::class, 'showlogin'])->name('login');
Route::get('/login', [LoginController::class, 'showlogin']);
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('beranda', [BerandaController::class, 'index']);
    Route::get('skpd', [SkpdController::class, 'index']);
    Route::get('skpd/createakun/{id}', [SkpdController::class, 'createakun']);
    Route::get('skpd/resetakun/{id}', [SkpdController::class, 'resetakun']);
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('berandaskpd', [BerandaController::class, 'admin']);

    Route::get('berandaskpd/murni', [BerandaController::class, 'setMurni']);
    Route::get('berandaskpd/pergeseran', [BerandaController::class, 'setPergeseran']);
    Route::get('berandaskpd/perubahan', [BerandaController::class, 'setPerubahan']);
    Route::get('berandaskpd/realisasi', [BerandaController::class, 'setRealisasi']);

    Route::get('skpd/bidang', [BidangController::class, 'index']);
    Route::get('skpd/bidang/add', [BidangController::class, 'create']);
    Route::post('skpd/bidang/add', [BidangController::class, 'store']);
    Route::get('skpd/bidang/edit/{id}', [BidangController::class, 'edit']);
    Route::post('skpd/bidang/edit/{id}', [BidangController::class, 'update']);
    Route::get('skpd/bidang/delete/{id}', [BidangController::class, 'delete']);

    Route::get('skpd/bidang/createuser/{id}', [BidangController::class, 'createuser']);
    Route::post('skpd/bidang/createuser/{id}', [BidangController::class, 'storeuser']);


    Route::get('skpd/bidang/resetpass/{id}', [BidangController::class, 'resetpass']);
});

Route::group(['middleware' => ['auth', 'role:bidang']], function () {
    Route::get('berandabidang', [BerandaController::class, 'bidang']);
    Route::get('berandabidang/tahun', [PencarianController::class, 'bTahun']);

    Route::get('skpd/bidang/pptk', [PPTKController::class, 'index']);
    Route::get('skpd/bidang/pptk/add', [PPTKController::class, 'create']);
    Route::post('skpd/bidang/pptk/add', [PPTKController::class, 'store']);
    Route::get('skpd/bidang/pptk/edit/{id}', [PPTKController::class, 'edit']);
    Route::post('skpd/bidang/pptk/edit/{id}', [PPTKController::class, 'update']);
    Route::get('skpd/bidang/pptk/delete/{id}', [PPTKController::class, 'delete']);

    Route::get('skpd/bidang/program', [ProgramController::class, 'index']);
    Route::get('skpd/bidang/program/add', [ProgramController::class, 'create']);
    Route::post('skpd/bidang/program/add', [ProgramController::class, 'store']);
    Route::get('skpd/bidang/program/edit/{id}', [ProgramController::class, 'edit']);
    Route::post('skpd/bidang/program/edit/{id}', [ProgramController::class, 'update']);
    Route::get('skpd/bidang/program/delete/{id}', [ProgramController::class, 'delete']);

    Route::get('skpd/bidang/program/kegiatan/{id}', [KegiatanController::class, 'kegiatanById']);
    Route::get('skpd/bidang/program/kegiatan/{id}/add', [KegiatanController::class, 'create']);
    Route::post('skpd/bidang/program/kegiatan/{id}/add', [KegiatanController::class, 'store']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/edit/{kegiatan_id}', [KegiatanController::class, 'edit']);
    Route::post('skpd/bidang/program/kegiatan/{program_id}/edit/{kegiatan_id}', [KegiatanController::class, 'update']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/delete/{kegiatan_id}', [KegiatanController::class, 'delete']);

    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}', [SubkegiatanController::class, 'subById']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/add', [SubkegiatanController::class, 'create']);
    Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/add', [SubkegiatanController::class, 'store']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/edit/{sub_id}', [SubkegiatanController::class, 'edit']);
    Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/edit/{sub_id}', [SubkegiatanController::class, 'update']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/delete/{sub_id}', [SubkegiatanController::class, 'delete']);

    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}', [UraianController::class, 'index']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/add', [UraianController::class, 'create']);
    Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/add', [UraianController::class, 'store']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/edit/{uraian_id}', [UraianController::class, 'edit']);
    Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/edit/{uraian_id}', [UraianController::class, 'update']);
    Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/uraian/{subkegiatan_id}/delete/{uraian_id}', [UraianController::class, 'delete']);

    Route::get('murni/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [MurniController::class, 'create']);
    Route::post('murni/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [MurniController::class, 'store']);

    Route::get('realisasi/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [RealisasiController::class, 'create']);
    Route::post('realisasi/{program_id}/{kegiatan_id}/{subkegiatan_id}/{uraian_id}', [RealisasiController::class, 'store']);

    Route::get('excel/sp/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'suratpengantar']);
    Route::get('excel/rfk/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'rfk']);
    Route::get('excel/fiskeu/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'fiskeu']);
    Route::get('excel/input/{program_id}/{kegiatan_id}/{subkegiatan_id}', [ExcelController::class, 'input']);
    // Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/realisasi/{subkegiatan_id}', [SubkegiatanController::class, 'realisasi']);
    // Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/realisasi/{subkegiatan_id}', [SubkegiatanController::class, 'storerealisasi']);

    // Route::get('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/perubahan/{subkegiatan_id}', [SubkegiatanController::class, 'perubahan']);
    // Route::post('skpd/bidang/program/kegiatan/{program_id}/sub/{kegiatan_id}/perubahan/{subkegiatan_id}', [SubkegiatanController::class, 'storeperubahan']);
});

Route::group(['middleware' => ['auth', 'role:superadmin|admin|bidang']], function () {
    Route::get('/logout', [LogoutController::class, 'logout']);
});
