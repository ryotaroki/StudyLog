@extends('layouts.common')
@section('title', 'show')
@section('content')
    <div class="article-header">
        <h2 style="text-align: center; margin-top: 30px;">{{ $post->title}}</h2>
    </div>
    <div class="article-main" style="border: 1px solid #999; padding: 10px;">
        <h3>記録</h3>
        <div class="text-area">
            @foreach ($contents as $content)
                <h2>{{ $content . '。' }}</h2>
            @endforeach
        </div>
    </div>
    <div class="genre">
        <h5 style="float: right;">登録ジャンル::{{($post->genres[0]->genre_name)}}</h5>
    </div>
@endsection
