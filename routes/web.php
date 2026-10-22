<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $user = Auth::user();
    return view("home", ["user" => $user]);
})->name("home");

Route::controller(AuthController::class)->group(function () {
    Route::get("login", "loginForm")->middleware("guest")->name("login");
    Route::get("register", "registerForm")->middleware("guest")->name("register");

    Route::post("login", "login");
    Route::post("register", "register");
    Route::post("logout", "logout")->name("logout");
});

Route::resource("students", StudentController::class);
Route::resource("teachers", TeacherController::class);
