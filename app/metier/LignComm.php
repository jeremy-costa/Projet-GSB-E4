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
    
    
    public function getlesChaussuresCommande($idcmde){
             $lesChaussures= DB::table('ligncomm')
             ->Select('IDCH','LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE','LIBELLECAT', 'LIBELLESAISON','IMAGE','STOCKCH')
                ->join('modele','ligncomm.IDCH','=','modele.IDCH')
                ->join('marque','marque.IDMARQUE','=','modele.IDMARQUE')
                ->join('saison','modele.IDSAISON','=','saison.IDSAISON')
                ->join('type','modele.IDTYPE','=','type.IDTYPE')
                ->join('categorie','modele.IDCAT','=','categorie.IDCAT')
                ->where('ligncomm.IDCMDE','=',$idcmde);
             
        return $lesChaussures;       
    }
    
    
    
  
    
  
}
