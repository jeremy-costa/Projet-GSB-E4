<?php

namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\Client;
use Request;
use Illuminate\Support\Facades\Session;
use Exception;

class CommandeController extends Controller {

 public function getListeCommandeClient($id) {
        $uneCommande = new Commande();
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type'));
    }