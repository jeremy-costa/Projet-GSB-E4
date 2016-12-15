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
        $error = "";
        $NumCommande = $uneCommande->getUneCommandeClient($id);
        $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande);
        if ($lesChaussures == null)
            $error = "Votre panier est vide";
        return view('panier', compact('lesChaussures', 'id', 'error'));
    }

    public function SupprimerChaussurePanier($id,$idtaille, $idc) {
        $uneChCommande = new LignComm();
        $uneChCommande->SupprimerLignComm($id,$idtaille);
        return redirect('/panier/' . $idc);
    }

    public function ajouterChaussurePanier() {
        $Pointure = Request::input('cbPointures');
        $id = Request::input('idCH');
        $idCli = Session::get('id');
        $uneCommande = new Commande();
        $uneChCommande = new LignComm();
        $idCmde = $uneCommande->getUneCommande($idCli);
        $chaussure = $uneChCommande->chaussureInPanier($id, $Pointure, $idCmde);
        if ($idCmde != null) {
            if ( $chaussure == null) {
                $uneChCommande->AjouterLignComm($id, $Pointure, $idCmde);
                return redirect('/panier/' . $idCli);
            } else
                return redirect('/chaussure/' . $id);
        }
        else {
            $uneCommande->ajouterCommande($idCli);
            $uneChCommande->AjouterLignComm($id, $Pointure, $idCmde);
            return redirect('/panier/' . $idCli);
        }
    }
    
    public function augmenterQuantite($idCh,$id){
        $uneChaussure = new LignComm();
        $uneChaussure->augmenterQte($idCh);
        return redirect('/panier/' . $id);
    }
    
    public function diminuerQuantite($idCh,$id){
        $uneChaussure = new LignComm();
        $uneChaussure->diminuerQte($idCh);
        return redirect('/panier/' . $id);
    }
}
