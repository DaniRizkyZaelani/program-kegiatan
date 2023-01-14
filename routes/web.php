<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProgramKegiatanController;
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

Route::get('/', function () {
    return view('welcome');
});

// Users route
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//Program Kegiatan route
Route::get('/prokeg', [ProgramKegiatanController::class, 'index'])->name('prokeg');
Route::get('/prokeg/create', [ProgramKegiatanController::class, 'create'])->name('prokeg.create');
Route::post('/prokeg', [ProgramKegiatanController::class, 'store'])->name('prokeg.store');
// Login route
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
