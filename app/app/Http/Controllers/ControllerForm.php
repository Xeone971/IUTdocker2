<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\Password;
use Illuminate\Support\Facades\Auth;

class ControllerForm extends BaseController
{
    public function checKForm(Request $request)
    {
        $rules = [
            'URL' => 'required|string|url',
            'login' => 'required|string|',
            'MDP' => 'required|string',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect('/gestionMdp')->withErrors($validator);
        }

        $user = Auth::user()->id;
        
        Password::create([
            "site" =>$request->URL,
            "login" =>$request->login,
            "password" =>$request->MDP,
            "user_id" => $user
        ]);
    
        // // Save the data to the database
        // $url = $_POST['URL'];
        // $login = $_POST['login'];
        // $mdp = $_POST["MDP"];
        // $data = array('URL' => $url,'login' => $login,'MDP' => $mdp);
        // $json = json_encode($data);
        // Storage::put(time().'.json', $json);
        // // return redirect("/welcome")->withErrors($validator);
        // // return redirect('welcome')->route('welcome');
        // return redirect('/');

          // Créer un nouvel enregistrement dans la table "passwords"
        //   $url = $request->input('URL');
        //   $login = $request->input('login'); // Utilisez "login" au lieu de "email"
        //   $mdp = $request->input('MDP');
  
        //   $password = new Password;
        //   $password->site = $url;
        //   $password->login = $login; // Utilisez "login" au lieu de "email"
        //   $password->password = bcrypt($mdp);
        //   $password->user_id = auth()->user()->id; // Vous devrez ajuster cela en fonction de votre logique d'authentification
  
        //   $password->save();

          return redirect('/hubmdp');
    }
}

