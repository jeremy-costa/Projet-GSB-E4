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
        $connected = $unClient->login($login, $pwd);
        if ($connected) {
            return view('accueil');
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
}

