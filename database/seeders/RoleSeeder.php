<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*foreach(Role::getRoles() as $role) {
            Role::firstOrCreate([
                'name' => $role,
            ]);
        }*/
        Role::firstOrCreate([
            'id' => 1,
            'name' => 'admin'
        ]);
        Role::firstOrCreate([
            'id' => 2,
            'name' => 'user'
        ]);
    }
}
