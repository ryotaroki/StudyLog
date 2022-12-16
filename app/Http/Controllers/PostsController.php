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
        // 新規投稿のジャンルのインスタンス作成
        $genre = new Genre;
        // リクエストに格納されているジャンル名を取り出す
        $genre->genre_name = $request->genre_name;
        // ジャンル名がすでにテーブルに登録されているか確認。
        $oldgenre = Genre::where('genre_name', $request->genre_name)->get();
        Log::alert($oldgenre);
        // ジャンル名が登録されていなかった場合、新規で登録処理
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

    public function show(Request $request)
    {
        $post = Post::find($request->id);
        $contents = $post->content;
        $contents = explode('。', $contents);
        array_pop($contents);
        // dd($contents);
        return view('posts.show', ['post' => $post, 'contents' => $contents]);
    }
}
