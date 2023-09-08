<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController
{

    public function showHome(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }

    public function showForm(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('form');
    }

    public function traiterFormulaire(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:15',
            'commentaire' => 'required|string|max:500',
        ]);

        $data = $request->only(['nom', 'prenom', 'email', 'telephone', 'commentaire']);
        $request->session()->push('formdata', $data);

        return redirect()->route('show.formulaire.data');
    }



    public function showFormulaireData(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->session()->get('formdata', []);

        return view('formdata', compact('data'));
    }


}
