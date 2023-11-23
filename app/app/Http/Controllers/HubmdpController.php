<?php

namespace App\Http\Controllers;
use App\Models\Password;


use Illuminate\Http\Request;

class HubmdpController extends Controller
{
    //
    public function showHubmdp()
    {
        $passwords = Password::all();
        
        return view('hubmdp', ['passwords' => $passwords]);
    }

    public function editPassword($id){
        // Récupérez le mot de passe en fonction de l'ID depuis la base de données
        $password = Password::findOrFail($id);

        // Retournez une vue avec le formulaire de modification du mot de passe
        return view('edit_password', ['password' => $password]);
    }

    public function updatePassword(Request $request, $id){
        // Récupérez le mot de passe en fonction de l'ID depuis la base de données
        $password = Password::findOrFail($id);

        // Mettez à jour le mot de passe avec les nouvelles valeurs du formulaire
        $password->password = $request->input('new_password');
        $password->save();

        // Redirigez l'utilisateur vers une page de confirmation ou autre après la mise à jour
        return redirect()->route('hubmdp')->with('success', 'Mot de passe modifié avec succès !');
    }

}

