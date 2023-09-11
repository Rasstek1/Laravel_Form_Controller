<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            // autres validations
        ]);

        Profile::create($request->all());
        return redirect()->route('profiles.index')->with('success', 'Profile créé avec succès.');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'nom' => 'required',
            // autres validations
        ]);

        $profile->update($request->all());
        return redirect()->route('profiles.index')->with('success', 'Profile mis à jour avec succès.');
    }

    public function destroy(Profile $profile): \Illuminate\Http\RedirectResponse
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile supprimé avec succès.');
    }
}
