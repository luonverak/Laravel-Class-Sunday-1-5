<?php

use App\Http\Controllers\View\BackendController;
use App\Http\Controllers\View\FrontendController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin"], function () {
    Route::get("/", [BackendController::class, "index"]);
    Route::get("/category", [BackendController::class, "category"]);
});

Route::group(["prefix" => "/"], function () {
    Route::get("", [FrontendController::class, "home"]);
    Route::get("category", [FrontendController::class, "category"]);
});
