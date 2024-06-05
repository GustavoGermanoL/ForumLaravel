<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    // camelCase
    // no_camel_case <<

    //feito
    public function listAllUsers(Request $request){
        return view('user.listAllUsers');
    }

    //feito
    public function listUserByID($uid, Request $request){
        return view('user.listUserByID');
        print($uid);
    }

    //feito
    public function createUser(Request $request){

        if($request -> method() === 'GET'){
            return view('user.createUser');

        }else {
            $request -> validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect() ->route('listAllUsers');



        }
    }
    //feito
    public function updateUser(){
        return view('user.editUser');
    }
    
    public function deleteUser(){
        return view('user.deleteUser');
    }
}
