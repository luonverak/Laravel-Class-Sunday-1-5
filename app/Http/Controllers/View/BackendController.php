<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Category\CategoryService;

class BackendController extends Controller
{
    private $categoryService;
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        return view("backend.index");
    }
    public function category()
    {
        $categories = $this->categoryService->getCategory();

        if (!$categories->count() > 0) {
            return response()->json([
                "status" => "success",
                "msg" => "Empty category",
            ]);
        }
        return view("backend.category.category",["categories" => $categories]);
    }
}
