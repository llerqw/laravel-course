@extends('layouts.main')
@section('content')
    <div>
        this is post page
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
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->likes}}</td>
            </tr>
        </tbody>
    </table>

    <div>
        <a href="{{route('post.index')}}" class="btn btn-outline-primary mt-2 mb-2 my-3">Back</a>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-outline-success mt-2 mb-2">Edit</a>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-outline-danger mt-2 mb-2" value="Delete">
        </form>

    </div>

@endsection


