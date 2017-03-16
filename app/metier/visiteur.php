<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class visiteur extends Model {

    protected $table = 'visiteur';

    public $timestamps = false;
    protected $fillable = [
        'id_visiteur',
        'id_labo',
        'id_secteur',
        'nom_visiteur',
        'prenom_visiteur',
        'adresse_visiteur',
        'cp_visiteur',
        'ville_visiteur',
        'date_embauche',
        'login_visiteur',
        'pwd_visiteur',
   
        
        ];
    
    
     public function login($login, $pwd) {
        $connected = false;
        $visiteur = DB::table('visiteur')
                ->select()
                ->where('login_visiteur', '=', $login)
                ->first();
        if ($visiteur) {
            if ($visiteur->pwd_visiteur == $pwd) {
                Session::put('id_visiteur', $visiteur->id_visiteur);
                Session::put('nom_visiteur', $visiteur->nom_visiteur);
                $connected = true;
            }
        }
        return $connected;
    }

    //Dialogue avec la bdd pour déconnecter un utilisateur
    public function logout() {
        Session::put('id_visiteur', 0);
        Session::put('nom_visiteur', null);
    }
}