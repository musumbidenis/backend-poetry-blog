<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;

class UsersController extends Controller
{
  /*POST
    */
  public function register(Request $request)
  {
    $username = $request->username;
    $check = User::where('username', $username)->count();

    $user = new User();
    $user->username = $request->username;
    $user->password = $request->password;
    $user->email = $request->email;
    $user->phone = $request->phone;

    if($check == 0){
      $user->save();
      return response()->json('success');
    }else if($check != 0){
      return response()->json('userExists');
    }else{
      return response()->json('error');
    }
  }

  /*POST
    */
  public function login(Request $request)
  {     
    $username = $request->username;
    $password = $request->password;

    $credentials = User::where('username', $username)->where('password', $password)->count();

    if($credentials == 0){
        return response()->json('error');
    }else{
        return response()->json('success');
    }
  }

  /*POST
  */
  public function userInfo(Request $request)
  {
    $username = $request->username;

    $userInfo = User::where('username', $username)->get()->first();

    return $userInfo;
  }

  /*POST
  */
  public function userPosts(Request $request)
  {
    $username = $request->username;

    $userPosts = Post::where('username', $username)->get();

    return $userPosts;
  }
}
