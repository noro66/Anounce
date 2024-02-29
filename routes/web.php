<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\AppropriaterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function (){
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//middleware for normal user
Route::middleware(['auth', 'user-access:user'])
    ->group( function (){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//middleware for normal Admin
Route::middleware(['auth', 'user-access:appropriater'])
    ->group( function (){
        Route::get('appropriater', [HomeController::class, 'appropriaterHome'])->name('apropriater.dashboard');
        Route::get('apropriater/profile', [AppropriaterController::class, 'profilePage'])->name('apropriater.profile');
        Route::get('apropriater/announce', [AnnounceController::class, 'index'])->name('apropriater.announce');
});
