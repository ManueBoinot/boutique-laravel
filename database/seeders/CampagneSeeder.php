<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campagne;

class CampagneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Campagne::create([
            'nom' => 'Fêtes de fin d\'année',
            'date_debut' => '2022-12-15',
            'date_fin' => '2023-01-15',
            'reduction' => 15,
        ]);

        Campagne::create([
            'nom' => 'Pâques',
            'date_debut' => '2023-04-03',
            'date_fin' => '2023-04-08',
            'reduction' => 10,
        ]);

        Campagne::create([
            'nom' => 'Saint Valentin',
            'date_debut' => '2023-02-07',
            'date_fin' => '2023-02-14',
            'reduction' => 15,
        ]);
    }
}
