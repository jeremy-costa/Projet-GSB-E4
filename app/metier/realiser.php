<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class realiser extends Model {

    protected $table = 'realiser';

    public $timestamps = false;
    protected $fillable = [
        'id_activite_compl',
        'id_visiteur',
        'montant_ac',
   
    
        
        ];
    
    
  
    
    
  
}