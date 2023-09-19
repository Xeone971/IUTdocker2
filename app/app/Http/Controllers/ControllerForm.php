<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;


class ControllerForm extends BaseController
{
    public function checKForm(Request $request)
    {
        $rules = [
            'URL' => 'required|string|url',
            'Email' => 'required|string|email',
            'MDP' => 'required|string',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect('/gestionMdp')->withErrors($validator);
        }
    
        // Save the data to the database
        $url = $_POST['URL'];
        $email = $_POST['Email'];
        $mdp = $_POST["MDP"];
        $data = array('URL' => $url,'EMAIL' => $email,'MDP' => $mdp);
        $json = json_encode($data);
        Storage::put(time().'.json', $json);
        // return redirect("/welcome")->withErrors($validator);
        // return redirect('welcome')->route('welcome');
        return redirect('/');
    }
}

