<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginUser(Request $request){
        if($request -> method() === 'GET') {
            return view('auth.login');
        }else{
            $username = $request->username;
            $password = $request->password;
            $credential = $request->only('username','password');
            print_r($username . " - ". $password. "<br>");
            print_r($credential);
        }
    }
}
