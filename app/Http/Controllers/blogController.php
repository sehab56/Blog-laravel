<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blogController extends Controller
{
    public function addBlog(){
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.blog.add-blog',['categories'=>$categories]);
    }
    protected function blogValidateData($request){
        $this->validate($request,[
            'category_id'           =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:3|Max:50',
            'blog_title'            =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:5|Max:50',
            'blog_short_description'=>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:30|Max:700',
            'blog_long_description' =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:50|Max:1500',
            'blog_image'            =>'required',
            'publication_status'    =>'required'
        ]);
    }

    public function newBlog(Request $request){
        $this->blogValidateData($request);
        Blog::saveBlogInfo($request);
        return redirect()->back()->with('message','Blog info save successfully');
    }
    public function manageBlog(){
        $blogs = DB::table('blogs')
               ->join('categories', 'blogs.category_id','=','categories.id')
               ->select('blogs.*', 'categories.category_name')
               ->get();
        return view('admin.blog.manage-blog',['blogs'=>$blogs]);
    }
    public function editBlog($id){
        $categories = Category::where('publication_status',1)->get();
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog', [
            'categories'=>$categories,
            'blog'      =>$blog
        ]);
    }
    public function updateBlog(Request $request){
        Blog::updateBlogInfo($request);
        return redirect()->back()->with('message','Blog info Update successfully');
    }
    public function deleteBlog(Request $request){
        Blog::deleteBlogInfo($request);
        return redirect()->back()->with('message','Blog info data deleted successfully');
    }

}
