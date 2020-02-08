<?php

namespace App;
use Illuminate\Validation;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        protected $fillable = ['category_name','category_description','publication_status','','','',];

        public static function saveCategoryInfo($request){
            $categories = new Category();
            $categories->category_name         =$request->category_name;
            $categories->category_description  =$request->category_description;
            $categories->publication_status    =$request->publication_status;
            $categories->save();
        }
        public static function updateCategoryInfo($request){
            $category = Category::find($request->id);
            $category->category_name =$request->category_name;
            $category->category_description =$request->category_description;
            $category->publication_status =$request->publication_status;
            $category->save();
        }
        public static function deleteCategoryInfo($request){
            $category = Category::find($request->id);
            $category->delete();
        }
}
