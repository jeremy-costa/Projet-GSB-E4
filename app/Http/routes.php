<?php

Route::get('/', function() { return view('accueil'); });
Route::post('/loginClient','VisiteurController@signIn');
Route::post('/getLogout','VisiteurController@signOut');