<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    /*    Почему обращаемся к модели, а не к бд?
        Модель уже имеет привязку к таблице и посредством этого
        мы уже можем использовать зарезервированные методы,
        которые сокрыли в себе sql запросы
    */
    public function __invoke() // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
    {
        $posts = Post::all();
        return view('post.index', compact('posts')); //передаем посты во вьюшку
    }

}
