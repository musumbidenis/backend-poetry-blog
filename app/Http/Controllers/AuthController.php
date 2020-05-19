<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /*POST
     */
    public function register(Request $request)
    {

        $user = new User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($user->save()){
          return response()->json('success');
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
}
