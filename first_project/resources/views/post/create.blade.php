@extends('layouts.main')
@section('content')
    <div>
        this is create post page
    </div>

    <div>
        <a href="{{route('post.index')}}" class="btn btn-outline-primary mt-2 mb-2">Back</a>
    </div>

    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
