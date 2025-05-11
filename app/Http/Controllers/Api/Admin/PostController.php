<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exceptions\PostException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Post\IndexRequest;
use App\Http\Requests\Api\Admin\Post\StoreRequest;
use App\Http\Requests\Api\Admin\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(/*IndexRequest $request*/)
    {
        //$data = $request->validated();

        //$posts = Post::query();
        //$posts = (new PostFilter())->apply($data, $posts);
        $posts = Post::get();
        return PostResource::collection($posts)->resolve();
    }

    public function show(Post $post) {
        $data = [
            'id' => 2,
            'title' => 'testik'
        ];

        $post = Post::firstOrCreate([
            'id' => $data['id']
        ], $data);

        if(!$post->wasRecentlyCreated){
            //throw new \Exception('already exists', Response::HTTP_BAD_REQUEST); // один из самых простых вариантов Exception
            throw  new PostException($post, "вот он!");
        }

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
