<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/', [HomeController::class, 'home'])->name('home');
//Registration
Route::get('account/registration', [AccountController::class, 'acountRegistration'])->name('user.registration');
Route::post('users/register', [AccountController::class, 'userRegister'])->name('registration');
//Login And Logout
Route::get('account/login', [AccountController::class, 'accountLogin']);
Route::post('account/login', [AccountController::class, 'userLogin'])->name('login');
Route::get('account/logout', [AccountController::class, 'logout']);

Route::get('account/profile', [AccountController::class, 'profile'])->name('user.profile');

