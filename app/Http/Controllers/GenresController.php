<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Post;
class GenresController extends Controller
{
    public function genre(Request $req)
    {
        $genre = new Genre;
        $genre->genre_name = $req->genre_name;
        $genre->save();

        $post = Post::find($req->post_id);
        $post->genres()->attach($genre->id);
    }
}
