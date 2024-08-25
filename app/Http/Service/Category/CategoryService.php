<?php

namespace App\Http\Service\Category;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryService
{
    public function addCategory(Request $request)
    {
        try {

            $file = $request->file("thumbnail");
            $fileName = "";

            if ($file) {
                $fileName = date("d-m-y-h:i:s") . '-' . $file->getClientOriginalName();
                $file->move("asset/images", $fileName);
            }

            $category = new CategoryModel();
            $category->category_name = $request->name;
            $category->category_description = $request->description;
            $category->category_thumbnail = $fileName;
            $category->save();
            return $category;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getCategory()
    {
        try {
            $catgory = CategoryModel::select(
                [
                    "id",
                    "category_name",
                    "category_description",
                    "category_thumbnail"
                ]
            )->get();
            $records = $catgory->map(function ($q) {
                return [
                    "id" => $q->id,
                    "name" => $q->category_name,
                    "description" => $q->category_description,
                    "thumbnail" => $q->category_thumbnail ?: emptyImage()
                ];
            });
            return $records;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function editCategory(Request $request)
    {
        try {

            $file = $request->file("thumbnail");
            $fileName = "";

            if ($file) {
                $fileName = date("d-m-y-h:i:s") . '-' . $file->getClientOriginalName();
                $file->move("asset/images", $fileName);
            } else {
                $fileName = $request->old_thumbnail;
            }

            $id = Decryption($request->id);

            $category = CategoryModel::where("id", $id)->first();
            if (!$category) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "Something went wrong."
                ]);
            }
            $category->category_name = $request->name;
            $category->category_description = $request->description;
            $category->category_thumbnail = $fileName;
            $category->save();
            return $category;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
