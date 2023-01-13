<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class CampagneController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $campagnes = Campagne::with('articles')
            ->whereDate('date_fin', '>=', date('Y-m-d'))
            ->get();

        return view('boutique.campagne', ['campagnes' => $campagnes]);
    }

    // ___________________________________________________________________________
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required | min:3 | max:25',
            'date_debut' => 'required | date | after_or_equal:today',
            'date_fin' => 'required | date | after:date_debut',
            'reduction' => 'required | min:1 | max:100 ',
        ]);

        $campagne = Campagne::create($request->all());

        foreach ($request->request as $key => $value) {
            if (str_starts_with($key, 'article')) {
                $campagne->articles()->attach([$value]);
            }
        }

        return redirect()->route('admin.index')->with('message', 'Nouvelle campagne ' . $request->nom . ' créée');
    }

    // ___________________________________________________________________________
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campagne $campagne)
    {
        $campagneArticlesIds = DB::table('article_campagnes')->where('campagne_id', '=', $campagne->id)->get('article_id');
        $articles = Article::all();

        return view('admin.campagne-modifier', ['campagne' => $campagne, 'articles' => $articles, 'campagneArticlesIds' => $campagneArticlesIds]);
    }

    // ___________________________________________________________________________
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campagne $campagne)
    {
        $request->validate([
            'nom' => 'required | min:3 | max:25',
            'date_debut' => 'required | date',
            'date_fin' => 'required | date',
            'reduction' => 'required | min:1 | max:100 ',
        ]);

        $campagne->update($request->all());

        $campagne->load('articles');

        foreach ($campagne->articles as $article) {
            $campagne->articles()->detach($article);
        }

        foreach ($request->request as $key => $value) {
            if (str_starts_with($key, 'article')) {
                $campagne->articles()->attach([$value]);
            }
        }
        return redirect()->route('admin.index')->with('message', 'Campagne " ' . $request->nom . ' " mise à jour avec succès');
    }

    // ___________________________________________________________________________
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campagne $campagne)
    {
        $campagne->delete();

        return redirect()->route('admin.index')->with('message', 'La campagne a bien été supprimée');
    }
}
