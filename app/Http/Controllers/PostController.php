<?php

namespace App\Http\Controllers;

// import model post
use \App\Models\Post;

// return type view
use Illuminate\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Membuat method post
    public function index(): View{
        // get post
        $posts = Post::latest()->paginate(5);

        // render view ke post
        return view('posts.index', compact('posts'));
    }
}
