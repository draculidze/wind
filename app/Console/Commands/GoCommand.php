<?php

namespace App\Console\Commands;

use App\Models\Category;
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
        //$user = User::first();
        //$profiles = $user->profiles;
        //dd($profiles);

        //$category = Category::first();
        //dd($category->posts);

        //$post = Post::first();
        //dd($post->category);

        //$post = Post::first();
        //dd($post->tags->toArray());

        //$profile = Profile::first();
        //dd($profile->likedPosts->toArray());

        $post = Post::find(10);
        dd($post->toArray(), $post->likedByProfiles->toArray());
        //dd($post->likedByProfiles->toArray());
    }
}
