<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registrationController;
use App\Http\Controllers\user\dashboard;
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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard');

    // Logout
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login_page');
    })->name('logout');
});
