<?php

use App\Http\Controllers\View\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get("/",[FrontendController::class,"home"]);
Route::get("/category",[FrontendController::class,"category"]);