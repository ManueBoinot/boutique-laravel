<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gamme;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gammes = Gamme::with('articles')->get();
        return view('gammes.index', ['gammes' => $gammes]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gamme' => ['required', 'string', 'max:191']
        ]);
        Gamme::create(['gamme' => $request->gamme]);
        return back()->with('message', 'Gamme créée avec succès');
    }

    // ___________________________________________________________________________
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

    // ___________________________________________________________________________
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gamme $gamme)
    {
        return view('gammes.modif',['gamme'=>$gamme]);
    }

    // ___________________________________________________________________________
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gamme $gamme)
    {
        $request->validate([
            'gamme' => ['required', 'string', 'max:191']
        ]);

        $gamme->update([
            'gamme' => $request->input('gamme'),
        ]);

        return redirect()->route('admin.index')->with('message', 'Modification de la gamme effectuée');
    }

    // ___________________________________________________________________________
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->delete();
        return back()->with('message', 'Gamme supprimée');
    }
}
