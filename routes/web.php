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


Route::group(['account'], function(){
    //Guest Route
    Route::group(['middleware' => 'guest'], function(){
        //Registration
        Route::get('account/registration', [AccountController::class, 'acountRegistration'])->name('user.registration');
        Route::post('users/register', [AccountController::class, 'userRegister'])->name('registration');
        //Login And Logout
        Route::get('account/login', [AccountController::class, 'accountLogin']);
        Route::post('account/login', [AccountController::class, 'userLogin'])->name('login');
    });
    //Auth Route
    Route::group(['middleware'=> 'auth'], function(){
        Route::get('account/logout', [AccountController::class, 'logout']);
        Route::get('account/profile', [AccountController::class, 'profile'])->name('profile');
        Route::put('user/update/{id}', [AccountController::class, 'userUpdate'])->name('update');
        Route::post('user/update/image', [AccountController::class, 'userImageUpdate'])->name('image.update');

        Route::get('account/job/create', [AccountController::class, 'jobCreate'])->name('account.createJob');
    });
});

