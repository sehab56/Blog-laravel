<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }
    protected function categoryValidate($request){
        $this->validate($request, [
            'category_name'         =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:3|Max:50',
            'category_description'  =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:3|Max:500',
            'publication_status'    =>'required'
        ]);
    }
    public function newCategory(Request $request){
        $this->categoryValidate($request);
        Category::saveCategoryInfo($request);
        return redirect()->back()->with('message','Category Save info successfully');
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category',['categories'=>$categories]);
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit-category',['category'=>$category]);
    }
    public function updateCategory(Request $request){
       Category::updateCategoryInfo($request);
       return redirect()->back()->with('message','Category info Update successfully');
    }
    public function deleteCategory(Request $request){
        Category::deleteCategoryInfo($request);
        return redirect()->back()->with('message','Category info delete successfully');

    }



}
