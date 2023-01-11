<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;

class CampagneController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campagnes = Campagne::whereDate('date_fin', '>=', date('Y-m-d'))
            ->get();

        return view('boutique.campagne', ['campagnes' => $campagnes]);
    }
}
