<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'texte',
        'note',
        'user_id',
        'article_id'

    ];

    // Fonction qui précise la relation avec la table "Users"
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Fonction qui précise la relation avec la table "Articles"
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
