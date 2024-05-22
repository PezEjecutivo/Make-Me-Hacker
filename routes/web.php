<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeveloperController;

Route::get('/information', function () {
    return view('information/index');
})->middleware('auth');

//CRUD
Route::resource("", UserController::class)->middleware('auth');
Route::resource("enemigos", DeveloperController::class)->middleware('auth');
Route::resource("usuarios", UserController::class)->middleware('auth');

Route::post('/save-score', [UserController::class, 'saveScore'])->name('save-score');

//Registro
Route::get("/login", [UserController::class, "formularioLogin"])->name('login');
Route::post('/login', [UserController::class, 'iniciarSesion'])->name('login.iniciar');
Route::get('/registro', [UserController::class, 'create'])->name('registro');
Route::post('/registro', [UserController::class, 'store'])->name('registro.store');
Route::post("/logout", [UserController::class, "logout"]);