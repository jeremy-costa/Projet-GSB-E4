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
        $Client = New Client();
        if($Client->verificationLogin($login)){
            DB::table('client')->insert(['NOMCLI'=>$nom,'PRENOMCLI'=>$prenom,'ADRESSECLI'=>$adr,'NUMTELCLI'=>$tel,'PSEUDO'=>$login,'MDP'=>$pwd,'LVLSECURITE'=>false, 'MAIL'=>$mail]);        
            return true;
        }
        else{
            return false;
        }
    }
    
    public function getClient($id){
        $client = DB::table('client')
                ->Select('NOMCLI','PRENOMCLI','PSEUDO','LVLSECURITE', 'NUMTELCLI','ADRESSECLI','MAIL','MDP')
                ->Where ('IDCLI','=',$id)
                ->first();
        return $client;
    }
    
    public function getClientExistance($login, $mail){
        $client = DB::table('client')
                ->Select('NOMCLI','PRENOMCLI','PSEUDO')
                ->Where ('PSEUDO','=',$login)
                ->Where('MAIL','=',$mail)
                ->first();
        if ($client) {
          
                $connected = true;
            }
            else
                $connected=false;
        
        return $connected;
    }
    
    public function getMdpClient($login, $mail) {
        $mdp = DB::table('client')
                ->Select('MDP')
                ->Where ('PSEUDO','=',$login)
                ->Where('MAIL','=',$mail)
                ->first();       
        return $mdp;
    }
    public function verificationLogin($login){
        $verif = DB::table('client')
                ->Select('IDCLI')
                ->Where ('PSEUDO','=',$login)
                ->first();
        if ($verif != null)
            return false;       
        else
            return true;
    }
    
    
    public function getEmailClient($idCli){
            $email= DB::table('client')
            ->Select('MAIL','NOMCLI')
            ->Where ('IDCLI','=',$idCli)
            ->first();
 return $email;
            }
            
            
            
   public function modificationProfil($id, $adresse, $tel, $mdp, $mail){
         DB::table('client')->where('IDCLI', $id)
                 ->update(['ADRESSECLI' => $adresse, 'NUMTELCLI' => $tel, 'MDP' => $mdp, 'MAIL'=> $mail]);
   }
}
