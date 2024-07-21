<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterPageController extends Controller
{
    public function index(){
        return view("home_page");
    }
    public function category(){
        return view("category");
    }
}
