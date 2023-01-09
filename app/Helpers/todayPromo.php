<?php 

use App\Models\Campagne;

function todayPromo()
{
    foreach(Campagne::all() as $promo) {
        if ($promo->date_debut <= date('Y-m-d') && $promo->date_fin >= date('Y-m-d')){
            return $promo;
        }
    }
}