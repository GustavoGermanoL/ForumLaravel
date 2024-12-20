<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;
use App\Controllers\TopicController;
use App\Controllers\CommentaryController;

class UserController extends Controller
{
    // camelCase
    // no_camel_case <<

    public function index(Request $request){
        $topics = Topic::all(); 

        return view('index.index', compact('topics'));
    }
    //feito
    public function listAllUsers(Request $request){
        $users = User::all();
        return view('user.listAllUsers', ['users' => $users]);
    }

    //feito
    public function listUserByID($uid, Request $request){
        $user = User::findorfail($uid);

        $topics = Topic::whereHas('post', function ($query) use ($uid){
            $query->where('user_id', $uid);
        })->get();

        $comments = Comment::whereHas('post', function ($query) use ($uid) {
            $query->where('user_id', $uid);
        })->get();


        return view('user.profile', compact('user', 'topics', 'comments'));
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

        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'string|min:3|nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        

        $user = User::where('id', $uid) -> first();
        
        $user -> name = $request -> name;
        $user -> email = $request -> email;

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('images', 'public');
            $user->photo = $imagePath; 
        }

        
        if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
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
