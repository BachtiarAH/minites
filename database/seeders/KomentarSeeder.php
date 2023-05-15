<?php

namespace Database\Seeders;

use Faker\Provider\en_US\Text;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        DB::table('table_komentar')->insert([
            'nama'=>$faker->name(5,50),
            'isi_komentar'=> $faker->text(),
            'email'=>$faker->email(20,30)
        ]);
        
        
    }
}
