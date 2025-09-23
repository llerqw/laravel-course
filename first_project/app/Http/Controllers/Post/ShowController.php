<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Post $post) // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
    {
        return view('post.show', compact('post'));
    }

}
