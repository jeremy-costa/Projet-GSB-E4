<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
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
    
  
}
