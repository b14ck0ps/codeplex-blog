<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registrationController;
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

//-------- Auth Routes GET --------//
Route::get('/registration', [registrationController::class, 'index'])->name('registration_page');
Route::get('/login', [loginController::class, 'index'])->name('login_page');

//-------- Auth Routes POST --------//
Route::post('/registration', [registrationController::class, 'store'])->name('registration');
Route::post('/login', [loginController::class, 'store'])->name('login');
