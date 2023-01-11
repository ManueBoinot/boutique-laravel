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
        return view('admin.modifier-campagnes', ['campagne' => $campagne]);
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
            'nom' => 'min:3| max:25',
            'date_debut' => 'date | after_or_equal:today',
            'date_fin' => 'date | after:date_debut',
            'reduction' => 'min:1| max:100',

        ]);

        $campagne->update([
            'nom' => $request->input('nom'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'reduction' => $request->input('reduction')
        ]);
        return view('admin.index', ['campagne' => $campagne])->with('message', 'Modification effectuée');
    }
}
