<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Category\CategoryController;


Route::group(["prefix" => "admin"], function () {
    Route::post("/add-category", [CategoryController::class, "addCategory"]);
    Route::post("/get-category", [CategoryController::class, "getCategory"]);
    Route::post("/edit-category", [CategoryController::class, "editCategory"]);
});
