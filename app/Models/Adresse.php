<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    // Fonction qui précise la relation avec la table "Users"
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Fonction qui précise la relation avec la table "Commandes"
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    protected $fillable = [
        'rue',
        'code_postal',
        'commune',
        'user_id',
    ];
}

