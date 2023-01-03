<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'gamme_id' => '1',
            'nom' => 'Truffes noir',
            'description' => 'L\'appellation « truffes » ne peut s\'appliquer qu\'à un bonbon de chocolat, produit de la taille d\'une bouchée, dans lequel le chocolat représente au moins 25 % du poids total du produit et les matières grasses proviennent exclusivement du cacao et de produits laitiers.',
            'prix' => '20',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '1',
            'nom' => 'Mendiants noir',
            'description' => 'Le mendiant en chocolat est une confiserie composée d’un palet de chocolat surmonté de quatre fruits secs ou lamelles de peau d’agrume confites.',
            'prix' => '15',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '1',
            'nom' => 'Orangettes noir',
            'description' => 'Une orangette est une écorce d\'orange confite de façon artisanale et enrobée d\'une fine couche de délicieux chocolat.',
            'prix' => '12',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '1',
            'nom' => 'Escargots noir',
            'description' => 'Laissez-vous surprendre par ce chocolat à la forme originale, créé par Etienne Lanvin dans les années 1930. Appréciez le parfum subtil du praliné, né de la juste torréfaction des amandes et des noisettes entières. Croquez la fine couche de chocolat... Et goûtez enfin ce praliné riche, fruité, onctueux en bouche et fondant au palais...',
            'prix' => '10',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '2',
            'nom' => 'Truffes lait',
            'description' => 'L\'appellation « truffes » ne peut s\'appliquer qu\'à un bonbon de chocolat, produit de la taille d\'une bouchée, dans lequel le chocolat représente au moins 25 % du poids total du produit et les matières grasses proviennent exclusivement du cacao et de produits laitiers.',
            'prix' => '22',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '2',
            'nom' => 'Mendiants lait',
            'description' => 'Le mendiant en chocolat est une confiserie composée d’un palet de chocolat surmonté de quatre fruits secs ou lamelles de peau d’agrume confites.',
            'prix' => '17',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '2',
            'nom' => 'Orangettes lait',
            'description' => 'Une orangette est une écorce d\'orange confite de façon artisanale et enrobée d\'une fine couche de délicieux chocolat.',
            'prix' => '14',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '2',
            'nom' => 'Escargots lait',
            'description' => 'Laissez-vous surprendre par ce chocolat à la forme originale, créé par Etienne Lanvin dans les années 1930. Appréciez le parfum subtil du praliné, né de la juste torréfaction des amandes et des noisettes entières. Croquez la fine couche de chocolat... Et goûtez enfin ce praliné riche, fruité, onctueux en bouche et fondant au palais...',
            'prix' => '12',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '3',
            'nom' => 'Truffes blanc',
            'description' => 'L\'appellation « truffes » ne peut s\'appliquer qu\'à un bonbon de chocolat, produit de la taille d\'une bouchée, dans lequel le chocolat représente au moins 25 % du poids total du produit et les matières grasses proviennent exclusivement du cacao et de produits laitiers.',
            'prix' => '23',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '3',
            'nom' => 'Mendiants blanc',
            'description' => 'Le mendiant en chocolat est une confiserie composée d’un palet de chocolat surmonté de quatre fruits secs ou lamelles de peau d’agrume confites.',
            'prix' => '18',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '3',
            'nom' => 'Orangettes blanc',
            'description' => 'Une orangette est une écorce d\'orange confite de façon artisanale et enrobée d\'une fine couche de délicieux chocolat.',
            'prix' => '13',
            'image' => '',
            'stock' => '10',
        ]);

        Article::create([
            'gamme_id' => '3',
            'nom' => 'Escargots blanc',
            'description' => 'Laissez-vous surprendre par ce chocolat à la forme originale, créé par Etienne Lanvin dans les années 1930. Appréciez le parfum subtil du praliné, né de la juste torréfaction des amandes et des noisettes entières. Croquez la fine couche de chocolat... Et goûtez enfin ce praliné riche, fruité, onctueux en bouche et fondant au palais...',
            'prix' => '9',
            'image' => '',
            'stock' => '10',
        ]);

    }
}
