<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function dashboardViewUser(Request $req)
    {
        $data["post"] = Post::all();
        
        return view('dashboard',$data);
    }

    public function saveComment(Request $req)
    {
       
        $validate = Validator::make($req->all(),[
            "commenttext"=>"required",
            "username"=>"required"
        ]);
        if($validate->fails())
        {
            return redirect()->back()->with('error','Comment or Username can not be null');
        }

        $comment = new Comment;
        $comment->post_id = $req->postid;
        $comment->comment_text = $req->commenttext;
        $comment->comment_username = $req->username ; 
        if($comment->save())
        {
            return redirect()->back()->with('success','Commented Successfully');
        }
        else{
            return redirect()->back()->with('error','Error: Some problem occured');
        }
    }

    public function fullPost(Request $req,$id)
    {
        $post = Post::where('id',$id)->first();
        if(!empty($post))
        {
            $comment = Comment::where("post_id",$post->id)->get();

            $data["post"]= $post;
            $data["comment"]=$comment;

            return view('posts',$data);
        }
        else{
            return view('posts')->with('error','No Such Post Found');
        }
    }
}
