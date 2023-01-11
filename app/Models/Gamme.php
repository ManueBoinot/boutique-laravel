<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamme extends Model
{
    use HasFactory;

    protected $fillable = [
        'gamme'
        
    ];

    // Fonction qui précise la relation avec la table "Articles"
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
