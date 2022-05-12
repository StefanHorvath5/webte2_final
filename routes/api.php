<?php

use App\Http\Controllers\OctaveController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api.key')->group(function () {

    // Route::get('/statistics', [LocationController::class, "index"])->name("statistics");

    Route::get('/octave', [OctaveController::class, "execQuery"])->name("execQuery");
    // Route::get("octave", function (Request $request) {
    //     return "Hi";
    // })->name("execQuery");
});
