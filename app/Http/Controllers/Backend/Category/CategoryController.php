<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Category\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }
    public function addCategory(Request $request)
    {
        try {

            if (!$request->has("name") || $request->name == null) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "Something went wrong."
                ]);
            }

            $category = $this->categoryService->addCategory($request);
            if (!$category) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "Something added failed."
                ]);
            }
            return response()->json([
                "status" => "success",
                "msg" => "Category added success."
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getCategory(Request $request)
    {
        try {

            $categories = $this->categoryService->getCategory();

            if (!$categories->count() > 0) {
                return response()->json([
                    "status" => "success",
                    "msg" => "Empty category",
                ]);
            }

            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "categories" => $categories
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
