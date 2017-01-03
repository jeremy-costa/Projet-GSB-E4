<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Client extends Model {

    protected $table = 'Client';
    public $timestamps = false;
    protected $fillable = [
        'idCli',
        'nomCli',
        'prenomCli',
        'adresseCli',
        'numTel',
        'pseudo',
        'mdp',
        'lvlsecurite'
    ];

    public function __construct() {
        $this->idCli = 0;
    }
    
    public function getClients() {
        return $this->getKey();
    }
    
    //Dialogue avec la bdd pour véirifer si le login et le mot de passe correspondent (renvoie un booléen)
    public function login($login, $pwd) {
        $connected = false;
        $client = DB::table('client')
                ->select()
                ->where('pseudo', '=', $login)
                ->first();
        if ($client) {
            if ($client->MDP == $pwd) {
                Session::put('id', $client->IDCLI);
                $connected = true;
            }
        }
        return $connected;
    }

    //Dialogue avec la bdd pour déconnecter un utilisateur
    public function logout() {
        Session::put('id', 0);
    }
    
    //Dialogue avec la bdd pour inscrire un utilisateur (renvoie un booléen) 
    public function subscribe($login, $pwd, $nom, $prenom, $mail, $adr, $tel) {
        $Client = New Client();
        if ($Client->verificationLogin($login)) {
            DB::table('client')->insert(['NOMCLI' => $nom, 'PRENOMCLI' => $prenom, 'ADRESSECLI' => $adr, 'NUMTELCLI' => $tel, 'PSEUDO' => $login, 'MDP' => $pwd, 'LVLSECURITE' => false, 'MAIL' => $mail]);
            return true;
        } else {
            return false;
        }
    }

    //Dialogue avec la bdd pour récupérer un client en fonction de l'id client
    public function getClient($id) {
        $client = DB::table('client')
                ->Select('NOMCLI', 'PRENOMCLI', 'PSEUDO', 'LVLSECURITE', 'NUMTELCLI', 'ADRESSECLI', 'MAIL', 'MDP')
                ->Where('IDCLI', '=', $id)
                ->first();
        return $client;
    }
    
    
    public function getClientExistance($login, $mail) {
        $client = DB::table('client')
                ->Select('NOMCLI', 'PRENOMCLI', 'PSEUDO')
                ->Where('PSEUDO', '=', $login)
                ->Where('MAIL', '=', $mail)
                ->first();
        if ($client) {

            $connected = true;
        } else
            $connected = false;

        return $connected;
    }

    //Dialogue avec la bdd pour récupérer un mot de passe d'un utilisateur en fonction de son login et de son mail
    public function getMdpClient($login, $mail) {
        $mdp = DB::table('client')
                ->Select('MDP')
                ->Where('PSEUDO', '=', $login)
                ->Where('MAIL', '=', $mail)
                ->first();
        return $mdp;
    }

    //Dialogue avec la bdd pour vérifier si le login existe déja (rnevoie un booléen)
    public function verificationLogin($login) {
        $verif = DB::table('client')
                ->Select('IDCLI')
                ->Where('PSEUDO', '=', $login)
                ->first();
        if ($verif != null)
            return false;
        else
            return true;
    }

    //Dialogue avec la bdd pour récupérer l'email et le nom d'un client en fonction de l'id de l'utilisateur
    public function getEmailClient($idCli) {
        $email = DB::table('client')
                ->Select('MAIL', 'NOMCLI')
                ->Where('IDCLI', '=', $idCli)
                ->first();
        return $email;
    }

    //Dialogue aves la bdd pour modifier le profil d'un utilisateur
    public function modificationProfil($id, $adresse, $tel, $mdp, $mail) {
        DB::table('client')->where('IDCLI', $id)
                ->update(['ADRESSECLI' => $adresse, 'NUMTELCLI' => $tel, 'MDP' => $mdp, 'MAIL' => $mail]);
    }

}
