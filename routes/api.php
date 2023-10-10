<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PropertiesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/brokers', [BrokersController::class, 'index'])->name('brokers.index');
Route::get('/brokers/{broker}', [BrokersController::class, 'show'])->name('brokers.show');
Route::get('/properties', [PropertiesController::class, 'index'])->name('property.index');
Route::get('/properties/{property}', [PropertiesController::class, 'show'])->name('property.show');


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/brokers', BrokersController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('/properties', PropertiesController::class)->only(['store', 'update', 'destroy']);
    Route::post('/logout', [AuthController::class, 'Logout']);
});
