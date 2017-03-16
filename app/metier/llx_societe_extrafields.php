<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class llx_societe_extrafields extends Model {

    protected $table = 'llx_societe_extrafields';

    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'tms',
        'fk_object',
        'import_key',
        'login',
        'mdp',
      
        
        ];
    public function login($login, $mdp) {
        $connected = false;
        $client = DB::table('llx_societe_extrafields')
                ->select()
                ->join('llx_societe','llx_societe_extrafields.fk_object','=','llx_societe.rowid')
                ->where('login', '=', $login)
                ->first();
        if ($client) {
            if ($client->mdp == $mdp) {
                Session::put('nom', $client->nom);
                Session::put('idcli', $client->rowid);
                $connected = true;
            }
        }
        return $connected;
    }

    //Dialogue avec la bdd pour déconnecter un utilisateur
    public function logout() {
        Session::put('nom', '');
        Session::put('idcli', 0);
    }
    
}