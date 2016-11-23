<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Taille extends Model {
    protected $table = 'Taille';
    public $timestamps = false;
    protected $fillable = [
        'idTaille',
       
        
    ];
    
    public function __construct(){
        $this->idTaille= 0;
    }
    
    
    
    
    public function getLesTailles(){
        return $this->getKey();
    }
    
    
  
}
