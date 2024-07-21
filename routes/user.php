<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/sokdara', function () {
    return "Sok Dara";
});

Route::get("/hello-user",[UserController::class,"helloUser"]);