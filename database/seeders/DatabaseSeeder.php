<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this ->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdresseSeeder::class,
            GammeSeeder::class,
            ArticleSeeder::class,
            CampagneSeeder::class,
            ArticleCampagneSeeder::class,
            AvisSeeder::class,
            CommandeSeeder::class,
            CommandeArticleSeeder::class,
            FavorisSeeder::class
          ]);
    }
}
