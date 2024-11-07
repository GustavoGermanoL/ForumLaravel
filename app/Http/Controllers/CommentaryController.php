<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;


class CommentaryController extends Controller

{

    public function createComment($tid ,Request $request){
        if($request -> method() === 'GET'){
            $comments = Comment::all();

            return view('Comment.createComment', ['comments' => $comments]);

        }else {
            $request->validate([
                'content' => 'required|string',
                
            ]);

        $Comment = Comment::create([
            'content' => $request->content,
            'topic_id' => $request->topic,
            
        ]);
    }

        // $post = new Post([
        //     'image' => $request->image,
        // ]);

        $Comment->post()->create([
            'user_id' => Auth::id(),
            // 'image' => $request->file('image')->store('images', 'public')
        ]);

        // $Comment -> post() ->save($post);
        $topic = Topic::where('id', $tid) -> first();

        // return redirect()->route('routeListTopic')->with('Comment', $Comment);
        return view('topic.listTopicById', ['topic' => $topic]);

    
  }

public function deleteComment(Request $request, $cid, $tid){
    Comment::where('id', $cid) -> delete();
    $topic = Topic::where('id', $tid) -> first();

    return view('Comment.listTopicById', ['topic' => $topic]);
}

public function listCommentById($cid, Request $request){
    $Comment = Comment::where('id', $cid) -> first();
    return view('Comment.listCommentById', ['Comment' => $Comment]);
}

}