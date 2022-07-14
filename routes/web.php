<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccommodationsController;

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

Route::prefix('/v1/security')->group(function () {

    Route::get('/login', [AuthController::class, 'loginView'])
    ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('authenticate-user');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::prefix('/v1/app')->group(function () {

    Route::get('/dashboard', [AccommodationsController::class, 'dashboardView'])
        ->name('dashboard');

    Route::get('/accommodation/create-new', [AccommodationsController::class, 'createAccomodationView'])
        ->name('create-new-accomodation');
});
