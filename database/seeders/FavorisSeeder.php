<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favoris')->insert([
            'user_id'=>32,
            'article_id'=>1,
        ]);

        DB::table('favoris')->insert([
            'user_id'=>32,
            'article_id'=>2,
        ]);

        DB::table('favoris')->insert([
            'user_id'=>32,
            'article_id'=>3,
        ]);
    }
}
