<?php

namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\Client;
use App\metier\LignComm;
use App\metier\Commande;
use Request;
use Illuminate\Support\Facades\Session;
use Exception;

class CommandeController extends Controller {

    public function getListeCommandeClient($id) {
        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $NumCommande =  $uneCommande->getUneCommande($id);
        $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande);
        return view('panier', compact('lesChaussures'));
    }
    
}
