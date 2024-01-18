<?php

use App\Http\Controllers\ControllerForm;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\HubmdpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



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
})->name('/');

Route::get('/gestionMdp', function () {
    return view('gestionMdp');
});

Route::post('/checKForm', [
    ControllerForm::class, 'checKForm'
])->name('checKForm');

Route::get('/hubmdp', function () {
    return view('hubmdp');
})->name('hubmdp');

Route::get('/hubmdp', [HubmdpController::class, 'showHubmdp'])->name('hubmdp');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/password/edit/{id}', [HubmdpController::class, 'editPassword'])->name('editPassword');

Route::put('/password/update/{id}', [HubmdpController::class, 'updatePassword'])->name('updatePassword');

Route::post('/team/store', [TeamController::class, 'store'])->name('storeTeam');

Route::get('/create_team', function () {
    return view('create_team');
})->name('create_team');

// Route::get('/hubteam', function () {
//     return view('hubteam');
// })->name('hubteam');

Route::get('/hubteam', [TeamController::class, 'showTeams'])->name('hubteam');

Route::get('/ajoutTeam/{id}', [TeamController::class, 'show'])->name('ajoutTeam');

Route::post('/process-form', [TeamController::class, 'processForm'])->name('processForm');
