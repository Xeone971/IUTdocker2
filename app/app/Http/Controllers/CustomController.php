<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CustomController extends Controller
{
    public function home(): View
    {
        return view('welcome');
    }

    public function gestionMdp(): View
    {
        return view('gestionMdp');
    }

    public function hubmdp(): View
    {
        return view('hubmdp');
    }

    public function dashboard(): View
    {
        return view('dashboard');
    }

    public function create_team(): View
    {
        return view('create_team');
    }
}


