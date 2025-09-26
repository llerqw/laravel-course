<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    /*    Почему обращаемся к модели, а не к бд?
        Модель уже имеет привязку к таблице и посредством этого
        мы уже можем использовать зарезервированные методы,
        которые сокрыли в себе sql запросы
    */
    public function __invoke(FilterRequest $request) // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        return view('post.index', compact('posts')); //передаем посты во вьюшку
    }

}
