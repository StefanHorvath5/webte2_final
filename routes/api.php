<?php

use App\Http\Controllers\OctaveController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\MailController;
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

    Route::post('/octave', [OctaveController::class, "execQuery"])->name("execQuery");
    Route::get('/octaveAnimation', [OctaveController::class, "animationQuery"])->name("animationQuery");

    Route::get('/CSV', [CSVController::class, 'getCSV'])->name('CSV');

    Route::post('/mail', [MailController::class, 'mailSend'])->name('mailSend');
    
    // Route::get('/instructions', function () { return view('instructions'); })->name('instructions');

    // Route::get('/logs', function () { return view('logs'); })->name('logs');



    // Route::get("octave", function (Request $request) {
    //     return "Hi";
    // })->name("execQuery");
});
