@extends('layouts.common')
@section('title', 'Posts')
@section('content')
    <table class="table">
        <tr>
            <th>title</th>
            <th>text</th>
            <th>user</th>
            <th>date</th>
            <th>Genre</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->title}}</td>
                <td>{{ $item->content}}</td>
                <td>{{ $item->user_id}}</td>
                <td>{{ $item->created_at}}</td>
                @if ($item->genres != null)
                    @foreach ($item->genres as $genre)
                        <td>{{ $genre->genre_name}}</td>
                    @endforeach
                @endif
            </tr>
        @endforeach
    </table>
@endsection
