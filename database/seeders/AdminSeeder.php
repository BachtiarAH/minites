<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {

        $faker = Faker::create();
        DB::table('table_admin')->insert([
            'username' => $faker->userName(5,25),
            'password' => $faker->password(5,25),
        ]);
    }
}
