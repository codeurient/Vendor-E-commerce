<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory(200)->create();
        User::factory(4)->create();

        $this->call([
            CategorySeeder::class,
            AddressSeeder::class,
            TagSeeder::class,
        ]);

    }
}