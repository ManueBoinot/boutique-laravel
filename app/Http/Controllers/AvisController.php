<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Avis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'texte' => 'nullable | min:3 | max: 191',
            'note' => 'required'
        ]);
        
        $articleId = $request->input('article_id');
        $article = Article::find($articleId);
     
       

        Avis::create([
            'texte' => $request->input('texte'),
            'note' => $request->input('note'),
            'user_id' => $request->input('user_id'),
            'article_id' => $request->input('article_id'),
        ]);


        $note = Avis::where('article_id', $article->id)->avg('note');
        $article->update(['note_moyenne' => $note]);
        return redirect()->route('articles.show', ['article' => $article])->with('message','Votre avis a bien été posté, Merci.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $article =$request->input('article_id'); 
        Avis::where('id', $id)->delete();
        return redirect()->route('articles.show', ['article' => $article])->with('message','Le commentaire a bien été supprimé');
  
    }
}