<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\visiteur;
use App\metier\activite_compl;

class VisiteurController extends Controller {

    public function getPageRechercher() {
        $erreur = "";


        return view('rechercher', compact('erreur'));
    }

    public function getLaRecherche() {
        $unV = new visiteur();
        $typeRecherche = Request::input('typeRecherche');
        $recherche = Request::input('recherche');

        if ($typeRecherche == "nom") {
            $lesVisiteurs = $unV->getLesVisiteursNom($recherche);
        } else
        if ($typeRecherche == "laboratoire") {
            $lesVisiteurs = $unV->getLesVisiteursLaboratoire($recherche);
        }
        if ($lesVisiteurs == null) {
            $erreur = "Votre recherche n'a pas pu aboutir.";
            return view('rechercher', compact('erreur'));
        }



        return view('resultatsRecherche', compact('lesVisiteurs'));
    }

    public function getLesActivitesComplementaires($id_visiteur, $nom_visiteur, $prenom_visiteur) {
        $unA = new activite_compl();
        $lesActivites = $unA->getLesActivitesComplementaires($nom_visiteur);
        return view('activitesComplementaires', compact('lesActivites', 'nom_visiteur', 'id_visiteur', 'prenom_visiteur'));
    }

    public function deleteActiviteComplementaire($idActivite, $id_visiteur, $nom_visiteur, $prenom_visiteur) {
        $uneA = new activite_compl();
        $uneA->deleteActivite($idActivite);
        return redirect('/ActivitesComplementaires/' . $idvisiteur / $nom_visiteur / $prenom_visiteur);
    }

    public function addActiviteComplementaire($id_visiteur, $nom_visiteur, $prenom_visiteur) {
        return view('AjouterActivite', compact('id_visiteur', 'nom_visiteur', 'prenom_visiteur'));
    }

    public function addActivite() {
        $uneAC = new activite_compl();

        $id_visiteur = Request::input('id_visiteur');
        $prenom_visiteur = Request::input('prenom_visiteur');
        $nom_visiteur = Request::input('nom_visiteur');
        $theme = Request::input('theme');
        $motif = Request::input('motif');
        $date = Request::input('date');
        $lieu = Request::input('lieu');
        $montant = Request::input('montant');
        $uneAC->addUneActiviteComplementaire($id_visiteur, $theme, $motif, $date, $lieu, $montant);
    }

}
