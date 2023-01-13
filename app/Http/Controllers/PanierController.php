<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PanierController extends Controller
{

    public function afficher()
    {
        $user = Auth::user();
        // $user = User::find(Auth::user()->id);
        if ($user) {
            $user->load('adresses');
        }

        return view('panier.afficher', ['user' => $user]);
    }

    // ___________________________________________________________________________
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function ajouter(Article $article, Request $request)
    {
        $panier = session()->get('panier');
        $quantite = $request->input('quantite');

        $detail_article = [
            'id' => $article->id,
            'nom' => $article->nom,
            'description' => $article->description,
            'image' => $article->image,
            'prix' => $article->prix,
            'quantite' => $quantite,

        ];
        

        $panier[$article->id] = $detail_article;

        session()->put('panier', $panier);

        return redirect()->route('panier.afficher')->with('message', 'Le produit a été ajouté/modifié');
    }

    // ___________________________________________________________________________
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function supprimer(Article $article)
    {
        $panier = session()->get('panier');
        unset($panier[$article->id]);
        session()->put('panier', $panier);

        return redirect()->route('panier.afficher')->with('message', 'Le produit a bien été supprimé');
    }

    // ___________________________________________________________________________    
    # Vider le panier
    public function vider()
    {
        session()->forget('panier');
        return redirect()->route('panier.afficher')->with('message', 'Le panier a été vidé');
    }
}
