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
  

    

    public function signIn() {
       
      
        $unV = new visiteur();
      
       
        
        $login = Request::input('login');
        $pwd = Request::input('pwd');
       
       
        $connected = $unV->login($login, $pwd);
        
        if ($connected) {
         

        return view('accueil');
            
        } else {
            $erreur = "Login ou mot de passe inconnu !";
            return view('formLogin', compact('erreur'));
        }
    }

    /* Créer l'appel de déconnexion d'un utilisateur 
     * et renvoie sur la page d'accueil.
     */
     
    public function signOut() {
        $unV = new visiteur();
        $unV->logout();
        return redirect('/');
    }

   

}
