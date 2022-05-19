<?php

use App\Http\Controllers\OctaveController;
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
    return view('welcome')->with("secondLanguage", App::getLocale() == "en" ? "SK" : "EN");
})->middleware(["language"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/changeLang/{lang}', function ($lang) {
    session()->put('applocale', strtolower($lang));
    App::setLocale(strtolower($lang));
    return Redirect::back();
})->name("changeLang");

require __DIR__ . '/auth.php';
