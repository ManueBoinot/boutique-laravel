<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id; // récupération de l'id du user connecté
        $user = User::find($userId); // récupération du user en base de données avec la fonction find()
        $user->load('commandes'); // chargement de ses commandes avec un eager loading
        return view('users.commande', ['user' => $user]); // on retourne la vue pour afficher les commandes en y injectant le user
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (Gate::denies('validation_commande')) {
            abort(403);
        }

        $user = Auth::user();
        $commande = new Commande();
        $commande->numero = rand(10000, 99999);
        $commande->adresse_id = $request->input('adresse');
        $commande->prix = intval($request->input('total')) + intval($request->input('livraison'));
        $commande->user_id = $user->id;
        $commande->save();

        $panier = session('panier');

        foreach ($panier as $article) {

            $commande->articles()->attach($article['id'], ['quantite' => $article['quantite']]);
            $articleInDatabase = Article::find($article['id']);
            $articleInDatabase->stock -= $article['quantite'];
            $articleInDatabase->save();
        }
        session()->forget("panier");

        return redirect()->route('home')->with('message', 'La commande a bien été validée');
    }

    // ___________________________________________________________________________
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // ___________________________________________________________________________
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $commande->load('articles');
        return view('users/detailscommande', ['commande' => $commande]);
    }
}
