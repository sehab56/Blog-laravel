<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =['visitor_id','blog_id','comment'];
    public static function saveCommentInfo($request){
        $comment = new Comment();
        $comment->visitor_id = $request->visitor_id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
//        $comment->publication_status = $request->publication_status;
        $comment->save();
    }
    public static function unpublishedCommentInfo($id){
        $comment =  Comment::find($id);
        $comment->publication_status = 0;
        $comment->save();
    }
    public static function publishedCommentInfo($id){
        $comment =  Comment::find($id);
        $comment->publication_status = 1;
        $comment->save();
    }
}
