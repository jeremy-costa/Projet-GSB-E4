<?php

Route::get('/', function() { return view('accueil'); });
Route::post('/loginClient','VisiteurController@signIn');
Route::post('/getLogout','VisiteurController@signOut');
/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


//Route accueil

Route::get('/', function () { return view('accueil'); });
   



//connexion
Route::post('/login', 'ConnexionController@signIn');
Route::get('/getLogout', 'ConnexionController@signOut');
Route::get('/Rechercher','VisiteurController@getPageRechercher');


Route::get('/Ajouter', function () { return view('AjouterActivite'); });