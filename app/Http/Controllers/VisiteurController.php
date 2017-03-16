<?php
namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\visiteur;



class VisiteurController extends Controller {

   

   

    /* Récupère en post les données de connexion de l'utilisateur
     * et créer l'appel de vérification des données de connexion
     * puis renvoie la page d'accueil en état connecté si les informations sont correctes ou un message d'erreur sur la page de connexion le cas échéant.
     */
  

    

     public function getPageRechercher() {
        $erreur = "";
       
       
        return view('rechercher', compact('erreur'));
    }


   

}
