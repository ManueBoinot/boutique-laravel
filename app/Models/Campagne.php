<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;

    // Fonction qui précise la relation avec la table "Articles"
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_campagnes');
    }
}
