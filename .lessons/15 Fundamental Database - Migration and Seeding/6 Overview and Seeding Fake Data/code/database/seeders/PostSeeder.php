<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // DB::table('posts')->insert([
        //     'title' => Str::random(20),
        //     'description' => Str::random(200),
        //     'status' => 1,
        //     'publish_date' => date('Y-m-d'),
        //     'user_id' => 1,
        // ]);

        $faker = Faker::create();

        DB::table('posts')->insert([
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'status' => 1,
            'publish_date' => $faker->date(),
            'user_id' => 1,
        ]);
    }
}