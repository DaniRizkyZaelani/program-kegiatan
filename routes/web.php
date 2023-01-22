<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProgramKegiatanController;
use App\Models\ProgramKegiatan;

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
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name(
    'login.authenticate'
);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name(
    'register.create'
);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected route Admin, Mahasiswa, Dekan
Route::group(
    ['middleware' => ['auth', 'checkrole:admin,mahasiswa,dekan']],
    function () {
        // Dashboard route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name(
            'dashboard'
        );

        //Program Kegiatan route
        Route::get('/prokeg', [
            ProgramKegiatanController::class,
            'index',
        ])->name('prokeg');
        Route::get('/prokeg/cari', [
            ProgramKegiatanController::class,
            'cari',
        ])->name('prokeg.cari');
    }
);

// Protected route Admin, Dekan
Route::group(['middleware' => ['auth', 'checkrole:admin,dekan']], function () {
    // Bidang route
    Route::get('/bidang', [BidangController::class, 'index'])->name('bidang');
    Route::get('/bidang/cari', [BidangController::class, 'cari'])->name(
        'bidang.cari'
    );
    Route::get('/bidang/create', [BidangController::class, 'create'])->name(
        'bidang.create'
    );
    Route::post('/bidang/store', [BidangController::class, 'store'])->name(
        'bidang.store'
    );
    Route::get('/bidang/{id}/edit', [BidangController::class, 'edit'])->name(
        'bidang.edit'
    );
    Route::delete('/bidang/{id}/delete', [
        BidangController::class,
        'destroy',
    ])->name('bidang.destroy');

    //show route
    Route::get('/prokeg/showpending', [
        ProgramKegiatanController::class,
        'showpending',
    ])->name('prokeg.showpending');
    Route::get('/prokeg/showsuccess', [
        ProgramKegiatanController::class,
        'showsuccess',
    ])->name('prokeg.showsuccess');

    // Kegiatan route
    Route::get('/prokeg/{id}/approved', [
        ProgramKegiatanController::class,
        'approve',
    ])->name('kegiatan.approve');
    Route::get('/prokeg/{id}/rejected', [
        ProgramKegiatanController::class,
        'reject',
    ])->name('kegiatan.reject');
});

// Protected route Admin, Mahasiswa
Route::group(
    ['middleware' => ['auth', 'checkrole:admin,mahasiswa']],
    function () {
        //Program Kegiatan route
        Route::get('/prokeg/create', [
            ProgramKegiatanController::class,
            'create',
        ])->name('prokeg.create');
        Route::post('/prokeg/store', [
            ProgramKegiatanController::class,
            'store',
        ])->name('prokeg.store');
    }
);

// Protected route Admin
Route::group(['middleware' => ['auth', 'checkrole:admin']], function () {
    // Users route
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name(
        'users.create'
    );
    Route::post('/users/store', [UserController::class, 'store'])->name(
        'users.store'
    );
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name(
        'users.edit'
    );
    Route::delete('/users/{id}/delete', [
        UserController::class,
        'destroy',
    ])->name('users.destroy');

    //Program Kegiatan route
    Route::get('/prokeg/{id}/edit', [
        ProgramKegiatanController::class,
        'edit',
    ])->name('prokeg.edit');
    Route::delete('/prokeg/{id}/delete', [
        ProgramKegiatanController::class,
        'destroy',
    ])->name('prokeg.destroy');
});
