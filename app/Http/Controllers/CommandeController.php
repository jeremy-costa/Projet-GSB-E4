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
        return view('panier', compact('lesChaussures','id'));
    }
    
    public function SupprimerChaussurePanier($id,$idc) {
        $uneChCommande = new LignComm();
        $uneChCommande->SupprimerLignComm($id);
        return redirect('/panier/'+$idc);
        
    }
    
    public function ajouterChaussurePanier(){
        $Pointure = Request::input('cbPointures');
        $id = Request::input('idCH');
        $idCli = Session::get('id');
        $uneCommande = new Commande();
        $uneChCommande = new LignComm();
        if($uneCommande->getUneCommande($idCli) != null){         
            $uneChCommande->AjouterLignComm($id,$Pointure,$uneCommande->getUneCommande($idCli));
        }
        else{
            $uneCommande->ajouterCommande($idCli);
            $uneChCommande->AjouterLignComm($id,$Pointure,$uneCommande->getUneCommande($idCli));        
        }
     return redirect('/panier/'+$idCli);
    }
    
}
