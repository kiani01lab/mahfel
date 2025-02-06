<?php

namespace Database\Seeders;

use Domain\Shared\Models\User;
use Domain\Threads\Models\Thread;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Thread::factory(20)->for(
            User::factory()->create([
                'first_name' => 'Ali',
                'last_name' => 'Kiani',
                'email' => 'kiani@example.com',
                'password' => '12345678',
            ])
        , 'author')->create();
    }
}
