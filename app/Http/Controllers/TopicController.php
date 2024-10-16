<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;

class TopicController extends Controller
{

    public function index(){
        $posts = Post::all();
        return $posts;
    }

    public function createTopic(){
            return view('topic.createTopic');

        
    }
}
