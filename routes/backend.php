<?php

use App\Http\Controllers\View\BackendController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin"], function () {
    Route::get("/", [BackendController::class, "index"]);
});
