<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Modele extends Model{
    protected $table = 'Modele';
    protected $primaryKey = 'idCh';
    public $timestamps = false;
    protected $fillable = [
         'idCh',
        'idType',
         'idMarque',
        'idCat',
        'idSaison',
        'libelleCh',
        'prixCh',
        'stockCh',
        'matiereCh',
        'couleurCh'
    ];
    
    public function __construct(){
        $this->idCh= 0;
    }
    
    public function getListeModeles(){
        $query = DB::table('Modele')
                ->get();
        return $query;       
    }
    
    public function getidModele(){
        return $this->getKey();
    }
    
    public function getModele($id){
        $query = DB::table('Modele')
                ->select()
                ->where('idCh', '=', $id)
                -> first();
        return $query;
    }
}
