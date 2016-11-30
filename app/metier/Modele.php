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
    
      public function getListeModeles($type){

        $lesChaussures= DB::table('Modele')
                ->Select('IDCH','LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE','LIBELLECAT', 'LIBELLESAISON','IMAGE','STOCKCH')
                ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                ->join('marque','modele.IDMARQUE','=','marque.IDMARQUE')
                ->join('saison','modele.IDSAISON','=','saison.IDSAISON')
                ->join('type','modele.IDTYPE','=','type.IDTYPE')
                ->where('MODELE.IDCAT','=',$type)
                ->paginate(10);
        return $lesChaussures;       
    }
    
      public function SupprimerChaussure($id){
    DB::table('modele')->where('IDCH','=',$id)->delete();
    }
    
    
    public function modificationChaussure($code,$prix,$stock,$image, $libelle){
         DB::table('modele')->where('IDCH', $code)
                 ->update(['PRIXCH' => $prix, 'STOCKCH' => $stock, 'IMAGE' => $image, 'LIBELLECH'=> $libelle]);
    }
}
