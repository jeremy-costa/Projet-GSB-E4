<?php

namespace App\Http\Controllers;

use App\metier\Client;
use Request;

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
        $unClient->subscribe($login, $pwd, $nom, $prenom, $mail, $adr, $tel);
        return view('formSubscribe', compact('erreur'));
    }

}
