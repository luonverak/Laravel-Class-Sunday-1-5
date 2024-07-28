<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index(){
        return view("backend.index");
    }
    public function category(){
        return view("backend.category.category");
    }
}
