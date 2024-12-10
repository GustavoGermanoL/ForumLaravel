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
        
            $request->validate([
                'content' => 'required|string',
                
            ]);

            
        $comment = Comment::create([
            'content' => $request->content,
            'topic_id' => $tid,
            
        ]);
    

        // $post = new Post([
        //     'image' => $request->image,
        // ]);

        $comment->post()->create([
            'user_id' => Auth::id(),
            'image' => null,  // ou omita se o campo image for nullable
        ]);

        // $Comment -> post() ->save($post);
        

        // return redirect()->route('routeListTopic')->with('Comment', $Comment);
        return redirect()->route('routeListTopic', ['cid' => $tid])->with('success', 'Comentário criado com sucesso!');

    
  }


  public function editComment($cid, Request $request)
    {
        
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::find($cid);

    
        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->route('routeListTopic', ['cid' => $comment->topic_id])->with('success', 'Comentário atualizado com sucesso!');
    }


public function deleteComment($cid, $tid){
    $comment = Comment::find($cid);
    $topic = Topic::where('id', $tid) -> first();

    $comment -> delete();

    return redirect()->route('topic.listTopicById', ['topic' => $topic])->with('success', 'Comentario excluido');
    

    
}



}