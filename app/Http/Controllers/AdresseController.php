<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;

class AdresseController extends Controller
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
            'rue' => 'required|min:5|max:191',
            'code_postal' => 'min:5',
            'commune' => 'required|min:5|max:191'
        ]);

        Adresse::create([
            'rue' => $request->rue,
            'code_postal' => $request->code_postal,
            'commune' => $request->commune,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('users.show', Auth::user())->with('message', 'Adresse ajoutée');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adresse $adress)
    {

        $request->validate([
            'rue' => ['required', 'string', 'max:191'],
            'code_postal' => ['required', 'string', 'max:191'],
            'commune' => ['required', 'string', 'max:191',],

        ]);

        $adress->update([
            'rue' => $request->input('rue'),
            'code_postal' => $request->input('code_postal'),
            'commune' => $request->input('commune')
        ]);

        return view('users.moncompte', ['user' => Auth::user()])->with('message', 'Modifications effectuées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adresse $adress)
    {
        $adress->delete();
        return redirect()->route('users.show', Auth::user())->with('message', 'Adresse supprimée !');
    }
}
