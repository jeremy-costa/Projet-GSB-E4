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

    public function getListeCommandeClient($idCli) {
        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $error = "";
        $NumCommande = $uneCommande->getIdCommandeClient($idCli);      
        if ($NumCommande != null) {
            $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande);
            return view('panier', compact('lesChaussures', 'idCli', 'error'));
        } else{
            $lesChaussures = null;
            $error = "Pas de commande";
            return view('panier', compact('lesChaussures', 'idCli', 'error'));
        }
            
    }

    public function SupprimerChaussurePanier($idch, $idtaille, $idcli) {
        $uneChCommande = new LignComm();      
        $uneCommande = new Commande();
        $idCmde = $uneCommande->getIdCommandeClient($idcli);  
        $uneChCommande->SupprimerLignComm($idch, $idtaille, $idCmde);
        if($uneChCommande->getlesChaussuresCommande($idCmde) == null)
            $uneCommande->supprimerCommande($idCmde);
        return redirect('/panier/' . $idcli);
    }

    public function ajouterChaussurePanier() {
        $Pointure = Request::input('cbPointures');
        $id = Request::input('idCH');
        $idCli = Request::input('idCli');
        $uneCommande = new Commande();
        $uneChCommande = new LignComm();
        $idCmde = $uneCommande->getIdCommandeClient($idCli);       
        if ($idCmde != null) {
            $chaussure = $uneChCommande->chaussureInPanier($id, $Pointure, $idCmde);
            if ($chaussure == null) {
                $uneChCommande->AjouterLignComm($id, $Pointure, $idCmde);
                return redirect('/panier/' . $idCli);
            } else
                return redirect('/chaussure/' . $id);
        }
        else {
            $uneCommande->ajouterCommande($idCli);
            $idCmde = $uneCommande->getIdCommandeClient($idCli);
            $uneChCommande->AjouterLignComm($id, $Pointure, $idCmde);
            return redirect('/panier/' . $idCli);
        }
    }

    public function augmenterQuantite($idCh, $id, $idTaille) {
        $uneChaussure = new LignComm();
        $uneChaussure->augmenterQte($idCh, $idTaille);
        return redirect('/panier/' . $id);
    }

    public function diminuerQuantite($idCh, $id, $idTaille) {
        $uneChaussure = new LignComm();
        $uneChaussure->diminuerQte($idCh, $idTaille);
        return redirect('/panier/' . $id);
    }

}
