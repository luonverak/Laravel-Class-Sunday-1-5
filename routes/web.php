<?php

use App\Http\Controllers\MasterPageController;
use Illuminate\Support\Facades\Route;

Route::get("/",[MasterPageController::class,"index"]);
Route::get("/category",[MasterPageController::class,"category"]);