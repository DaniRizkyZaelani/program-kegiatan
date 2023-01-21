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

// Login route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Protected route
Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Bidang route
    Route::get('/bidang', [BidangController::class, 'index'])->name('bidang');
    Route::get('/bidang/create', [BidangController::class, 'create'])->name('bidang.create');
    Route::post('/bidang/store', [BidangController::class, 'store'])->name('bidang.store');
    Route::get('/bidang/{id}/edit', [BidangController::class, 'edit'])->name('bidang.edit');
    Route::delete('/bidang/{id}/delete', [BidangController::class, 'destroy'])->name('bidang.destroy');

    // Users route
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

    //Program Kegiatan route
    Route::get('/prokeg', [ProgramKegiatanController::class, 'index'])->name('prokeg');
    Route::get('/prokeg/create', [ProgramKegiatanController::class, 'create',])->name('prokeg.create');
    Route::post('/prokeg/store', [ProgramKegiatanController::class, 'store'])->name('prokeg.store');
    Route::get('/prokeg/{id}/edit', [ProgramKegiatanController::class, 'edit'])->name('prokeg.edit');
    Route::delete('/prokeg/{id}/delete', [UserController::class, 'destroy'])->name('prokeg.destroy');
});
