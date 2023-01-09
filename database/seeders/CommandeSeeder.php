<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commande;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commande::create([
            'user_id'=>32,
            'adresse_id'=>61,
            'numero'=>rand(1000000,9999999),
            'prix'=>150,
        ]);
        
        Commande::create([
            'user_id'=>32,
            'adresse_id'=>61,
            'numero'=>rand(1000000,9999999),
            'prix'=>110,
        ]);

        Commande::create([
            'user_id'=>1,
            'adresse_id'=>1,
            'numero'=>rand(1000000,9999999),
            'prix'=>rand(15,500),
        ]);

        Commande::create([
            'user_id'=>1,
            'adresse_id'=>1,
            'numero'=>rand(1000000,9999999),
            'prix'=>rand(15,500),
        ]);
    }

}
