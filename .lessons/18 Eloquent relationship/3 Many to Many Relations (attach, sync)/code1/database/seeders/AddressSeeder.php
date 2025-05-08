<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            [
                'address' => '4946 Bernard Street Tampa, FL 33602',
                'user_id' => 1
            ],
            [
                'address' => '4384 Eagle Lane Dulutuh, MN 55802',
                'user_id' => 2
            ],
            [
                'address' => '1021 Lincolin Street Camden, NJ 08102',
                'user_id' => 3
            ],
            [
                'address' => '3200 Lowes Alley Delaware, OH 43015',
                'user_id' => 4
            ],
        ];

        foreach ($addresses as $data) {
            Address::create($data);
        }
    }
}
