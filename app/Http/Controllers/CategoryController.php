<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function createCategory(Request $request){

        if($request -> method() === 'GET'){
            return view('category.createCategory');

        }else {
            $request -> validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|description|max:255|',
                'created_at' => 'required|timestamp|',
                'updated_at' => 'required|timestamp|'
            ]);

            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => $request->created_at,
                'update_at' =>$request->update_at
            ]);



            return redirect() ->route('listAllUsers');

        }
    }
}
