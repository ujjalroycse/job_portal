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


Route::group(['account/'], function(){
    //Guest Route
    Route::group(['middleware' => 'guest'], function(){
        //Registration
        Route::get('/registration', [AccountController::class, 'acountRegistration'])->name('user.registration');
        Route::post('users/register', [AccountController::class, 'userRegister'])->name('registration');
        //Login 
        Route::get('/login', [AccountController::class, 'accountLogin']);
        Route::post('/login', [AccountController::class, 'userLogin'])->name('login');
    });
    //Auth Route
    Route::group(['middleware'=> 'auth'], function(){
        //Logout
        Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
        //Profile
        Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
        Route::put('user/update/{id}', [AccountController::class, 'userUpdate'])->name('update');
        //Update Profile Image
        Route::post('user/update/image', [AccountController::class, 'userImageUpdate'])->name('image.update');
        //Jobs Create
        Route::get('/job/create', [AccountController::class, 'jobCreate'])->name('account.createJob');
        Route::post('job/create', [AccountController::class,'createJob'])->name('createJob');
        //My Job
        Route::get('job/myjobs', [AccountController::class, 'myJobs'])->name('myjobs');
        Route::get('job/editjobs/{id}', [AccountController::class, 'editJob'])->name('editJob');
        Route::put('job/updatejob/{id}', [AccountController::class,'updateJob'])->name('updateJob');
        //Job Details
        Route::get('job/job-details/{id}', [AccountController::class,'jobDetails'])->name('job.details');
    });
});

