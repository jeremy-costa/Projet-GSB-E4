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
Route::post('/subscribe', 'ClientController@SubscribeIn');
Route::post('/login', 'ClientController@signIn');
Route::get('/getLogout', 'ClientController@signOut');
Route::post('/getLogin', 'ClientController@getlogin');
Route::post('/mdp','EmailController@envoiMdp');
Route::post('/passercommande','CommandeController@passerCommande');
Route::post('/validercommande','CommandeController@validerCommande');



route::get('/listerChaussureHomme', ['uses' => 'ChaussuresController@getListeChaussuresHomme']);
route::get('/listerChaussureFemme', ['uses' => 'ChaussuresController@getListeChaussuresFemme']);
route::get('/listerChaussureEnfant', ['uses' => 'ChaussuresController@getListeChaussuresEnfant']);
Route::get('/supprimer/{id}/{type}', ['as' => 'SupprimerChaussure',
    'uses' => 'ChaussuresController@SupprimerChaussure']);
Route::get('/modifierChaussure/{id}/{type}', ['as' => 'modifierChaussure',
    'uses' => 'ChaussuresController@modifierChaussure']);

Route::post('/postmodifierChaussure/{id}/{type}', ['as' => 'postmodifierChaussure',
    'uses' => 'ChaussuresController@postmodifierChaussure']);

Route::get('/chaussure/{id}', ['uses'=> 'ChaussuresController@getChaussure']);

Route::get('/panier/{id}', 'CommandeController@getListeCommandeClient');
Route::get('/supprimerChPanier/{idch}/{idtaille}/{idcli}', ['as' => 'SupprimerChaussurePanier',
    'uses' => 'CommandeController@SupprimerChaussurePanier']);
Route::post('/ajouterPanier', 'CommandeController@ajouterChaussurePanier');

Route::post('/getChaussureCondition', 'ChaussuresController@filtrerChaussure');
Route::get('/augmenterQte/{idCh}/{id}/{idTaille}','CommandeController@augmenterQuantite');
Route::get('/diminuerQte/{idCh}/{id}/{idTaille}','CommandeController@diminuerQuantite');
Route::get('/welcomeMail/{mail}/{nom}', 'EmailController@sendMailWelcome');
Route::get('/mdpoublie', 'ClientController@Mdpoublie');
Route::get('/validerMail/{idCli}/{total}/{idCmde}', 'EmailController@sendRecapCommande');
