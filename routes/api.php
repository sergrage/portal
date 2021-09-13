<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/power-json', [App\Http\Controllers\App\PowerController::class, 'power']);
Route::get('/temperature-json', [App\Http\Controllers\App\TemperatureController::class, 'temperature']);
Route::get('/waterTemperature-json', [App\Http\Controllers\App\TemperatureController::class, 'temperature']);
Route::get('/cgms-json', [App\Http\Controllers\App\TemperatureController::class, 'cgmsJSON']);
Route::get('/reservoir-json', [App\Http\Controllers\App\ReservoirController::class, 'reservoirJSON']);
Route::get('/reservoirCharts', [App\Http\Controllers\App\ReservoirController::class, 'reservoirCharts']);
Route::get('/reservoirVolume', [App\Http\Controllers\App\ReservoirController::class, 'reservoirVolume']);
Route::get('/getCgms', [App\Http\Controllers\App\TemperatureController::class, 'getCgms']);
Route::get('/generation', [App\Http\Controllers\App\GenerationController::class, 'getGeneartion']);
Route::get('/pbrForDay', [App\Http\Controllers\App\GenerationController::class, 'getPbr']);
Route::get('/powerForDay', [App\Http\Controllers\App\GenerationController::class, 'getPower']);
Route::get('/getFuel', [App\Http\Controllers\App\GenerationController::class, 'getFuel']);

Route::apiResource('fuel', App\Http\Controllers\App\FuelController::class);
Route::apiResource('cgms', App\Http\Controllers\App\CgsmController::class);
