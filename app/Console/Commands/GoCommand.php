<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Profile;
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
        $dataPost = [
            'author' => 'Dmitry2',
            'title' => 'Новый пост2',
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
        $post = Post::create($dataPost);

        //dd(11111111111);
        /*$data = [
            'birthed_at' => '2024-10-03',
            'registered_at' => '2024-10-03',
            'address' => 'Russia',
            'phone' => '+79997103210',
            'avatar' => 'no_avatar.png',
            'description' => 'no description',
            'gender' => 'male',
            'user' => 'human',
        ];
        $profile = Profile::create($data);*/

        $profile = Profile::find(1);
        //$profile->update(['phone' => '1234567890']);
        //dd($profile);

        if($profile)
            $profile->delete();
        dd("profile is deleted");
    }
}
