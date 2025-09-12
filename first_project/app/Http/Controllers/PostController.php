<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
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
     

/*    Почему обращаемся к модели, а не к бд?
    Модель уже имеет привязку к таблице и посредством этого
    мы уже можем использовать зарезервированные методы,
    которые сокрыли в себе sql запросы
*/
}
