<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /*    Почему обращаемся к модели, а не к бд?
        Модель уже имеет привязку к таблице и посредством этого
        мы уже можем использовать зарезервированные методы,
        которые сокрыли в себе sql запросы
    */
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts')); //передаем посты во вьюшку
    }

    /*
     * Чтение всех данных: all();
     * Чтение данных с условием: where('условие', значение)->get();
     * Чтение данных с условием только первой записи: where('условие', значение)->first();
     * Возвращается коллекция, поэтому вывод через foreach.
     */
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }


    public function delete()
    {
        $post = Post::find(3);
        $post->delete();
        dd('deleted');
    }


    public function firstOrCreate()
    {
        $post = Post::firstOrCreate(
            [
                'title' => 'some post title',
            ],
            [
                'title' => 'some post title',
                'content' => 'some post content',
                'image' => 'some_img.jpg',
                'likes' => 20,
                'is_published' => 1,
            ]);
        dump($post->content);
        dd('firstOrCreated');
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate(
            [
                'title' => 'some post title',
            ],
            [
                'title' => 'some post title',
                'content' => 'updateOrCreate post content',
                'image' => 'some_img.jpg',
                'likes' => 20,
                'is_published' => 1,
            ]);
        dump($post->content);
        dd('updateOrCreated');
    }
}
