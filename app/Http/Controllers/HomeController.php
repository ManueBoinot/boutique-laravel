<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Models\Article;
use App\Models\Avis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        return view('home', ['promo' => $promo]);

        // Fonction TOP RATED --------------------------------------------------
        // $top_rated = Avis::with(['articles' => function ($query) {
        //     $query->limit(3);
        // }])
        
        // ->where('note', '==', '5')
        // ->get();

        // return view('home', ['top_rated' => $top_rated]);
    }
}
