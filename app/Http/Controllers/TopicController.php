<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentaryController;
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

    
    $topic = Topic::find($tid);
    Comment::where('topic_id', $tid)->delete();
   
    $topic->tags()->detach();
    $topic->delete();

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

public function editTopic(Request $request, $tid){
    $topic = Topic::where('id', $tid)->first();
    $categories = Category::all();
    $tags = Tag::all();


    return view('topic.editTopic', ['topic' => $topic, 'categories' => $categories, 'tags' => $tags]);
}


public function updateTopic(Request $request, $tid){

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|int',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $topic = Topic::findOrFail($tid);

    

    $topic->title = $request->title;
    $topic->description = $request->description;
    $topic->status = $request->status;
    $topic->category_id = $request->category_id;
    
    
    if($request ->hasFile('image')){
        $imagePath = $request->file('image') -> store('images', 'public');
        $topic->post()->update([
            'image' => $imagePath
        ]);
    }

    $topic -> save();
    $topic->tags()->sync($request->tags);

    return redirect() -> route('routeListTopic', [$topic -> id])
                            -> with('message', 'Atualizado com sucesso!');
}


}