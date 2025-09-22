@extends('layouts.main')
@section('content')
    <div>
        this is edit post page
    </div>

    <div>
        <a href="{{route('post.index')}}" class="btn btn-outline-primary mt-2 mb-2">Back</a>
    </div>

    <div>
        <form action="{{route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{$post->image}}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category->id ? ' selected' : '' }}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
