<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Commande extends Model {
    protected $table = 'Commande';
    public $timestamps = false;
    protected $fillable = [
        'idCmde',
        'idCli',
        'dateCmde',
   
        
    ];
    
    public function __construct(){
        $this->idCmde= 0;
    }
    
    
    
    
    public function getCommande(){
        return $this->getKey();
    }
    
  
}
