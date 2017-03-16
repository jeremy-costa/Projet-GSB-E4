<?php
namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\rw_user;
use App\metier\rw_panel;
use App\metier\rw_suivi;
use App\metier\llx_product;
use App\metier\llx_categorie;
use App\metier\ llx_societe_extrafields;


class ConnexionController extends Controller {

    //Renvoie vers la page de connexion

    public function getLogin() {
        $erreur = "";
       
       
        return view('formLogin', compact('erreur'));
    }

    /* Récupère en post les données de connexion de l'utilisateur
     * et créer l'appel de vérification des données de connexion
     * puis renvoie la page d'accueil en état connecté si les informations sont correctes ou un message d'erreur sur la page de connexion le cas échéant.
     */
      public function getLoginClient() {
        $erreur = "";
        return view('formLoginClient', compact('erreur'));
    }

    

    public function signIn() {
      
      
       
        
        $login = Request::input('login');
        $pwd = Request::input('pwd');

       
        $connected = $unA->login($login, $pwd);
        
        if ($connected) {
         


        return view('formModifierImagesCaroussel');
            
        } else {
            $erreur = "Login ou mot de passe inconnu !";
            return view('formLogin', compact('erreur'));
        }
    }

    /* Créer l'appel de déconnexion d'un utilisateur 
     * et renvoie sur la page d'accueil.
     */

    public function signOut() {
        $unA = new rw_user();
        $unA->logout();
        return redirect('/');
    }

    
   

}
