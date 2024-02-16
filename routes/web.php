<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UpdateAccountController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ProjectController;

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


Route::view('/', 'home')->name('home');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');


Route::get('login', [LoginController::class, 'create'])->name('login.create');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::match(['get', 'post'], 'logout', LogoutController::class)->name('logout')->middleware('auth');

Route::get('dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

Route::get('update-account', [UpdateAccountController::class, 'create'])->name('update.account.create');
Route::post('update-account', [UpdateAccountController::class, 'store'])->name('update.account.store');

Route::get('change-password', [ChangePasswordController::class, 'create'])->name('change.password.create');
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password.store');

Route::resource('projects', ProjectController::class);
