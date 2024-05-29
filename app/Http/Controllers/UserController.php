<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // camelCase
    // no_camel_case <<

    //feito
    public function listAllUsers(Request $request){
        return view('users.listAllUsers');
    }

    //feito
    public function listUserByID($uid, Request $request){
        return view('users.listUserByID');
        print($uid);
    }

    //feito
    public function createUser(){
        return view('users.createUser');
    }
    //feito
    public function updateUser(){
        return view('users.editUser');
    }
    
    public function deleteUser(){
        return view('users.deleteUser');
    }
}
