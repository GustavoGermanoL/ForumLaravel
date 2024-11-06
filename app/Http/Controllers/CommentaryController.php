<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;


class CommentaryController extends Controller

{

    public function createComment(Request $request){
        if($request -> method() === 'GET'){
            $comments = Category::all();

            return view('Comment.createComment', ['comments' => $comments]);

        }else {
            $request->validate([
                'content' => 'required|string',
                
                
            ]);

        $Comment = Comment::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);
    }

        // $post = new Post([
        //     'image' => $request->image,
        // ]);

        $Comment->post()->create([
            'user_id' => Auth::id(),
            'image' => $request->image,
            // 'image' => $request->file('image')->store('images', 'public')
        ]);

        // $Comment -> post() ->save($post);

        return redirect()->route('routeListAllComments')->with('Comment', $Comment);

    
  }
  public function index(Request $request){
    $Comments = Comment::all();
    return view('Comment.listAllComments', ['Comments' => $Comments]);
}

public function deleteComment(Request $request, $tid){
    Comment::where('id', $tid) -> delete();
    return redirect() -> route('routeListAllComments')
                            -> with('message', 'Excltido com sucesso');
}

public function listCommentById($tid, Request $request){
    $Comment = Comment::where('id', $tid) -> first();
    return view('Comment.listCommentById', ['Comment' => $Comment]);
    
}

}