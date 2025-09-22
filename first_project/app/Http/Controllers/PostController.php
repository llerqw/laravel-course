<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
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

        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags); // продолжаем sql-запрос и создаем связи с тегами

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->tags()->sync($tags); // удаляет старые связи и создает новые
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
