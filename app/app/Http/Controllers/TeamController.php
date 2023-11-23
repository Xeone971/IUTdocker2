<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Team;


class TeamController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        // Vérification et création de l'équipe
        $team = Team::create([
            'name' => $request->input('name'),
            'user_id' => $user->id,
        ]);
        $user->teams()->syncWithoutDetaching([$team->id]);
        // Autres traitements après la création de l'équipe

        return redirect()->route('/')->with('success', 'Équipe créée avec succès !');
    }
}
