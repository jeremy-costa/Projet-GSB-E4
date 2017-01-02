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


//Route vers la page d'accueil
//Get
Route::get('/', function () {
    return view('accueil');
});

//Routes pour la connexion et l'inscription
//Get
Route::get('/getLogin', 'ClientController@getlogin');
Route::get('/getSubscribe', 'ClientController@getsubscribe');
Route::get('/getLogout', 'ClientController@signOut');
//Post
Route::post('/getLogin', 'ClientController@getlogin');
Route::post('/mdp', 'EmailController@envoiMdp');
Route::post('/subscribe', 'ClientController@SubscribeIn');
Route::post('/login', 'ClientController@signIn');


//Routes pour la commande
//Get
Route::get('/panier/{id}', 'CommandeController@getListeCommandeClient');
Route::get('/supprimerChPanier/{idch}/{idtaille}/{idcli}', ['as' => 'SupprimerChaussurePanier',
    'uses' => 'CommandeController@SupprimerChaussurePanier']);
Route::get('/augmenterQte/{idCh}/{id}/{idTaille}', 'CommandeController@augmenterQuantite');
Route::get('/diminuerQte/{idCh}/{id}/{idTaille}', 'CommandeController@diminuerQuantite');

//Post
Route::post('/passercommande', 'CommandeController@passerCommande');
Route::post('/validercommande', 'CommandeController@validerCommande');
Route::post('/ajouterPanier', 'CommandeController@ajouterChaussurePanier');


//Routes pour le profil d'un client
//Get
Route::get('/getProfil/{id}', 'ClientController@getProfil');
Route::get('/getAnciennesCommandes', 'CommandeController@getLesAnciennesCommandes');
//Post
Route::post('/postmodificationProfil', 'ClientController@postModifierProfil');
Route::post('/modifierProfil', 'ClientController@modifierProfil');


//Routes pour les chaussures
//Get
route::get('/listerChaussureHomme', ['uses' => 'ChaussuresController@getListeChaussuresHomme']);
route::get('/listerChaussureFemme', ['uses' => 'ChaussuresController@getListeChaussuresFemme']);
route::get('/listerChaussureEnfant', ['uses' => 'ChaussuresController@getListeChaussuresEnfant']);
Route::get('/ajoutChaussure', 'ChaussuresController@ajoutChaussure');
Route::get('/chaussure/{id}', ['uses' => 'ChaussuresController@getChaussure']);
Route::get('/supprimer/{id}/{type}', ['as' => 'SupprimerChaussure',
    'uses' => 'ChaussuresController@SupprimerChaussure']);
Route::get('/modifierChaussure/{id}/{type}', ['as' => 'modifierChaussure',
    'uses' => 'ChaussuresController@modifierChaussure']);
//Post
Route::post('/postmodifierChaussure', ['as' => 'postmodifierChaussure',
    'uses' => 'ChaussuresController@postmodifierChaussure']);
Route::post('/postajouterChaussure', ['as' => 'postajouterChaussure',
    'uses' => 'ChaussuresController@postajouterChaussure']);
Route::post('/getChaussureCondition', 'ChaussuresController@filtrerChaussure');


//Routes pour l'envoie de mails
//Get
Route::get('/welcomeMail/{mail}/{nom}', 'EmailController@sendMailWelcome');
Route::get('/mdpoublie', 'ClientController@Mdpoublie');
Route::get('/validerMail/{idCli}/{total}/{idCmde}', 'EmailController@sendRecapCommande');
