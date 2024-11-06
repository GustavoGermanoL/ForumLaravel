<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;


class TopicController extends Controller

{


    public function createTopic(Request $request){
        if($request -> method() === 'GET'){
            $categories = Category::all();

            return view('topic.createTopic', ['categories' => $categories]);

        }else {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' =>'required|string',
                'status' => 'required|int'
            ]);

        $topic = Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);
    }

        // $post = new Post([
        //     'image' => $request->image,
        // ]);

        $topic->post()->create([
            'user_id' => Auth::id(),
            'image' => $request->image,
            // 'image' => $request->file('image')->store('images', 'public')
        ]);

        // $topic -> post() ->save($post);

        return redirect()->route('routeListAllTopics')->with('topic', $topic);

    
  }
  public function index(Request $request){
    $topics = Topic::all();
    return view('topic.listAllTopics', ['topics' => $topics]);
}

public function deleteTopic(Request $request, $tid){
    Topic::where('id', $tid) -> delete();
    return redirect() -> route('routeListAllTopics')
                            -> with('message', 'Excltido com sucesso');
}

public function listTopicById($tid, Request $request){
    $topic = Topic::where('id', $tid) -> first();
    return view('topic.listTopicById', ['topic' => $topic]);
    
}

}