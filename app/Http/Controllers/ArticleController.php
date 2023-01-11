<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('nom')->get();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popularite()
    {
        $articles = Article::orderBy('note_moyenne', 'desc')->get();
        return view('boutique.populaires', ['articles' => $articles]);
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required | min:3 | max:40',
            'description' => 'required | min:3 | max:255',
            'gamme_id' => 'required | min:1 | max:25',
            'prix' => 'required | min:1 | max:10',
            'stock' => 'required | min:1 | max:10'
        ]);

        Article::create([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'gamme_id' => $request->input('gamme_id'),
            'image' => isset($request['image']) ? uploadImage($request['image']) : "image.jpg",
            'prix' => $request->input('prix'),
            'stock' => $request->input('stock')
        ]);

        return redirect()->route('admin.index')->with('message', 'Produit ajouté'); 
    }

    // ___________________________________________________________________________
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('boutique.article', [
            'article' => $article
        ]);
    }

    // ___________________________________________________________________________
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.modifier', ['article' => $article]);
    }

    // ___________________________________________________________________________
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => 'required | min:1| max:40',
            'prix' => 'nullable | min:1 | max:10',
            'stock' => 'nullable | min:1 | max:10'

        ]);

        $article->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'prix' => $request->input('prix'),
            'stock' => $request->input('stock')
        ]);
        return view('articles.modifier', ['article' => $article])->with('message', 'Modificatins effectuées');
    }

    // ___________________________________________________________________________
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
