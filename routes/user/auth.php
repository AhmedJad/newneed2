<?php
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix("user")->group(function () {
    Route::post("register", [AuthController::class, "register"]);
    Route::get("register", [AuthController::class, "registerView"]);
    Route::get("login", [AuthController::class, "loginView"]);
    Route::post("login", [AuthController::class, "login"]);
    Route::get("logout", [AuthController::class, "logout"]);
});
