<?php

namespace App\Console\Commands;

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
        //$post = Post::find(1);
        //dd($post->image);

        //$image = Image::find(1);
        //dd($image->post); // так не надо делать, исправлено ниже

        //$image = Image::find(1);
        //dd($image->imageable);

        //$post = Post::find(1);
        //dd($post->comments);

        //$comment = Comment::find(1);
        //dd($comment->post);

        //$profile = Profile::find(1);
        //dd($profile->likedPosts);

        //$post = Post::find(1);
        //$image = $post->image()->create();
        //dd($image);

        // ======= методы для работы многие ко многим ======
        $post = Post::find(1);

        // attach - добавить в таблицу post_tag записи
        //$post->tags()->attach(10); // может продублировать, даже если такие записи уже есть

        // syncWithoutDetaching - если такой связи нет, то добавит в post_tag
        //$post->tags()->syncWithoutDetaching(11);

        // sync - уничтожает если есть связи, и делает которые только указаны
        //$post->tags()->sync([11, 13]);

        // detach - удалить только эту связь
        //$post->tags()->detach(13); // даже если нет такой связи, то ошибки не будет

        // toggle - если есть - удаляет, если нет - добавляет
        //$post->tags()->toggle(13);

        // updateExistingPivot - в существующей pivot записи обновляет какие-либо данные
        //$post->tags()->updateExistingPivot(11, [
            //'created_at' => now(),
        //]);

        // ======= методы для работы с полиморфами ======
        // такие же
        $profile = Profile::find(1);
        $profile->likedPosts()->attach([5, 10, 15]);
    }
}
