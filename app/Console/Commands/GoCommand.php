<?php

namespace App\Console\Commands;

use App\Models\Log;
use App\Models\Post;
use App\Models\User;
use Database\Factories\PostFactory;
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

        //$post = Post::find(1);
        //StoredPostEvent::dispatch($post); // если вызвать event с параметром, то будет доступен в листенерах
        // но нужно объявить в конструкторе

        //dd("end go");

        //$user = User::find(2);
        /*$user->update([
            'name' => 'Roman'
        ]);*/

        //$user3 = User::find(3);
        //$user3->delete();

        //dd(Log::orderBy('id', 'desc')->limit(3)->get()->toArray());

        // создание профиля через booted в trait
        /*$user2 = User::find(2);
        $user2->profile()->create([
            'login' => 'test113'
        ]);*/

        /*$user2 = User::find(2);
        $profile = $user2->profile;
        dd("in go command");*/

        $post = Post::factory()->create();
        dd($post);

    }
}
