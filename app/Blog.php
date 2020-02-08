<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['category_id','blog_title','blog_short_description','blog_long_description','blog_image','publication_status'];
    protected static function imageUpload($request){
        $image = $request->file('blog_image');
        $imageName = $image->getClientOriginalName();
        $directory = 'blog-image/';
        $imagePath = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imagePath;

    }

    public static function saveBlogInfo($request){
        $imagePath = Blog::imageUpload($request);
        $blog = new Blog();
        $blog->category_id              =$request->category_id;
        $blog->blog_title               =$request->blog_title;
        $blog->blog_short_description   =$request->blog_short_description;
        $blog->blog_long_description    =$request->blog_long_description;
        $blog->blog_image               =$imagePath;
        $blog->publication_status       =$request->publication_status;
        $blog->save();
    }

    public static function updateBlogInfo($request){
        $blog = Blog::find($request->id);
        $blogImage = $request->file("blog_image");
        if ($blogImage){
            unlink($blog->blog_image);
            $imagePath = Blog::imageUpload($request);
        }
        $blog->category_id            =$request->category_id;
        $blog->blog_title             =$request->blog_title;
        $blog->blog_short_description =$request->blog_short_description;
        $blog->blog_long_description  =$request->blog_long_description;
        if (isset($imagePath)){
            $blog->blog_image         =$imagePath;
        }
        $blog->publication_status     =$request->publication_status;
        $blog->save();
    }
    public static function deleteBlogInfo($request){
        $blog = Blog::find($request->id);
        if (file_exists($blog->blog_image)){
            unlink($blog->blog_image);
        }
        $blog->delete();
    }
}
