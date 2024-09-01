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

            $record =   [
                "id" => $category->id,
                "name" => $category->category_name,
                "description" => $category->category_description,
                "thumbnail" => $category->category_thumbnail ?: emptyImage()
            ];


            return response()->json([
                "status" => "success",
                "msg" => "Category added success.",
                "view" => $record
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getCategory()
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
    public function editCategory(Request $request)
    {
        try {

            if (!$request->has("name") || $request->name == null) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "Something went wrong."
                ]);
            }

            $category = $this->categoryService->editCategory($request);

            if (!$category) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "Something added failed."
                ]);
            }

            $records =   [
                "id" => $category->id,
                "name" => $category->category_name,
                "description" => $category->category_description,
                "thumbnail" =>  $category->category_thumbnail  ?: emptyImage()
            ];

            return response()->json([
                "status" => "success",
                "msg" => "Category edited success.",
                "view" => $records
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
