<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerForm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gestionMdp', function () {
    return view('gestionMdp');
});


 Route::post('/ControllerForm', [ControllerForm::class, 'checKForm'])->name(('checKForm'));