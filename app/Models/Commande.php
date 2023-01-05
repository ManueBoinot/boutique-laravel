<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // Fonction qui précise la relation avec la table "Users"
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Fonction qui précise la relation avec la table "Articles"
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_commandes')->withPivot('quantite');
    }

    // Fonction qui précise la relation avec la table "Adresses"
    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }
}
