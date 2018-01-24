<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogDescription ;
use App\Models\Comment;
class BlogController extends Controller
{
    //
    public function index(){


        $blog = Blog::where('status','=','1')->get();

        return view('front.blog.list')->withBlog($blog);
    }


    public function details($slug){

        $blogDescription = BlogDescription::where('slug','=',urldecode($slug))->get()->first();
        $blog = Blog::find($blogDescription->blog_id);
        $comments = Comment::where('blog_id' , '=',$blogDescription->blog_id)->get();
       return view('front.blog.details')->withBlog($blog)->withComments($comments);
    }

    public function comment(Request $request){

        $comment = new Comment();
        $comment->name = $request->name ;
        $comment->email = $request->email ;
        $comment->blog_id = decrypt($request->blog);
        $comment->message = $request->message ;
        $comment->save();

        session()->flash('message' , 'Comment added sucessfully');
        return redirect()->back();
    }
}
