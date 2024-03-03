<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\AppropriaterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
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
        Route::get('/home', [AnnounceController::class, 'index'])->name('home');
        Route::resource('reservation', ReservationController::class);
        Route::get('/profile' ,[ReservationController::class, 'index'])->name('profile');
});

//middleware for normal Admin
Route::middleware(['auth', 'user-access:appropriater'])
    ->group( function (){
        Route::get('appropriater', [AppropriaterController::class, 'appropriaterDashboard'])->name('appropriate.dashboard');
        Route::get('apropriater/profile', [AppropriaterController::class, 'profilePage'])->name('apropriater.profile');
//        Route::get('apropriater/announce', [AnnounceController::class, 'index'])->name('apropriater.announce');
        Route::resource('announce', AnnounceController::class);

    });

// web.php
Route::get('/announcements',[ AnnounceController::class, 'index'])->name('announcements.index');
