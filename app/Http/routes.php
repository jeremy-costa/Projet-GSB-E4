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



Route::get('/', function () { return view('accueil'); });

//Partie connexion et inscription
Route::get('/getLogin', 'ClientController@getlogin');
Route::get('/getSubscribe', 'ClientController@getsubscribe');
Route::post('/login', 'ClientController@signIn');
Route::get('/getLogout', 'ClientController@signOut');

route::get('/listerChaussure/{id}', ['uses' => 'ChaussuresController@getListeChaussures']);
