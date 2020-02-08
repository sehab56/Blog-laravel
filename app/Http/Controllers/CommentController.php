<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
    public function newComment(Request $request){
        Comment::saveCommentInfo($request);
        return redirect()->back()->with('message','Comment info save successfully');
    }
    public function manageComment(){
        $comments = DB::table('comments')
                    ->join('visitors','comments.visitor_id','=','visitors.id')
                    ->join('blogs','comments.blog_id','=','blogs.id')
                    ->select('comments.*','visitors.first_name','visitors.last_name','blogs.blog_title')
                    ->orderBy('comments.id','desc')
                    ->get();
        return view('admin.comment.manage-comment',['comments'=>$comments]);
    }
    public function unpublishedComment($id){
       Comment::unpublishedCommentInfo($id);
       return redirect()->back()->with('message','Comment info Unpublished Successfully');

    }
    public function publishedComment($id){
       Comment::publishedCommentInfo($id);
       return redirect()->back()->with('message','Comment info published Successfully');

    }

    public function deleteComment(Request $request){
       $comment = Comment::find($request->id);
       $comment->delete();
       return redirect()->back()->with('message','Comment info deleted Successfully');

    }


}
