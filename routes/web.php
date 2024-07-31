<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\joueurController;
use App\Http\Controllers\userController;

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

// Route::get('/', function () {
//     return view('welcome');
// }); innstead of using this you can use Route::view

// Welcome
Route::view('/', 'ajouterJoueur');
Route::redirect('/welcome', '/');

// User
// Route::view('/login/{id}', 'userLogin');
// Route::view('/signup', 'userSignUp');
// Route::post('/userLogin', [userController::class,'userLogin']);
// Route::post('/userSignUp', [userController::class, 'userSignUp']);

// Joueur
Route::view('/ajouterJoueur', 'ajouterJoueur');
Route::post('/ajouter', [joueurController::class,'ajouter']);
Route::get('/afficherJoueurs', [joueurController::class,'afficherJoueurs']);
Route::get('/modifierJoueur', [joueurController::class,'selectionModifJoueur']);
Route::post('/modifier', [joueurController::class,'modifierJoueur']);
Route::get('/supprimerJoueur', [joueurController::class,'supprimerJoueur']);