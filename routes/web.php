<?php

use App\Http\Controllers\OctaveController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome')->with("secondLanguage", App::getLocale() == "en" ? "SK" : "EN")->with("currentLanguage", App::getLocale() == "en" ? "EN" : "SK");
})->middleware(["language"])->name("welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/changeLang/{lang}', function ($lang) {
    session()->put('applocale', strtolower($lang));
    App::setLocale(strtolower($lang));
    return Redirect::back();
})->name("changeLang");

Route::get('/downloadPDF', [PDFController::class, 'downloadPDF'])->name('downloadPDF');


Route::get('/instructions', function () {
    return view('instructions')->with("secondLanguage", App::getLocale() == "en" ? "SK" : "EN")->with("currentLanguage", App::getLocale() == "en" ? "EN" : "SK");
})->middleware(["language"])->name('instructions');

Route::get('/documentation', function () {
    return view('documentation')->with("secondLanguage", App::getLocale() == "en" ? "SK" : "EN")->with("currentLanguage", App::getLocale() == "en" ? "EN" : "SK");
})->middleware(["language"])->name('documentation');

Route::get('/logs', function () {
    return view('logs')->with("secondLanguage", App::getLocale() == "en" ? "SK" : "EN")->with("currentLanguage", App::getLocale() == "en" ? "EN" : "SK");
})->middleware(["language"])->name('logs');

require __DIR__ . '/auth.php';
