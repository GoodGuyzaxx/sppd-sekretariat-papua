<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Sekretaris',
            'email' => 'sekretaris@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'kasubag',
            'email' => 'kasubag@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);

        DB::table('users')->insert([
            'name' => 'staff',
            'email' => 'staff@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 4,
        ]);
    }
}
