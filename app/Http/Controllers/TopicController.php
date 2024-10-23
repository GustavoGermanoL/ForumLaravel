<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;

class TopicController extends Controller

{


    public function createTopic(Request $request){
        if($request -> method() === 'GET'){
            $category = Category::all();

            return view('topic.createTopic', 'categories');

        }else {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' =>'required|string',
                'status' => 'required\int'
            ]);

        $topic = new Topic([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);
    }

        $post = new Post([
            'image' => $request->image,
        ]);

        $topic -> post() ->save($post);

        return $topic;

    
  }
}