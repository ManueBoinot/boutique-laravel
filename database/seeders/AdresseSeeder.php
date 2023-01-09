<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adresse;

class AdresseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adresse::create([
            'rue' => '15 impasse Jean Bouin',
            'code_postal' => '79000',
            'commune' => 'Niort',
            'user_id' => 32
        ]);
        // Création de 20 profils aléatoires avec la factory
        \App\Models\Adresse::factory(60)->create();
    }
}
