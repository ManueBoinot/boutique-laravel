<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 'nom variable dans vue' => $variable
        $user->load('adresses');
        return view('users/moncompte', ['user' => $user]);
    }

    // ___________________________________________________________________________
    // Affichage des infos utilisateur
    public function profil(User $user)
    {
        return view('users.moncompte', ['user' => $user]);
    }

    // ___________________________________________________________________________
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

    // ___________________________________________________________________________
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'prenom' => ['required', 'string', 'max:191'],
            'nom' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191',],

        ]);

        $user->prenom = $request->input('prenom');
        $user->nom = $request->input('nom');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('users.show', $user)->with('message', 'Modifications effectuées');
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
