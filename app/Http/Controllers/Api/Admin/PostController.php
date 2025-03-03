<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Post\IndexRequest;
use App\Http\Requests\Api\Admin\Post\StoreRequest;
use App\Http\Requests\Api\Admin\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        //$posts = Post::query();
        //$posts = (new PostFilter())->apply($data, $posts);
        $posts = Post::filter($data)->get();
        return PostResource::collection($posts)->resolve();
    }

    public function show(Post $post) {
        return PostResource::make($post)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();
    }

    public function update(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        $post->update($data);
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response(['message' => 'deleted'], 200);
    }
}
