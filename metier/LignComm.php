<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class LignComm extends Model {
    protected $table = 'LignComm';
    public $timestamps = false;
    protected $fillable = [
        'idCh',
        'idCmde',
        'idTaille',
        'Qtecommande',
        
        
        
    ];
    
    public function __construct(){
        $this->idCh= 0;
    }
    
    
    
    
  
    
  
}
