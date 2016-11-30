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

    public function logout() {
        Session::put('id', 0);
    }

    public function subscribe($login, $pwd, $nom,$prenom,$mail,$adr, $tel) {
        $inscription = DB::table('client')->insert(['NOMCLI'=>$nom,'PRENOMCLI'=>$prenom,'ADRESSECLI'=>$adr,'NUMTELCLI'=>$tel,'PSEUDO'=>$login,'MDP'=>$pwd,'LVLSECURITE'=>false, 'MAIL'=>$mail]);
        $Client = New Client();
        return $inscription;
    }
    
    public function getClient($id){
        $client = DB::table('client')
                ->Select('NOMCLI','PRENOMCLI','PSEUDO','LVLSECURITE')
                ->Where ('IDCLI','=',$id)
                ->first();
        return $client;
    }
}
