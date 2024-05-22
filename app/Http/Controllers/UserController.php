<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // camelCase
    // no_camel_case <<
    public function listAllUsers(){
        return view('users.listAllUsers');
    }

    public function listUserByID(){

    }

    public function createUser(){
        return view('users.createUser');
    }
    public function updateUser(){

    }
    public function deleteUser(){

    }
}
