<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        
    ];

    // Fonction qui précise la relation avec la table "Gammes"
    public function gamme()
    {
        return $this->belongsTo(Gamme::class);
    }

    // Fonction qui précise la relation avec la table "Commandes"
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'article_commandes')->withPivot('quantite');
    }

    // Fonction qui précise la relation avec la table "Campagnes"
    public function campagnes()
    {
        return $this->belongsToMany(Campagne::class, 'article_campagnes');
    }

    // Fonction qui précise la relation avec la table "Users"
    public function users()
    {
        return $this->belongsToMany(User::class, 'favoris');
    }

    // Fonction qui précise la relation avec la table "Avis"
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
}
