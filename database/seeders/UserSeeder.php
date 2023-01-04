<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'password' => Hash::make("Admin,123"),
            'role_id' => 2,
            'remember_token' => Str::random(10)
        ]);

        // Création de 30 profils aléatoires avec la factory
        \App\Models\User::factory(30)->create();
    }
}
