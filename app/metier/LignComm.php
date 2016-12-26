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

    public function __construct() {
        $this->idCh = 0;
    }

    public function getlesChaussuresCommande($idcmde) {
        
        $lesChaussures = DB::table('ligncomm')
                ->Select('ligncomm.IDCMDE', 'ligncomm.IDTAILLE','modele.IDCH', 'modele.LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'QTECOMMANDE')
                ->join('modele', 'ligncomm.IDCH', '=', 'modele.IDCH')
                ->join('marque', 'marque.IDMARQUE', '=', 'modele.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->where('ligncomm.idCmde', '=', $idcmde->idCmde)
                ->get();
        return $lesChaussures;
    }
    public function getlesChaussuresCommandeClient($idcmde) {
        
        $lesChaussures = DB::table('ligncomm')
                ->Select('ligncomm.IDTAILLE','modele.IDCH', 'modele.LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'QTECOMMANDE')
                ->join('modele', 'ligncomm.IDCH', '=', 'modele.IDCH')
                ->join('marque', 'marque.IDMARQUE', '=', 'modele.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->where('ligncomm.idCmde', '=', $idcmde)
                ->get();
        return $lesChaussures;
    }
    
    public function SupprimerLignComm($id,$idtaille,$idCmde){
        DB::table('ligncomm')
                             ->where('IDCH','=',$id)
                             ->where('idTaille','=',$idtaille)
                             ->where('idCmde','=',$idCmde->idCmde)
                             ->delete();
    }
    
    public function getQte($idCh, $id, $idTaille){
        $qte = DB::table('ligncomm')->Select('Qtecommande)')
                             ->where('IDCH','=',$idCh)
                             ->where('idTaille','=',$idTaille)
                             ->where('idCmde','=',$id->idCmde)
                             ->first();
        return $qte;
    }

    public function AjouterLignComm($id,$pointure,$idCmde){  
        DB::table('ligncomm')->insert(['IDCH'=>$id,'IDCMDE'=>$idCmde->idCmde,'IDTAILLE'=>(int)$pointure, 'QTECOMMANDE'=>1]);
    }
    public function chaussureInPanier($id,$Pointure,$idCmde){
        $query = DB::table('ligncomm')->Select('idCmde')
                ->where('idCmde', '=', $idCmde->idCmde)
                ->where('idCh','=',$id)
                ->where('idTaille','=',$Pointure)
                ->first();
        return $query;
    }
    
    public function augmenterQte($idCh,$idTaille){
        DB::table('ligncomm')->where('idCh', '=', $idCh)
                             ->where('idTaille','=',$idTaille)
                             ->Increment('QteCommande');
    }
    public function diminuerQte($idCh,$idTaille){
        DB::table('ligncomm')->where('idCh', '=', $idCh)
                             ->where('idTaille','=',$idTaille)
                             ->Decrement('QteCommande');
    }
    
   
    
}
