<?php
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix("user/products")->group(function () {
    Route::get("show-cart", [ProductController::class, "showCart"]);
    Route::get("{product}", [ProductController::class, "showProduct"]);
    Route::post("add-to-cart", [ProductController::class, "addToCart"]);
});
