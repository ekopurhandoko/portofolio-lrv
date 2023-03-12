<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//sudah login dan belum logout teteap berada di dashboard
Route::redirect('home','dashboard');

//kehalaman index dan cek sudah login atau belum
Route::get('/auth',[authController::class,"index"])->name('login')->middleware('guest');

//halaman autentikasi
Route::get('/auth/redirect',[authController::class,"redirect"])->middleware('guest');

//kehalaman callback
Route::get('/auth/callback',[authController::class,"callback"])->middleware('guest');

//kehalaman dasboard
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

//logout
Route::get('/auth/logout',[authController::class,"logout"]);
