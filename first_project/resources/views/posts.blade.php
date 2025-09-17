@extends('layouts.main')
@section('content')
    <div>
        this is posts page
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Likes</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">1</th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->likes}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection


