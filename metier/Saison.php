<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Saison extends Model{
    protected $table = 'Saison';
    protected $primaryKey = 'idSaison';
    public $timestamps = false;
    protected $fillable = [
         'idSaison',
        'libelleSaison',
    ];
    
    public function __construct(){
        $this->id_marque= 0;
    }
    
    public function getListeSaison(){
        $query = DB::table('Marque')
                ->get();
        return $query;       
    }
    
    public function getidSaison(){
        return $this->getKey();
    }
    
    public function getSaison($id){
        $query = DB::table('Saison')
                ->select()
                ->where('idSaison', '=', $id)
                -> first();
        return $query;
    }
}
