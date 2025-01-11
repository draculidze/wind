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
        //$category = User::find(1);
        //dd($category->comments);

        // разные способы реализации связи hasOneThrow
        //$comment = Comment::find(1);
        //dd($comment->post->category->toArray());
        //dd($comment->category->toArray());

        //$post = Post::find(1);
        //dd($post->tags->toArray());

        //$profile = Profile::find(1);
        //dd($profile->tags->toArray());
        //dd($profile->findTags());

        //$profile = Profile::find(1);
        //dd($profile->categories()->distinct()->get()->toArray()); // Все категории, в которых писал профиль

        //$category = Category::find(1);
        //dd($category->tags->toArray()); // все тэги с постами в этой категории

        //$user = User::find(1);
        //dd($user->posts->toArray()); // все посты пользователя через профили

        //$user = User::find(1);
        //dd($user->comments->toArray()); // все комментарии пользователя через профили

        //$comment = Comment::find(1);
        //dd($comment->user);

        $category = Category::find(1);
        dd($category->likes->toArray());

    }
}
