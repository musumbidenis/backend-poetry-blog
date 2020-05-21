<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;

class PostsController extends Controller
{
  /*GET
  */
  public function index(){
    $posts = Post::get();
    return $posts;
  }

  /*POST
  */
  public function store(Request $request){
    $image = base64_decode($request->image);
    $imageName = $request->imageName;

    $output_file = 'postImages/'.$imageName.'.jpg';
    Storage::disk('local')->put($output_file, $image);

    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->username = $request->username;
    $post->imageUrl = url('/').'/storage/postImages/'.$imageName.'.jpg';

    if($post->save()){
        return response()->json('success');
      }else{
        return response()->json('error');
    }
  }
}

