<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Http;
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
Route::middleware(['auth'])->group(function () {
Route::get('/', [LoginController::class, 'show_users'])->name('usuarios');
Route::get('/roles', [LoginController::class, 'show_roles'])->name('roles');
Route::get('/modulos', [LoginController::class, 'show_modulos'])->name('modulos');
});
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login/check', [LoginController::class, 'store'])->name('login.check');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');