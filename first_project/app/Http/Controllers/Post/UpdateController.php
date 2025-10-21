<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request) // из ООП. как только из роута обратимся к этому классу выполнится этот метод. Дословно переводится как призывать
    {
        $data = $request->validated();

        $post = $this->service->update($post, $data);
        return $post instanceof Post ? $post : new PostResource($post);
//        return new PostResource($post);

//        return redirect()->route('post.show', $post->id);
    }

}
