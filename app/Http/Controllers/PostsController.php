<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Genre;
use Illuminate\Support\Facades\Log;
class PostsController extends Controller
{
    public function index()
    {
        $data = Post::with('genres')->get();
        // dd($data);
        return view('posts.index', compact('data'));
    }

    public function add()
    {
        return view('posts.add');
    }

    public function create(Request $request)
    {
        $genre = new Genre;
        $genre->genre_name = $request->genre_name;
        $oldgenre = Genre::where('genre_name', $request->genre_name)->get();
        Log::alert($oldgenre);
        if($oldgenre == null) {
            $genre->save();
        }
        else {
            $genre = $oldgenre[0];
        }
        Log::alert($genre);
        $post = new Post;
        $param = $request->all();
        unset($param['_token']);
        $latestPost = Post::latest('id')->first();
        // Log::alert($latestPost);
        $post->id = $latestPost->id + 1;
        $post->genres()->attach($genre->id);
        $post->fill($param)->save();
        return redirect('posts');
    }
}
