<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        return view("frontend.home_page");
    }
    public function category(){
        return view("frontend.category_page");
    }
}
