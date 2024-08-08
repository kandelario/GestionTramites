<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TramiteController;
use Illuminate\Routing\Controllers\Middleware;

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/asesors', AsesorController::class)->names('asesors')->middleware('auth');
Route::resource('/clientes', ClienteController::class)->names('clientes')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/tramites', TramiteController::class)->names('tramites')->middleware('auth');