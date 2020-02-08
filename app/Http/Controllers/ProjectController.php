<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        $sliders     =Slider::where('publication_status',1)->get();
        $blogs      = Blog::where('publication_status',1)->take(6)->get();
        return view('font-end.home.home',[
            'sliders'=>$sliders,
            'blogs'=>$blogs
        ]);
    }
    public function categoryBlog($id){
        $blogs = Blog::where('category_id', $id)->where('publication_status',1)->take(3)->get();
        return view('font-end.category.category-blog',[
            'blogs'=>$blogs
        ]);
    }

    public function blogDetails($id){
        $blog = Blog::find($id);
        $comments = DB::table('comments')
                    ->join('visitors','comments.visitor_id','=','visitors.id')
                    ->select('comments.*','visitors.first_name','visitors.last_name')
                    ->where('comments.blog_id', $id)
                    ->where('comments.publication_status',1)
                    ->orderBy('comments.id','desc')
                    ->get();
        return view('font-end.blog.blog-detail',[
            'blog'      =>$blog,
            'comments'  =>$comments

        ]);
    }
}
