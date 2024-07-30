<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehicleController;

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


Route::post('/fetch-vehicle-info', [VehicleController::class, 'fetchVehicleInfo']);
Route::post('/fetch-kadaster', [VehicleController::class, 'fetchKadaster']);
Route::post('/fetch-driver-license', [VehicleController::class, 'fetchDriverLicense']);


