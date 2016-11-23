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
    
      public function getListeModeles(){

        $lesChaussures= DB::table('Modele')
                ->Select('LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE','LIBELLECAT', 'LIBELLESAISON','IMAGE','STOCKCH')
                ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                ->join('marque','modele.IDMARQUE','=','marque.IDMARQUE')
                ->join('saison','modele.IDSAISON','=','saison.IDSAISON')
                ->join('type','modele.IDTYPE','=','type.IDTYPE')
                ->get();
        return $lesChaussures;       
    }
}
