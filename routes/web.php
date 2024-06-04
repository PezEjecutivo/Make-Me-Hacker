<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LogrosController;
use App\Http\Controllers\MejorasObtenidasController;
use App\Http\Controllers\NivelesController;
use App\Http\Controllers\AmigosController;
use App\Http\Controllers\DesafiosController;

Route::get('/information', function () {
    return view('information/index');
})->middleware('auth');

//RUTAS AUTOMATICAS / CRUD
Route::resource("", UserController::class)->middleware('auth');
Route::resource('logros', LogrosController::class)->middleware('auth');
Route::resource('programadores', DeveloperController::class)->middleware('auth');
Route::resource('mejoras-obtenidas', MejorasObtenidasController::class)->middleware('auth');
Route::resource('niveles', NivelesController::class)->middleware('auth');
Route::resource('amigos', AmigosController::class)->middleware('auth');
Route::resource('desafios', DesafiosController::class)->middleware('auth');

Route::post('/save-score', [UserController::class, 'saveScore'])->name('save-score');

//Registro
Route::get("/login", [UserController::class, "formularioLogin"])->name('login');
Route::post('/login', [UserController::class, 'iniciarSesion'])->name('login.iniciar');
Route::get('/registro', [UserController::class, 'create'])->name('registro');
Route::post('/registro', [UserController::class, 'store'])->name('registro.store');
Route::post("/logout", [UserController::class, "logout"]);

//Rutas aisladas
Route::get("/clasificacion", [UserController::class, "ranking"])->name('ranking')->middleware('auth');
Route::get("/perfil", [UserController::class, "show"])->name('show')->middleware('auth');

// Rutas admin
Route::get("/admin", [UserController::class, "allUsers"])->name("allUsers")->middleware("auth");
Route::get("/admin/user/{id}", [UserController::class, "showUser"])->name("showUser")->middleware("auth");
Route::get("/admin/create", [UserController::class, "createUser"])->name("createUser")->middleware("auth");
Route::post("/admin/user", [UserController::class, "storeUser"])->name("storeUser")->middleware("auth");
Route::get("/admin/user/{id}/edit", [UserController::class, "editUser"])->name("editUser")->middleware("auth");
Route::put("/admin/user/{id}", [UserController::class, "updateUser"])->name("updateUser")->middleware("auth");
Route::delete("/admin/user/{id}", [UserController::class, "destroyUser"])->name("destroyUser")->middleware("auth");