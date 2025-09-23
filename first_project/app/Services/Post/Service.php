<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags); // продолжаем sql-запрос и создаем связи с тегами
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->tags()->sync($tags); // удаляет старые связи и создает новые
        $post->update($data);
    }
}
