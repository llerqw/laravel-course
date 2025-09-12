<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::find(1);
        dump($post->title);
        dump($post->likes);
    }

/*    Почему обращаемся к модели, а не к бд?
    Модель уже имеет привязку к таблице и посредством этого 
    мы уже можем использовать зарезервированные методы,
    которые сокрыли в себе sql запросы
*/
}
