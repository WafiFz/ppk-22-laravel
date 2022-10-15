<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\SampahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Login Register User & Admin
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/registerAdmin', [AdminController::class, 'register']);
Route::post('/loginAdmin', [AdminController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/logoutAdmin', [AdminController::class, 'logout']);

    // Pupuk 
    Route::post('/v2pupuk', [PupukController::class, 'create']);
    Route::get('/v2pupuk', [PupukController::class, 'view']);
    Route::get('/v2pupuk', [PupukController::class, 'view']);
    Route::get('/v2pupuk/{id}', [PupukController::class, 'viewByID']);
    Route::put('/v2pupuk/{id}', [PupukController::class, 'updateByID']);
    Route::delete('/v2pupuk/{id}', [PupukController::class, 'deleteByID']);

    // Sampah
    Route::post('/v2sampah', [SampahController::class, 'create']);
    Route::get('/v2sampah', [SampahController::class, 'view']);
    Route::get('/v2sampah', [SampahController::class, 'view']);
    Route::get('/v2sampah/{id}', [SampahController::class, 'viewByID']);
    Route::put('/v2sampah/{id}', [SampahController::class, 'updateByID']);
    Route::delete('/v2sampah/{id}', [SampahController::class, 'deleteByID']);
});
