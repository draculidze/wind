<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();
        if(!$tags)
            Tag::factory(10)->create();
        $categories = Category::all();
        if(!$categories)
            Category::factory(10)->create();

        // создаём пользователей с определенным паролем
        User::factory(10)
        ->create([
            'password' => Hash::make('123'),
        ])
        ->each(function ($user) {
            Profile::factory(rand(1,3))
                ->create(['user_id' => $user->id])
                ->each(function ($profile) {
                    Post::factory(rand(1,3))
                        ->hasComments(2, [ // добавляем комментарии к посту
                            'profile_id' => $profile->id,
                        ])
                        //->for(Category::inRandomOrder()->first()) // добавление категории посту
                        ->hasAttached(Tag::inRandomOrder()->limit(rand(1,3))->get()) // добавляем тэги к посту
                        //->hasAttached($profile, ['profile_id' => $profile->id], 'likedByProfiles') // лайки поста от этого профиля
                        ->hasAttached($profile, ['profile_id' => $profile->id], 'viewedByProfiles') // просмотры поста от этого профиля
                        ->create([
                            'profile_id' => $profile->id,
                            'category_id' => Category::inRandomOrder()->first()
                        ])
                        ->each(function ($post) {
                            // генерация лайков для поста случайными профилями (это 2-й вариант, первый вариант выше)
                            $likedByProfiles = Profile::inRandomOrder()->limit(rand(1,5))->pluck('id');
                            $post->likedByProfiles()->attach($likedByProfiles, ['created_at' => now()]);
                        });
                });
        });
    }
}
