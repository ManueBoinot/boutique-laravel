<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;       

class CommandeController extends Controller
{
    public function valider (Request $request){
       
        $user = Auth::user();
        $commande = new Commande();
        $commande->numero = rand(10000, 99999);
        $commande->adresse_id = $request->input('adresse');
        $commande->prix = $request->input('total');
        $commande->user_id = $user->id;
        $commande->save();
 
        $panier = session('panier');

        foreach ($panier as $article) {

            $commande->articles()->attach($article['id'], ['quantite' => $article['quantite']]);
            $articleInDatabase = Article::find($article['id']);
            $articleInDatabase->stock -= $article['quantite'];
            $articleInDatabase->save();
        }

       
   
    }
}
