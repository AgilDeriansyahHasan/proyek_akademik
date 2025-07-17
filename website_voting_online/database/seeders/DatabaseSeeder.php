<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'AgilAdmin',
            'email' => 'admin@gmail.com',
            'npm' => '4522210125',
            'password'=>bcrypt('1234567890'),
            'email_verified_at'=>now(),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'AgilUser',
            'email' => 'user@gmail.com',
            'npm' => '4522210121',
            'password'=>bcrypt('1234567890'),
            'email_verified_at'=>now(),
            'role' => 'user',
        ]);
    }
}
