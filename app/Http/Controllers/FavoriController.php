<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FavoriController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id; // récupération de l'id du user connecté
        $user = User::find($userId); // récupération du user en base de données avec la fonction find()
        $user->load('favoris');
        return view('favoris/index', ['user' => $user]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $user->favoris()->attach($request->articleId);
        return back()->with('message', 'Article ajouté aux favoris');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId); 
        $user->favoris()->detach($request->articleId);
        return back()->with('message', 'Article rétiré des favoris');
    
    }
}
