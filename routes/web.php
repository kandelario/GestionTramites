<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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


Route::get('/', function (Request $request) {
    if(!$request->User()) {
        return view('auth.login');
    }else{
        return redirect ('home');
    }
});

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();