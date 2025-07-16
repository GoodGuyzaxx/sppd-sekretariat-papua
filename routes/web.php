<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasubagController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SekretarisController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/redirect', [RedirectController::class, 'cek']);

    // Dashboard redirect route
    Route::get('/dashboard', [RedirectController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'checkrole:1'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    //CRUD AKUN
    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/destroy/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');

    //CURD Data Pegawai
    Route::get('/admin/pegawai', [PegawaiController::class, 'index'])->name('admin.pegawai.index');
    Route::get('/admin/pegawai/create', [PegawaiController::class, 'create'])->name('admin.pegawai.create');
    Route::post('/admin/pegawai/store', [PegawaiController::class, 'store'])->name('admin.pegawai.store');
    Route::get('/admin/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('admin.pegawai.edit');
    Route::put('/admin/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('admin.pegawai.update');
    Route::delete('/admin/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('admin.pegawai.destroy');
});

Route::middleware(['auth', 'checkrole:2'])->group(function () {
    Route::get('/sekretaris', [SekretarisController::class, 'index'])->name('sekre.dashboard');
    // Add other sekretaris routes here
    Route::get('/sekretaris/sppd', [SppdController::class, 'index'])->name('sekretaris.sppd.index');
});

Route::middleware(['auth', 'checkrole:3'])->group(function () {
    Route::get('/kasubag', [KasubagController::class, 'index'])->name('kasubag.dashboard');
    // Add other kasubag routes here
});

Route::middleware(['auth', 'checkrole:4'])->group(function () {
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.dashboard');
    // Add other staff routes here

    Route::get('/staff/sppd', [SppdController::class, 'index'])->name("staff.sppd.index");
    Route::get('/staff/sppd/create', [SppdController::class, 'create'])->name('staff.sppd.create');
    Route::post('/staff/sppd/store', [SppdController::class, 'store'])->name('staff.sppd.store');
    Route::get('/staff/sppd/show/{id}', [SppdController::class, 'show'])->name('staff.sppd.show');
    Route::get('/staff/sppd/edit/{id}', [SppdController::class, 'edit'])->name('staff.sppd.edit');
    Route::put('staff/sppd/update/{id}', [SppdController::class, 'update'])->name('staff.sppd.update');
    Route::delete('staff/sppd/delete/{sppd}', [SppdController::class, 'destroy'])->name('staff.sppd.destroy');
    Route::get('/staff/sppd/pdf/{id}', [SppdController::class, 'getSppdPdf'])->name('staff.sppd.pdf');
});
