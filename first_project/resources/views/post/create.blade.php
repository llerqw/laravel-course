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
                <input value="{{ old('title') }}" type="text" class="form-control" id="title" name="title">
                @error('title')
                <p class="mt-2 text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                @error('content')
                <p class="mt-2 text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input {{ old('image') }} type="text" class="form-control" id="image" name="image">
                @error('image')
                <p class="mt-2 text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $categories->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="mt-2 text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" multiple id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            {{ old('tags') == $categories->id ? ' selected' : ''}}
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                @error('tags')
                <p class="mt-2 text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
