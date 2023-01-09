<?php

use App\Models\Campagne;

function ifPromo($article_id)
{
    foreach (Campagne::all() as $promo) {
        if ($promo->date_debut <= date('Y-m-d') && $promo->date_fin >= date('Y-m-d')) {
            foreach ($promo->articles as $article) {
                if ($article->id === $article_id)
                    return $promo;
            }
            return null;
        }
    }
}
