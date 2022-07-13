<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaseController;

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
});


Route::prefix('/v1/app')->group(function () {

    Route::get('/dashboard', [LeaseController::class, 'dashboardView'])
        ->name('dashboard');
});
