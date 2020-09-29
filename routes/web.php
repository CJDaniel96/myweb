<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->group(function () {
    //Admin Route Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::redirect('/', '/admin/dashboard');

    //Admin User Route
    Route::prefix('/user-management')->group(function () {
        //Self Information
        Route::get('/information', [App\Http\Controllers\Admin\AdminController::class, 'user_management_information'])->name('admin.user-management.information');
        //Users
        Route::get('/users', [App\Http\Controllers\Admin\AdminController::class, 'user_management_users'])->name('admin.user_management.users');
    });

    //Login Route
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);

    //Logout Route
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout']);

    //Admin Password Route
    Route::prefix('/password')->group(function () {
        //Forgot Password Route
        Route::get('/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
        Route::post('/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

        //Reset Password Route
        Route::get('/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
        Route::post('/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('admin.password.update');
    });
});

Route::view('/test', 'test');
