<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Post $post, Request $request) // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
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

}
