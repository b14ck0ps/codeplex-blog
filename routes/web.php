<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registrationController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\notificationController;
use App\Http\Controllers\user\settingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\user\util\writePostController;
use App\Http\Controllers\user\util\searchController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['guest'])->group(function () {
    //-------- Auth Routes GET --------//
    Route::get('/registration', [registrationController::class, 'index'])->name('registration_page');
    Route::get('/login', [loginController::class, 'index'])->name('login_page');

    //-------- Auth Routes POST --------//
    Route::post('/registration', [registrationController::class, 'store'])->name('registration');
    Route::post('/login', [loginController::class, 'store'])->name('login');
});




//-------- Dashboard Routes --------//
Route::middleware(['auth'])->group(function () {
    //------------------ GET ------------------//
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/about', [UserController::class, 'about'])->name('about');
    Route::get('/notification', [notificationController::class, 'index'])->name('notification');
    Route::get('/writePost', [writePostController::class, 'index'])->name('writePost');
    Route::get('/search', [searchController::class, 'index'])->name('search');
    Route::get('/setting', [settingController::class, 'index'])->name('setting');
    Route::get('/setting/security', [settingController::class, 'security'])->name('security');


    // Logout
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login_page');
    })->name('logout');
});

//-------- Blog GET --------//
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blog/{id}', [BlogController::class, 'content'])->name('blog.content');
Route::get('/user/{id}', [UserController::class, 'guestProfile'])->name('guestProfile');
Route::get('/user/{id}/about', [UserController::class, 'guestProfileAbout'])->name('guestProfile.about');
