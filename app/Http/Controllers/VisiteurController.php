<?php

namespace App\Http\Controllers;

use App\metier\Visiteur;
use Request;

class VisiteurController extends Controller {

    public function getLogin() {
        $erreur = "";
        return view('formLogin', compact('erreur'));
    }

    public function signIn() {
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $unVisiteur = new Visiteur();
        $connected = $unVisiteur->login($login, $pwd);
        if ($connected) {
            return view('home');
        } else {
            $erreur = "Login ou mot de passe inconnu !";
            return view('formLogin', compact('erreur'));
        }
    }

    public function signOut() {
        $unVisiteur = new Visiteur();
        $unVisiteur->logout();
        return view('home');
    }

    public function getSubscribe() {
        $erreur = "";
        return view('formSubscribe', compact('erreur'));
    }
}

