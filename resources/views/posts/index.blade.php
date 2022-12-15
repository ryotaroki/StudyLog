@extends('layouts.common')
@section('title', 'Posts')
@section('content')
    <table class="table">
        <tr>
            <th>title</th>
            <th>text</th>
            <th>user</th>
            <th>date</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->name}}</td>
                <td>{{ $item->text}}</td>
                <td>{{ $item->user_id}}</td>
                <td>{{ $item->created_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection
