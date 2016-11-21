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
    
    public function __construct(){
        $this->idCli= 0;
    }
    
    
    
    
    public function getClients(){
        return $this->getKey();
    }
    
    public function login($login, $pwd) {
        $connected = false;
        $client = DB::table('client')
                ->select()
                ->where('pseudo', '=', $login)
                ->first();
        if($client) {
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
  
}
