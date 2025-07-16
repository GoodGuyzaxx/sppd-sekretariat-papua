<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create([
            'role_name' => 'admin',
        ]);

        Role::create([
            'role_name' => 'sekretaris',
        ]);

        Role::create([
            'role_name' => 'kasubag',
        ]);

        Role::create([
            'role_name' => 'staff',
        ]);

        $this->call([
            UserSeeder::class,
            ProvinsiSeeder::class
        ]);

    }
}
