<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function dashboardView(Request $req)
    {
        $data["post"] = Post::all();
        $data["countpost"] = Post::count();
        $data["totalcomments"] = Comment::count();
        return view('admin.dashboard',$data);

    }

    public function savePost(Request $req)
    {
        $validate = Validator::make($req->all(),[
            "postdescription"=>"required"
        ]);
        if($validate->fails())
        {
            return redirect()->back()->with('error','Post description can not be null');
        }
        $insert["posting_description"] = $req->postdescription;
        $insert["post_date"] = date('Y-m-d');

        $save = Post::insert($insert);
        if($save)
        {
            return redirect()->back()->with('success','Posted Successfully');
        }
        else{
            return redirect()->back()->with('error','Error: Some problem occured');
        }
    }

    public function getEditItem(Request $req , $id)
    {
        $post = Post::where('id',$id)->first();
        if(!empty($post))
        {   $data["post"] = $post;
            return view('admin.edititem',$data);
        }
        else{
            return redirect('/admin')->with('error','No Such Post Found');
        }
    }


    public function editItem(Request $req)
    {
        $validate = Validator::make($req->all(),[
            "postdescription"=>"required"
        ]);
        if($validate->fails())
        {
            return redirect()->back()->with('error','Post description can not be null');
        }
        $insert["posting_description"] = $req->postdescription;
       // $insert["updated_at"] = date('Y-m-d');

        $save = Post::where('id',$req->post_id)->update($insert);
        if($save)
        {
            return redirect('/admin')->with('success','Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Error: Some problem occured');
        }
    }


    public function deletePost(Request $req , $id)
    {
        
        $delete = Post::where('id',$id)->delete();
        if($delete)
        {
            return redirect('/admin')->with('success','Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error','Error: Some problem occured');
        }
    }

    public function allComments(Request $req){
        $comment = Comment::all();
        $c_array = array();
        if(count($comment)>0)
        {
            for($i=0; $i<count($comment);$i++)
            {
                $post = Post::where('id',$comment[$i]->post_id)->first();
                array_push($c_array , [
                    "commentid"=>"{$comment[$i]->id}",
                    "commenttext"=>"{$comment[$i]->comment_text}",
                    "comment_username"=>"{$comment[$i]->comment_username}",
                    "post_description"=>"{$post->posting_description}"
                ]);
            }
            $data["comment"] = $c_array;
            
            return view('admin.comments' , $data);
        }
        else{
            return view('admin.comments')->with('error','No Comments Found');
        }
       
    }

    public function deleteComment(Request $req , $id)
    {
        $delete = Comment::where('id',$id)->delete();
        if($delete)
        {
            return redirect('/admin/comments')->with('success','Deleted Successfully');
        }
        else{
            return redirect('/admin/comments')->with('error','Error: Some problem occured or comment not found');
        }
    }
}
