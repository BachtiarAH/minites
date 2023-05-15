<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        DB::table('table_artikel')->insert([
            'judul_artikel'=>$faker->text(5,50),
            'isi_artikel'=>$faker->text(),
            'id_penulis'=>1,
            'tanggal'=>$faker->date()

        ]);
    }
}
