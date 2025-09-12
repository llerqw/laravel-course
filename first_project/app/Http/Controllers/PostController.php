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
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
        dd('end');
    }

    /*
     * Чтение всех данных: all();
     * Чтение данных с условием: where('условие', значение)->get();
     * Чтение данных с условием только первой записи: where('условие', значение)->first();
     * Возвращается коллекция, поэтому вывод через foreach.
     */
    public function create()
    {
        $postsArr = [
            [
                'title' => 'title of post from phpstorm',
                'content' => 'content of post from phpstorm',
                'image' => 'imagedjjdjd.jpg',
                'likes' => 20,
                'is_published' => 1,

            ],[
                'title' => 'another title of post from phpstorm',
                'content' => 'another content of post from phpstorm',
                'image' => 'jdjd.jpg',
                'likes' => 100,
                'is_published' => 1,

            ]
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
            /*
             * Функция принимает массив,
             * важно чтобы названия колонок совпадали с названиями атрибутов
             */
        }

        dd('created');
    }

    public function update()
    {
        $post = Post::find(5);
        $post->update([
            'title' => 'updated title',
            'content' => 'updated content',
            'image' => 'updated_image.jpg',
            'likes' => 2,
            'is_published' => 1,
        ]);
        dd('updated');
    }


}
