<?php

namespace App\Console\Commands;

use App\Events\Post\StoredPostEvent;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
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
        //$user = User::find(10);
        //$user->delete(); // удаление с вызовом события Observer'a

        //User::where('id', 10)->delete(); // удаление средствами sql без Observer

        // php artisan make:event Post/StoredPostEvent
        // php artisan make:listener Post/WriteLogListener --event=Post/StoredPostEvent
        //StoredPostEvent::dispatch(); // вызвать event

        $post = Post::find(1);
        StoredPostEvent::dispatch($post); // если вызвать event с параметром, то будет доступен в листенерах
        // но нужно объявить в конструкторе

        dd("end go");
    }
}
