<?php

use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
//DASHBOARD
Route::get('dashboard/index', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware(AuthenticateMiddleware::class);

//QUẢN LÍ NGƯỜI DÙNG
Route::group(['prefix' => 'user'], function (){
    Route::get('index', [UserController::class, 'index'])
        ->name('user.index')
        ->middleware(AuthenticateMiddleware::class);
    Route::get('create', [UserController::class, 'create'])
        ->middleware(AuthenticateMiddleware::class);
});

//AJAX
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation']);

Route::get('user/index', [UserController::class, 'index'])
    ->name('user.index')
    ->middleware(AuthenticateMiddleware::class);
Route::get('user/create', [UserController::class, 'create'])
    ->middleware(AuthenticateMiddleware::class);

Route::get('admin', [AuthController::class, 'index'])
    ->name('auth.admin')
    ->middleware(LoginMiddleware::class);

