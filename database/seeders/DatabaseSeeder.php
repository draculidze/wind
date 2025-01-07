<?php

namespace Database\Seeders;

use App\Models\Profile;
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
        $user = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ];

        $usr = User::firstOrCreate([
            'email' => $user['email'],
        ], $user);

        //$usr->profile()->create(); // убрано, т.к. связь не один к одному
        Profile::create([
            'user_id' => $usr->id,
            'login' => 'admin',
        ]);

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
        ]);
    }
}
