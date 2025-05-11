<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*$user = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ];

        $usr = User::firstOrCreate([
            'email' => $user['email'],
        ], $user);

        //$usr->profile()->create(); // убрано, т.к. связь не один к одному
        $profile = Profile::create([
            'user_id' => $usr->id,
            'login' => 'admin',
        ]);*/

        /*$users = User::factory()
            ->has(Profile::factory(1)
                ->has(Post::factory()->count(3)
                    ->has(Category::factory()->count(10))
                    ->has(Tag::factory()->count(10))
                )
            )
            ->create([
                'password' => Hash::make('123'),
            ]);*/

        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            UserSeeder::class,
            //PostSeeder::class,
        ]);
    }
}
