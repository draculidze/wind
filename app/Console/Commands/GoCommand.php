<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My command for testing';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // получение комментариев в категории (связь HasManyThrough)
        //$category = Category::find(1);
        //dd($category->comments);

        // разные способы реализации связи hasOneThrow
        //$comment = Comment::find(1);
        //dd($comment->post->category->toArray());
        //dd($comment->category->toArray());

        $post = Post::find(5);
        if($post) {
            $post->delete();
            // $post->forceDelete();
        } else {
            $post = Post::withTrashed()->find(5);
            $post->restore();
        }

        dd(Post::withTrashed()->find(5));
    }
}
