<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class pointures extends Model {
    protected $table = 'pointures';
    public $timestamps = false;
    protected $fillable = [
        'idCh',
        'idTaille',
        'QteStock',
       
        
    ];
    
    public function __construct(){
        $this->idCh= 0;
    }
    
    
    
    

  
}
