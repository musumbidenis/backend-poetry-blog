<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request){
        

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->postId = $request->postId;
        $comment->username = $request->username;

        if($comment->save()){
           return response()->json('success');
        }else{
           return response()->json('error');
        }
    }
}
