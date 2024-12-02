<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TopicController extends Controller

{


    public function createTopic(Request $request){
        if($request -> method() === 'GET'){
            $categories = Category::all();
            $tags = Tag::all();
            return view('topic.createTopic', ['categories' => $categories, 'tags' => $tags]);

        }else {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' =>'image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|int'
            ]);

            $imagePath = $request->file('image') -> store('images', 'public');

        $topic = Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imagePath,
            'category_id' => $request->category,
            'tag_id' => $request ->tag
        ]);

        $topic->tags()->sync($request->tags);
    }

       

        $topic->post()->create([
            'user_id' => Auth::id(),
            'image' => $imagePath
            // 'image' => $request->file('image')->store('images', 'public')
        ]);

        // $topic -> post() ->save($post);

        return redirect()->route('routeListAllTopics')->with('topic', $topic);

    
  }
  public function index(Request $request){
    $topics = Topic::all();
    $categories = Category::all();
    $tags = Tag::all();
    
    return view('topic.listAllTopics', ['topics' => $topics, 'categories' => $categories, 'tags' => $tags]);
}

public function deleteTopic(Request $request, $tid){
    Topic::where('id', $tid) -> delete();
    return redirect() -> route('routeListAllTopics')
                            -> with('message', 'Excltido com sucesso');
}

public function listTopicById($tid, Request $request)
{
    $topic = Topic::with('tags', 'category', 'user', 'post.user')
    // ->withCount('comments as comments_count')
    ->withCount('post')
    ->where('id', $tid)->first();
    $post = $topic->post;

    // dd($topic->user);

    if (!$topic) {
        return redirect()->route('routeListAllTopics')->with('error', 'Tópico não encontrado');
    }

    // $userPostsCount = $topic->user->post()->count(); 
    $userPostsCount = $topic->post->user->posts()->count();

    return view('topic.listTopicById', compact('topic', 'userPostsCount'));
}


}