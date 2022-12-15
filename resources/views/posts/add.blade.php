@extends('layouts/.common')
@section('title', '新規記事')
@section('content')
    <form action="/post/create" method="post">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Content</label>
            <input type="text" name="content" class="form-control">
        </div>
        <div class="form-group">
            <label>genre</label>
            <input type="text" name="genre_name" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-info">
        </div>
    </form>
@endsection
