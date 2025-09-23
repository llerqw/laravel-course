<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CreateController extends BaseController
{
    /*
     * Чтение всех данных: all();
     * Чтение данных с условием: where('условие', значение)->get();
     * Чтение данных с условием только первой записи: where('условие', значение)->first();
     * Возвращается коллекция, поэтому вывод через foreach.
     */
    public function __invoke() // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

}
