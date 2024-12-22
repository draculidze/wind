<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show(Post $post)
    {
        //return Post::findOrFail($id);
        return $post;
    }

    public function store(Request $request)
    {
        $dataPost = [
            'author' => 'Dmitry2',
            'title' => 'Новый пост3',
            'category' => 'Не интересное',
            'tag' => 'Жарко',
            'image_path' => 'new2.jpg',
            'description' => 'без описания2',
            'published_at' => '2024-12-23',
            'likes' => 10,
            'views' => 190,
            'status' => 1,
            'is_published' => 1,

        ];
        return Post::create($dataPost);
    }

    public function update(Post $post)
    {
        if($post){
            $dataPost = [
                'author' => 'Dmitry555',
                'title' => 'Новый пост555',
                'category' => 'Отредактированное',
                'tag' => 'Внимание',
                'image_path' => 'new555.jpg',
                'description' => 'Lorem 100',
                'published_at' => '2024-12-22',
                'likes' => 1,
                'views' => 5,
                'status' => 2,
                'is_published' => 0,

            ];
            $post->update($dataPost);
            return $post;
        }
        return false;
    }

    public function destroy(Post $post)
    {
        //if($post){
            $post->delete();
            return response(['message' => 'deleted'], 200);
        //} else {
            //return response(['message' => 'id is not exist'], Response::HTTP_CONFLICT);
        //}
    }
}
