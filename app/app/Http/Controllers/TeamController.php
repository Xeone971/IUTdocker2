<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;


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

    public function show(int $id) {
        $user = auth()->user();
        $team = Team::find($id);
    
        // Récupération des membres de l'équipe
        $members = $team->users();
    
        // Filtrage pour exclure l'utilisateur actuel
        $otherUsers = User::whereNotIn('id', $members->pluck('id'))
                          ->where('id', '!=', $user->id)
                          ->get();
    
        return view('ajoutTeam', [
            "team" => $team,
            'members' => $members,
            'otherUsers' => $otherUsers,
        ]);
    }

   
    public function showTeams()
    {
        $user = auth()->user();
        $teams = $user->teams()->get();
        // $user = auth()->user();
        // $teams = $user->teams;

        return view('hubteam', ['teams' => $teams]);

    }

    public function processForm(Request $request)
    {
        $teamId = $request->input('team');
        $memberId = $request->input('member');

        // Logique pour ajouter le membre à l'équipe
        $team = Team::findOrFail($teamId);
        $user = User::findOrFail($memberId);
        
        $team->users()->syncWithoutDetaching([$user->id]);

        return redirect()->back()->with('success', 'Membre ajouté avec succès !');
    }
}
