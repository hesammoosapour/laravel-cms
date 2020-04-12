<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments.replies')->latest("updated_at")->get();


//        foreach ($posts as $key=>$val) {
//            return $posts[$key+1]->slug;
//            $key = 39;
//            return $posts[$key]->slug;
//        }

        return view('all_posts',compact('posts'));
    }
}
