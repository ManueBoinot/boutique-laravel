<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCampagneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_campagnes')->insert([
            'article_id' => 1,
            'campagne_id' => 1,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 5,
            'campagne_id' => 1,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 9,
            'campagne_id' => 1,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 13,
            'campagne_id' => 1,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 2,
            'campagne_id' => 2,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 7,
            'campagne_id' => 2,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 14,
            'campagne_id' => 2,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 4,
            'campagne_id' => 2,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 8,
            'campagne_id' => 3,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 10,
            'campagne_id' => 3,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 6,
            'campagne_id' => 3,
        ]);

        DB::table('article_campagnes')->insert([
            'article_id' => 3,
            'campagne_id' => 3,
        ]);
    }
}
<<<<<<< HEAD

=======
>>>>>>> Tony
