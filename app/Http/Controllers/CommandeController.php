<?php

namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\LignComm;
use App\metier\Commande;
use Request;
use Illuminate\Support\Facades\Session;

class CommandeController extends Controller {
    /* Créer l'appel de récupération de l'id d'une commande (non effectuée) à partir de l'id d'un client
     * puis créer l'appel de récupération des chaussures de la commande et renvoie ces données à l'affichage du panier
     * ou un message si la commande n'existe pas.
     */

    public function getListeCommandeClient($idCli) {
        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $error = "";
        $NumCommande = $uneCommande->getIdCommandeClient($idCli);
        $total = 0;
        if ($NumCommande != null) {
            $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande);
            foreach ($lesChaussures as $uneC) {
                $total += $uneC->PRIXCH * $uneC->QTECOMMANDE;
            }
            return view('panier', compact('lesChaussures', 'idCli', 'error', 'total'));
        } else {
            $lesChaussures = null;
            $error = "Pas de commande";
            return view('panier', compact('lesChaussures', 'idCli', 'error', 'total'));
        }
    }

    /* Créer l'appel de récupération des commandes effectuées par un client
     * puis renvoie les données à l'affichage des anciennes commandes
     * ou un message si il n'y a pas d'ancienne commande.
     */

    public function getLesAnciennesCommandes() {
        $idCli = Session::get('id');
        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $error = "";
        $lesChaussures = $uneChaussure->getAnciennesCommandesClient($idCli);
        if ($lesChaussures != null) {
            return view('anciennesCommandes', compact('lesChaussures', 'idCli', 'error', 'total'));
        } else {
            $lesChaussures = null;
            $error = "Pas d'anciennes commandes";
            return view('anciennesCommandes', compact('lesChaussures', 'idCli', 'error', 'total'));
        }
    }

    /* Récupère en post les données du formulaire de validation d'une commande
     * puis appel la récupération des données de la commande
     * et renvoie les données sur la page de validation de la commande.
     */

    public function validerCommande() {
        $idcli = Request::input('idCli');
        $total = Request::input('total');
        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $error = "";
        $NumCommande = $uneCommande->getIdCommandeClient($idcli);
        if ($NumCommande != null) {

            $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande);
            foreach ($lesChaussures as $unC) {
                $idCmde = $unC->IDCMDE;
                break;
            }

            return view('validerCommande', compact('idcli', 'error', 'total', 'idCmde'));
        }
    }

    /* Récupère en post les données du formulaire de validation d'une commande
     * puis appel la récupération des données de la commande
     * et renvoie les données sur la page de récapitulation de la commande.
     */

    public function passercommande() {

        $idCli = Request::input('idCli');
        $total = Request::input('total');
        $uneCommande = new Commande();
        $uneChaussure = new LignComm();
        $error = "";
        $NumCommande = $uneCommande->getIdCommandeClient($idCli);
        if ($NumCommande != null) {

            $lesChaussures = $uneChaussure->getlesChaussuresCommande($NumCommande);
            foreach ($lesChaussures as $unC) {
                $idCmde = $unC->IDCMDE;
                break;
            }
            return view('recapCommande', compact('lesChaussures', 'idCli', 'error', 'total', 'idCmde'));
        } else {
            $lesChaussures = null;
            $error = "Pas de commande";
            return view('panier', compact('lesChaussures', 'idCli', 'error'));
        }
    }

    /*
     * Appel la récupération des données de la commande
     * puis appel la suppression d'une ligne de la commande ou de la commande si il n'y a plus de ligne
     * puis renvoie l'affichage de la commande.
     */

    public function SupprimerChaussurePanier($idch, $idtaille, $idcli) {
        $uneChCommande = new LignComm();
        $uneCommande = new Commande();
        $idCmde = $uneCommande->getIdCommandeClient($idcli);
        $uneChCommande->SupprimerLignComm($idch, $idtaille, $idCmde);
        if ($uneChCommande->getlesChaussuresCommande($idCmde) == null)
            $uneCommande->supprimerCommande($idCmde);
        return redirect('/panier/' . $idcli);
    }

    /* Récupère en post les données du formulaire d'ajout d'une chaussure dans la commande
     * puis appel la vérification de l'existance d'une commande (le cas échéant créer une nouvelle commande)
     * puis ajoute la chaussure dans la commande
     * et renvoie l'affichage de la commande ou de la chaussure le cas échéant.
     */

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

    /* Appel la récupération des données d'une commande 
     * puis appel la récupération de la quantitée d'une chaussure de la commande
     * ainsi que la quantité en stock de la chaussure dans le magasin
     * et vérifie que la quantité commandée est inférieur à celle en stock
     * puis augmente la quantité commandée si la condition est vérifiée
     * et renvoie sur l'affichage de la commande.
     */

    public function augmenterQuantite($idCh, $id, $idTaille) {
        $uneLigneCommande = new LignComm();
        $uneChaussure = new Modele();
        $uneCommande = new Commande();
        $idCmde = $uneCommande->getIdCommandeClient($id);
        $qte = $uneLigneCommande->getQte($idCh, $idCmde, $idTaille);
        $qteStock = $uneChaussure->getQteStock($idCh);
        if ($qte->QTECOMMANDE < $qteStock->STOCKCH)
            $uneLigneCommande->augmenterQte($idCh, $idTaille);
        return redirect('/panier/' . $id);
    }

    /* Appel la récupération des données d'une commande 
     * puis appel la récupération de la quantitée d'une chaussure de la commande
     * et vérifie que la quantité commandée est strictement supérieure à 0
     * puis diminue la quantité commandée si la condition est vérifiée
     * et renvoie sur l'affichage de la commande.
     */

    public function diminuerQuantite($idCh, $id, $idTaille) {
        $uneChaussure = new LignComm();
        $uneCommande = new Commande();
        $idCmde = $uneCommande->getIdCommandeClient($id);
        $qte = $uneChaussure->getQte($idCh, $idCmde, $idTaille);
        if ($qte->QTECOMMANDE > 1)
            $uneChaussure->diminuerQte($idCh, $idTaille);
        return redirect('/panier/' . $id);
    }

}
