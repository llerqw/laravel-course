<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends Controller
{

    public function __invoke(Post $post) // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

}
