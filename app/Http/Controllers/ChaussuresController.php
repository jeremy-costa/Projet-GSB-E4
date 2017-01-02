<?php

namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\Client;
use App\metier\Pointure;
use Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\metier\Saison;
use App\metier\Type;
use App\metier\Categorie;
use App\metier\Marque;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DB;

class ChaussuresController extends Controller {

    public function getListeChaussuresHomme() {
        $uneChaussure = new Modele();

        $type = "Homme";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);

        $uneSaison = new Saison();
        $lesSaisons = $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);
        $idpage = 1;


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type', 'lesSaisons', 'lesTypes', 'lesCouleurs', 'idpage'));
    }

    public function getListeChaussuresFemme() {
        $uneChaussure = new Modele();
        $type = "Femme";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);
        $uneSaison = new Saison();
        $lesSaisons = $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);
        $idpage = 1;


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type', 'lesSaisons', 'lesTypes', 'lesCouleurs', 'idpage'));
    }

    public function getListeChaussuresEnfant() {
        $uneChaussure = new Modele();
        $type = "Enfant";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);
        $uneSaison = new Saison();
        $lesSaisons = $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);
        $idpage = 1;



        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type', 'lesSaisons', 'lesTypes', 'lesCouleurs', 'idpage'));
    }

    public function SupprimerChaussure($id, $type) {
        $uneChaussure = new Modele();
        $uneChaussure->SupprimerChaussure($id);

        switch ($type) {
            case "Homme":
                return redirect('/listerChaussureHomme');
            case "Femme":
                return redirect('/listerChaussureFemme');
            case "Enfant":
                return redirect('/listerChaussureEnfant');
            default:
                return redirect('/');
        }
    }

    public function modifierChaussure($id, $type) {
        $unModele = new Modele();
        $uneChaussure = $unModele->getModele($id);

        return view('formChaussureModif', compact('uneChaussure', 'type'));
    }

    public function postmodifierChaussure() {
        $code = Request::input('IDCH');
        $type = Request::input('IDTYPE');
        $libelle = Request::input('LIBELLECH');
        $prix = Request::input('PRIXCH');
        $stock = Request::input('STOCKCH');
        $image = Request::input('couverture');
        $unModele = new Modele();
        $unModele->modificationChaussure($code, $prix, $stock, $image, $libelle);
        switch ($type) {
            case "Homme":
                return redirect('/listerChaussureHomme');
            case "Femme":
                return redirect('/listerChaussureFemme');
            case "Enfant":
                return redirect('/listerChaussureEnfant');
            default:
                return redirect('/');
        }
    }

    public function getChaussure($id) {
        $unModele = new Modele();
        $unePointure = new Pointure();
        $uneChaussure = $unModele->getModele($id);
        $lesPointures = $unePointure->getPointure($id);
        return view('desChaussure', compact('uneChaussure', 'lesPointures'));
    }

    public function filtrerChaussure() {
        $uneChaussure = new Modele();
        $type = Request::input('type');
        $couleur = Request::input('cbCouleurs');
        $Type = Request::input('cbType');
        $saison = Request::input('cbSaison');
        $id = Session::get('id');
        $unClient = new Client();
        $Client = $unClient->getClient($id);
        $uneSaison = new Saison();
        $allChaussures = $uneChaussure->getListeModelesBis($type);
        $lesSaisons = $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);
        $lesChaussures = new Collection();
        $idpage = 0;
        if ($Type != "0" && $couleur != "0" && $saison != "0") {

            foreach ($allChaussures as $unC) {
                if ($unC->IDTYPE == $Type && $unC->IDSAISON == $saison && $unC->COULEURCH == $couleur) {

                    $lesChaussures->add($unC);
                }
            }
        } else {
            if ($Type != "0" && $couleur != "0") {


                foreach ($allChaussures as $unC) {
                    if ($unC->IDTYPE == $Type && $unC->COULEURCH == $couleur) {

                        $lesChaussures->add($unC);
                    }
                }
            } else {
                if ($Type != "0" && $saison != "0") {


                    foreach ($allChaussures as $unC) {
                        if ($unC->IDTYPE == $Type && $unC->IDSAISON == $saison) {

                            $lesChaussures->add($unC);
                        }
                    }
                } else {
                    if ($couleur != "0" && $saison != "0") {


                        foreach ($allChaussures as $unC) {
                            if ($unC->IDSAISON == $saison && $unC->COULEURCH == $couleur) {

                                $lesChaussures->add($unC);
                            }
                        }
                    } else {
                        if ($Type != "0") {


                            foreach ($allChaussures as $unC) {
                                if ($unC->IDTYPE == $Type) {

                                    $lesChaussures->add($unC);
                                }
                            }
                        } else {
                            if ($couleur != "0") {


                                foreach ($allChaussures as $unC) {
                                    if ($unC->COULEURCH == $couleur) {

                                        $lesChaussures->add($unC);
                                    }
                                }
                            } else {
                                if ($saison != "0") {


                                    foreach ($allChaussures as $unC) {
                                        if ($unC->IDSAISON == $saison) {

                                            $lesChaussures->add($unC);
                                        }
                                    }
                                } else {
                                    if ($Type == "0" && $couleur == "0" && $saison == "0") {
                                        $idpage = 1;
                                        $lesChaussures = $uneChaussure->getListeModeles($type);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('tableauChaussures', compact('lesChaussures', 'type', 'lesCouleurs', 'lesTypes', 'lesSaisons', 'Type', 'idpage', 'Client'));
    }

    public function ajoutChaussure() {
        $uneCategorie = new Categorie();
        $mesCategories = $uneCategorie->getListeMCategories();
        $uneMarque = new Marque();
        $mesMarques = $uneMarque->getListeMarques();
        $uneSaison = new Saison();
        $mesSaisons = $uneSaison->getListeSaison();
        $unType = new Type();
        $mesTypes = $unType->getListeTypes();
        return view('formChaussureAjout', compact('mesCategories', 'mesMarques', 'mesSaisons', 'mesTypes'));
    }

    public function postajouterChaussure() {
        $titre = Request::input('LIBELLECH');
        $code_cat = Request::input('cbCategorie');
        $code_mar = Request::input('cbMarque');
        $code_saison = Request::input('cbSaison');
        $code_type = Request::input('cbType');
        $couverture = Request::input('couverture');
        $prix = Request::input('PRIXCH');
        $stock = Request::input('STOCKCH');
        $couleur = Request::input('COULEURCH');
        $matiere = Request::input('MATIERECH');
        $uneChaussure = new Modele();
        $cpt = $uneChaussure->compterChaussureType($code_type,$code_cat);
        $idCh = $code_cat . $code_type . $cpt;
        $uneChaussure->ajoutChaussure($idCh,$titre, $code_cat, $code_mar, $code_saison, $couverture, $prix, $stock, $couleur, $code_type, $matiere);
        switch ($code_cat) {
            case "H":
                return redirect('/listerChaussureHomme');
            case "F":
                return redirect('/listerChaussureFemme');
            case "E":
                return redirect('/listerChaussureEnfant');
            default:
                return redirect('/');
        }
    }

}
