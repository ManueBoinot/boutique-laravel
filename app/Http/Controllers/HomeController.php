<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Models\Article;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fonction TOP PROMO --------------------------------------------------
        $promo = Campagne::with(['articles' => function ($query) {
            $query->limit(3);
        }])

            ->whereDate('date_debut', '<=', date('Y-m-d'))
            ->whereDate('date_fin', '>=', date('Y-m-d'))
            ->get();

        if (isset($promo[0])) {
            $promo = $promo[0];
        } else {
            $promo = null;
        }

        // Pour affichage de 3 articles random si pas de promo en cours
        
        $articles = Article::limit(3)->get();

        // Fonction TOP RATED --------------------------------------------------
        $top_rated = Article::orderBy('note_moyenne', 'desc')
            ->limit(3)
            ->with(['campagnes' => function ($query) {
                $query->whereDate('date_debut', '<=', date('Y-m-d'))
                    ->whereDate('date_fin', '>=', date('Y-m-d'))
                    ->get();
            }])
            ->get();

        return view('home', ['top_rated' => $top_rated, 'promo' => $promo, 'articles' => $articles]);
    }
}
