<?php

use App\Http\Controllers\ModuloController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RolxModuloController;
use App\Http\Controllers\RolxUsuarioController;
use App\Models\RolxModulo;
use App\Models\RolxUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/get/users', [RegisterController::class, 'index']);
Route::post('/register/user', [RegisterController::class, 'create']);
Route::put('/update/user/{idusuario}', [RegisterController::class, 'update']);
Route::delete('delete/user/{idusuario}', [RegisterController::class, 'destroy']);

Route::get('/get/roles', [RolController::class, 'index']);
Route::post('/register/rol', [RolController::class, 'create']);
Route::put('/update/rol/{idrol}', [RolController::class, 'update']);
Route::delete('delete/rol/{idrol}', [RolController::class, 'destroy']);

Route::get('/get/modulos', [ModuloController::class, 'index']);
Route::post('/register/modulo', [ModuloController::class, 'create']);
Route::put('/update/modulo/{idmodulo}', [ModuloController::class, 'update']);
Route::delete('delete/modulo/{idmodulo}', [ModuloController::class, 'destroy']);

Route::get('/get/rolxuser', [RolxUsuarioController::class, 'index']);
Route::post('/register/rolxuser', [RolxUsuarioController::class, 'create']);
Route::post('/update/rolxuser', [RolxUsuarioController::class, 'update']);
Route::delete('delete/rolxuser', [RolxUsuarioController::class, 'destroy']);

Route::get('/get/rolxmod', [RolxModuloController::class, 'index']);
Route::post('/register/rolxmod', [RolxModuloController::class, 'create']);
Route::post('/update/rolxmod', [RolxModuloController::class, 'update']);
Route::delete('delete/rolxmod', [RolxModuloController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
