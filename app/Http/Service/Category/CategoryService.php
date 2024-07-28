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
}
