<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WaterLevelApiController;

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

Route::post('/water/level', [WaterLevelApiController::class, 'getWaterLevelData']);
Route::post('/water/level/district/list', [WaterLevelApiController::class, 'getWaterLevelDistrictList']);
Route::post('/water/level/district/mainbasin/list', [WaterLevelApiController::class, 'getWaterLevelMainBasinList']);
Route::post('/water/level/district/mainbasin/subbasin/list', [WaterLevelApiController::class, 'getWaterLevelSubBasinList']);