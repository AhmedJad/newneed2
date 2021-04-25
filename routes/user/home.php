<?php
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix("user")->group(function () {
    Route::get("home", [HomeController::class, "home"]);
});
