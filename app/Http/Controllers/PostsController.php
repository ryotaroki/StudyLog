<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return view('posts.index', compact('data'));
    }
}
