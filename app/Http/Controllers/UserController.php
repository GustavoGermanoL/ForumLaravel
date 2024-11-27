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

    public function index(Request $request){
        return view('index.index');
    }
    //feito
    public function listAllUsers(Request $request){
        $users = User::all();
        return view('user.listAllUsers', ['users' => $users]);
    }

    //feito
    public function listUserByID($uid, Request $request){
        $user = User::where('id', $uid) -> first();
        return view('user.profile', ['user' => $user]);
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
                'password' => 'required|string|min:8|confirmed',
                // 'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // $imageFile = $request->file('photo');
            

            
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
    public function updateUser(Request $request, $uid){

        // $imageFile = $request->file('photo');
        $imagePath = $request->file('photo') -> store('images', 'public');


        $user = User::where('id', $uid) -> first();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> photo = $imagePath;
        if($request -> password != ''){
            $user -> password = Hash::make($request -> password);
        }
        $user->save();

        return redirect() -> route('routeListUser', [$user -> id])
                                -> with('message', 'Atualizado com sucesso!');
    }
    public function editUser(Request $request, $uid){
        $user = User::where('id', $uid)->first();
        return view('user.editUser', ['user' => $user]);
    }
    public function deleteUser(Request $request, $uid){
        User::where('id', $uid) -> delete();
        return redirect() -> route('listAllUsers')
                                -> with('message', 'Excluido com sucesso');
    }
    
}
