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
                ->Select('ligncomm.IDTAILLE','modele.IDCH', 'modele.LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'QTECOMMANDE')
                ->join('modele', 'ligncomm.IDCH', '=', 'modele.IDCH')
                ->join('marque', 'marque.IDMARQUE', '=', 'modele.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->where('ligncomm.IDCMDE', '=', (int)$idcmde)
                ->get();
        return $lesChaussures;
    }
    
    public function SupprimerLignComm($id,$idtaille){
        DB::table('ligncomm')->where('IDCH','=',$id)
                             ->where('idTaille','=',$idtaille)
                             ->delete();
    }
    

    public function AjouterLignComm($id,$pointure,$idCmde){  
        DB::table('ligncomm')->insert(['IDCH'=>$id,'IDCMDE'=>$idCmde,'IDTAILLE'=>(int)$pointure, 'QTECOMMANDE'=>1]);
    }
    public function chaussureInPanier($id,$Pointure,$idCmde){
        $query = DB::table('ligncomm')->Select('idCmde')
                ->where('idCmde', '=', $idCmde)
                ->where('idCh','=',$id)
                ->where('idTaille','=',$Pointure)
                ->first();
        return $query;
    }
}
