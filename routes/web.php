<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SiteController;


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

Route::get('/', [MyAuthController::class, 'index'])->name('login');
Route::get('login', [MyAuthController::class, 'index'])->name('login');
Route::post('custom-login', [MyAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [MyAuthController::class, 'registration'])->name('register-user');
Route::get('custom-registration', [MyAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('custom-registration', [MyAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [MyAuthController::class, 'signOut'])->name('signout');

Route::get('forget-password', [ForgotPasswordController::class, 'getEmail']);
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail']);

Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);

# Route::get('games', [GameController::class, 'index'])->name('games')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {

    Route::resource('products', 'ProductsController');
    Route::get('products', [ProductsController::class, 'index'])->name('products');
    Route::get('dashboard', [MyAuthController::class, 'dashboard']); 
});

# uno a muchos - (inversa uno a uno)
Route::get('get-comments/{id}', [SiteController::class, 'getComments']);
Route::get('get-post/{id}', [SiteController::class, 'getPost']);
