<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostTagSeeder extends Seeder
{
    public function run(): void
    {
        Post::find(1)->tags()->attach([
            4 => ['status' => 'active', 'assigned_at' => now()],
            5 => ['status' => 'inactive', 'assigned_at' => now()],
            6 => ['status' => 'active', 'assigned_at' => now()],
        ]);

        Post::find(2)->tags()->attach([
            1 => ['status' => 'active', 'assigned_at' => now()],
            5 => ['status' => 'inactive', 'assigned_at' => now()],
            7 => ['status' => 'active', 'assigned_at' => now()],
        ]);

        Post::find(3)->tags()->attach([
            2 => ['status' => 'inactive', 'assigned_at' => now()],
            3 => ['status' => 'active', 'assigned_at' => now()],
            8 => ['status' => 'active', 'assigned_at' => now()],
            9 => ['status' => 'inactive', 'assigned_at' => now()],
            10 => ['status' => 'active', 'assigned_at' => now()],
        ]);
    }
}
