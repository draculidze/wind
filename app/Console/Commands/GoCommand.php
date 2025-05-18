<?php

namespace App\Console\Commands;

//use App\Models\Log;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Database\Factories\PostFactory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Exception;

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
        $post = Post::factory()->create();

        $post = Post::find(2);
        $post->delete();
        //Log::channel('post')->info("this is my {id} bla bla", ['id' => $post->id]);
        //Log::channel('post')->info("post text {post}", ['post' => $post]);
        //Log::channel('post')->info("testik");
    }
}
