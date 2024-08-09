<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/setting', [App\Http\Controllers\Admin\DashboardController::class, 'setting'])->name('setting');
    Route::post('/setting-update', [App\Http\Controllers\Admin\DashboardController::class, 'update'])->name('admin.setting.update');
    
    Route::get('/karyawan', [App\Http\Controllers\Admin\KaryawanController::class, 'index'])->name('admin.karyawan.index');
    Route::get('/add-karyawan', [App\Http\Controllers\Admin\KaryawanController::class, 'add'])->name('admin.karyawan.add');
    Route::post('/create-karyawan', [App\Http\Controllers\Admin\KaryawanController::class, 'create'])->name('admin.karyawan.create');
    Route::get('/edit-karyawan/{id}', [App\Http\Controllers\Admin\KaryawanController::class, 'edit'])->name('admin.karyawan.edit');
    Route::post('/update-karyawan', [App\Http\Controllers\Admin\KaryawanController::class, 'update'])->name('admin.karyawan.update');
    Route::get('/delete-karyawan/{id}', [App\Http\Controllers\Admin\KaryawanController::class, 'delete'])->name('admin.karyawan.delete');
    
    Route::get('/bagian', [App\Http\Controllers\Admin\BagianController::class, 'index'])->name('admin.bagian.index');
    Route::get('/add-bagian', [App\Http\Controllers\Admin\BagianController::class, 'add'])->name('admin.bagian.add');
    Route::post('/create-bagian', [App\Http\Controllers\Admin\BagianController::class, 'create'])->name('admin.bagian.create');
    Route::get('/edit-bagian/{id}', [App\Http\Controllers\Admin\BagianController::class, 'edit'])->name('admin.bagian.edit');
    Route::post('/update-bagian', [App\Http\Controllers\Admin\BagianController::class, 'update'])->name('admin.bagian.update');
    Route::get('/delete-bagian/{id}', [App\Http\Controllers\Admin\BagianController::class, 'delete'])->name('admin.bagian.delete');
    
    Route::get('/absensi', [App\Http\Controllers\Admin\AbsensiController::class, 'index'])->name('admin.absensi.index');
    Route::get('/absensi-me', [App\Http\Controllers\Admin\AbsensiController::class, 'myabsensi'])->name('admin.absensi.myabsensi');
    Route::get('/add-absensi', [App\Http\Controllers\Admin\AbsensiController::class, 'add'])->name('admin.absensi.add');
    Route::post('/create-absensi', [App\Http\Controllers\Admin\AbsensiController::class, 'create'])->name('admin.absensi.create');
    Route::get('/edit-absensi/{id}', [App\Http\Controllers\Admin\AbsensiController::class, 'edit'])->name('admin.absensi.edit');
    Route::post('/update-absensi', [App\Http\Controllers\Admin\AbsensiController::class, 'update'])->name('admin.absensi.update');
    Route::get('/delete-absensi/{id}', [App\Http\Controllers\Admin\AbsensiController::class, 'delete'])->name('admin.absensi.delete');
    
    Route::get('/lembur', [App\Http\Controllers\Admin\LemburController::class, 'index'])->name('admin.lembur.index');
    Route::get('/add-lembur', [App\Http\Controllers\Admin\LemburController::class, 'add'])->name('admin.lembur.add');
    Route::post('/create-lembur', [App\Http\Controllers\Admin\LemburController::class, 'create'])->name('admin.lembur.create');
    Route::get('/edit-lembur/{id}', [App\Http\Controllers\Admin\LemburController::class, 'edit'])->name('admin.lembur.edit');
    Route::post('/update-lembur', [App\Http\Controllers\Admin\LemburController::class, 'update'])->name('admin.lembur.update');
    Route::get('/delete-lembur/{id}', [App\Http\Controllers\Admin\LemburController::class, 'delete'])->name('admin.lembur.delete');
    
    Route::get('/gaji', [App\Http\Controllers\Admin\GajiController::class, 'index'])->name('admin.gaji.index');
    Route::get('/gaji-me', [App\Http\Controllers\Admin\GajiController::class, 'mygaji'])->name('admin.gaji.mygaji');
    Route::get('/edit-gaji/{id}', [App\Http\Controllers\Admin\GajiController::class, 'edit'])->name('admin.gaji.edit');
    Route::post('/update-gaji', [App\Http\Controllers\Admin\GajiController::class, 'update'])->name('admin.gaji.update');
    Route::get('/delete-gaji/{id}', [App\Http\Controllers\Admin\GajiController::class, 'delete'])->name('admin.gaji.delete');
    Route::get('/renew-gaji', [App\Http\Controllers\Admin\GajiController::class, 'renew'])->name('admin.gaji.renew');
});
