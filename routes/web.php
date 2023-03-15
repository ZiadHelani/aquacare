<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/header_image', [HomeController::class, 'headerImage'])->name('header_image');
Route::post('/save_header_image', [HomeController::class, 'saveHeaderImage'])->name('save_header_image');
Route::get('/about_us', [HomeController::class, 'aboutUs'])->name('about_us');
Route::post('/save_about_us/{id}', [HomeController::class, 'saveAboutUs'])->name('save_about_us');
Route::get('test');
