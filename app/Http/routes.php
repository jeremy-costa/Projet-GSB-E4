<?php

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
Route::post('/login', 'VisiteurController@signIn');
Route::get('/getLogout', 'VisiteurController@signOut');
