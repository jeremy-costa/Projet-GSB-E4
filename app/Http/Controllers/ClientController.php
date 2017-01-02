<?php

namespace App\Http\Controllers;

use App\metier\Client;
use Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller {

    public function getLogin() {
        $erreur = "";
        return view('formLogin', compact('erreur'));
    }

    public function signIn() {
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $unClient = new Client();
        $Client = $unClient->getClient($login, $pwd);
        $connected = $unClient->login($login, $pwd);
        if ($connected) {
            return view('layouts/master',compact('Client'));
        } else {
            $erreur = "Login ou mot de passe inconnu !";
            return view('formLogin', compact('erreur'));
        }
    }

    public function signOut() {
        $unClient = new Client();
        $unClient->logout();
        return view('accueil');
    }

    public function getSubscribe() {
        $erreur = "";
        return view('formSubscribe', compact('erreur'));
    }

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
        if ($inscription){
            $unClient->login($login,$pwd);
           return view('Merci', compact('mail','nom'));
        }    
        else{       
        $exemple = $prenom.".".$nom;
        if($unClient->verificationLogin($exemple))
            $erreur="Identifiant déja pris, veuillez en choisir un autre. Suggestion: ".$exemple;
        else
            $erreur="Identifiant déja pris, veuillez en choisir un autre.";
        return view('formSubscribe', compact('erreur'));
        }
    }
    
    public function Mdpoublie(){
        $erreur="";
        return view('formMdpOublie', compact('erreur'));
    }
    
    
    public function getProfil($id){
        $unClient = new Client();
        $unC=$unClient->getClient($id);
        
        
        
        return view('profil', compact('unC'));
        
    }
    
   public function postModifierProfil(){
       $id=Session::get('id');
       $unClient = new Client();
       $unC=$unClient->getClient($id);
       $erreur="";
       return view('formModifierProfil', compact('erreur','unC'));
       
   }
   public function modifierProfil(){
       $unClient = new Client();
       $adresse=Request::input('adressecli');
       $tel=Request::input('telcli');
       $mdp=Request::input('mdp');
       $mail=Request::input('mail');
       $id=Session::get('id');
       $unClient->modificationProfil($id, $adresse, $tel, $mdp, $mail);
       
         return redirect('/getProfil/'.$id);
   }
            

}
