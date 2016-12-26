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
                ->Select('IDCH','LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE','LIBELLECAT', 'LIBELLESAISON','IMAGE','STOCKCH')
                ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                ->join('marque','modele.IDMARQUE','=','marque.IDMARQUE')
                ->join('saison','modele.IDSAISON','=','saison.IDSAISON')
                ->join('type','modele.IDTYPE','=','type.IDTYPE')
                ->where('IDCH', '=', $id)
                ->first();
        return $query;
    }
    
      public function getListeModeles($type){

        $lesChaussures= DB::table('Modele')
                ->Select('IDCH','LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE','LIBELLECAT', 'LIBELLESAISON','IMAGE','STOCKCH')
                ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                ->join('marque','modele.IDMARQUE','=','marque.IDMARQUE')
                ->join('saison','modele.IDSAISON','=','saison.IDSAISON')
                ->join('type','modele.IDTYPE','=','type.IDTYPE')
                ->where('categorie.LIBELLECAT','=',$type)
                ->paginate(12);
        return $lesChaussures;       
    }
    
     public function getListeCouleurs($type){
     $couleurs= DB::table('Modele')
                ->Select('COULEURCH')
                ->join('type','modele.IDTYPE','=','type.IDTYPE')
                ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                ->where('categorie.LIBELLECAT','=',$type)
                ->distinct()->get();
                
     return $couleurs;  
     
     }
     
     public function getLesTypes($type){
         $lesTypes= DB::table('Modele')
                ->Select('modele.IDTYPE','LIBELLETYPE')
                ->join('type','modele.IDTYPE','=','type.IDTYPE') 
                 ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                 ->where('categorie.LIBELLECAT','=',$type)
                ->distinct()->get();
        return $lesTypes;       
     }
    
      public function SupprimerChaussure($id){
    DB::table('pointure')->where('IDCH','=',$id)->delete();
    DB::table('modele')->where('IDCH','=',$id)->delete();
    }
    
    
    public function modificationChaussure($code,$prix,$stock,$image, $libelle){
         DB::table('modele')->where('IDCH', $code)
                 ->update(['PRIXCH' => $prix, 'STOCKCH' => $stock, 'IMAGE' => $image, 'LIBELLECH'=> $libelle]);
    }
    
    
    public function filtrerSansPrix($type,$saison,$couleur){
         $lesChaussures= DB::table('Modele')
                ->Select('IDCH','LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE','LIBELLECAT', 'LIBELLESAISON','IMAGE','STOCKCH')
                ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                ->join('marque','modele.IDMARQUE','=','marque.IDMARQUE')
                ->join('saison','modele.IDSAISON','=','saison.IDSAISON')
                ->join('type','modele.IDTYPE','=','type.IDTYPE') 
                ->where('categorie.LIBELLECAT','=',$type) 
                 ->where('saison.LIBELLESAISON','=',$saison)
                 ->where('modele.COULEURCH','=',$couleur)
                ->paginate(12);
        return $lesChaussures;       
    }
    
    public function getQteStock($idch){
        $qte = DB::table('Modele')->Select('stockCh')
                ->where('idCh', '=', $idCh)
                ->first();
        return $qte;
    }
}
