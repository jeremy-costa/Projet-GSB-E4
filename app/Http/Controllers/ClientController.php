<?php

namespace App\Http\Controllers;

use App\metier\Client;
use Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller {

    //Renvoie vers la page de connexion
    
    public function getLogin() {
        $erreur = "";
        return view('formLogin', compact('erreur'));
    }

    /* Récupère en post les données de connexion de l'utilisateur
     * et créer l'appel de vérification des données de connexion
     * puis renvoie la page d'accueil en état connecté si les informations sont correctes ou un message d'erreur sur la page de connexion le cas échéant.
     */

    public function signIn() {
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $unClient = new Client();
        $Client = $unClient->getClient($login, $pwd);
        $connected = $unClient->login($login, $pwd);
        if ($connected) {
            return view('layouts/master', compact('Client'));
        } else {
            $erreur = "Login ou mot de passe inconnu !";
            return view('formLogin', compact('erreur'));
        }
    }

    /* Créer l'appel de déconnexion d'un utilisateur 
     * et renvoie sur la page d'accueil.
     */

    public function signOut() {
        $unClient = new Client();
        $unClient->logout();
        return view('accueil');
    }

    //Renvoie sur le formulaire d'inscription

    public function getSubscribe() {
        $erreur = "";
        return view('formSubscribe', compact('erreur'));
    }

    /* Récupère en post les données du formulaire d'inscription 
     * puis créer l'appel d'inscription en passant ces données
     * et créer l'appel de connexion si l'inscription a fonctionné ou renvoie sur la page d'inscription avec un message d'erreur le cas échéant.  
     */

    public function SubscribeIn() {
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $nom = Request::input('nom');
        $prenom = Request::input('prenom');
        $mail = Request::input('mail');
        $adr = Request::input('adr');
        $tel = Request::input('tel');
        $unClient = new Client();
        $inscription = $unClient->subscribe($login, $pwd, $nom, $prenom, $mail, $adr, $tel);
        if ($inscription) {
            $unClient->login($login, $pwd);
            return view('Merci', compact('mail', 'nom'));
        } else {
            $exemple = $prenom . "." . $nom;
            if ($unClient->verificationLogin($exemple))
                $erreur = "Identifiant déja pris, veuillez en choisir un autre. Suggestion: " . $exemple;
            else
                $erreur = "Identifiant déja pris, veuillez en choisir un autre.";
            return view('formSubscribe', compact('erreur'));
        }
    }

    //Renvoie le formulaire de mot de passe oublié. 

    public function Mdpoublie() {
        $erreur = "";
        return view('formMdpOublie', compact('erreur'));
    }

    /* Créer l'appel de récupération des données d'un client 
     * et renvoie les données sur la page profil du client.
     */

    public function getProfil($id) {
        $unClient = new Client();
        $unC = $unClient->getClient($id);
        return view('profil', compact('unC'));
    }

    /* Créer l'appel de récupération des données d'un client 
     * et renvoie ces données au formulaire de modification d'un client.   
     */

    public function postModifierProfil() {
        $id = Session::get('id');
        $unClient = new Client();
        $unC = $unClient->getClient($id);
        $erreur = "";
        return view('formModifierProfil', compact('erreur', 'unC'));
    }

    /* Récupère en post les données du formulaire de modification d'un client
     * et créer l'appel de la modification des données d'un client 
     * puis renvoie la page profil du client.     
     */

    public function modifierProfil() {
        $unClient = new Client();
        $adresse = Request::input('adressecli');
        $tel = Request::input('telcli');
        $mdp = Request::input('mdp');
        $mail = Request::input('mail');
        $id = Session::get('id');
        $unClient->modificationProfil($id, $adresse, $tel, $mdp, $mail);
        return redirect('/getProfil/' . $id);
    }

}
