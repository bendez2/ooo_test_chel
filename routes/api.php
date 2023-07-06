<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentTypeController;
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

Route::prefix('equipment')->group(function () {
    Route::get('/', [EquipmentController::class, 'index']);
    Route::get('/{id}', [EquipmentController::class, 'get']);
    Route::put('/{equipment}', [EquipmentController::class, 'update']);
    Route::post('/', [EquipmentController::class, 'create']);


});


Route::prefix('equipment-type')->group(function () {
    Route::get('/', [EquipmentTypeController::class, 'index']);
});
