<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request) // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
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

}
