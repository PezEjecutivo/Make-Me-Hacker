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