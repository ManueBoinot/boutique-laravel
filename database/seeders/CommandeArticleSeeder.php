<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles_commandes')->insert([
            'commande_id'=>1,
            'article_id'=>1,
            'quantite'=>5,
        ]);

        DB::table('articles_commandes')->insert([
            'commande_id'=>1,
            'article_id'=>2,
            'quantite'=>3,
        ]);

        DB::table('articles_commandes')->insert([
            'commande_id'=>2,
            'article_id'=>1,
            'quantite'=>5,
        ]);

        DB::table('articles_commandes')->insert([
            'commande_id'=>3,
            'article_id'=>1,
            'quantite'=>5,
        ]);

        DB::table('articles_commandes')->insert([
            'commande_id'=>4,
            'article_id'=>1,
            'quantite'=>5,
        ]);
    }
}
