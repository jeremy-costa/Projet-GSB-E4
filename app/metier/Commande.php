<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Commande extends Model {

    protected $table = 'Commande';
    public $timestamps = false;
    protected $fillable = [
        'idCmde',
        'idCli',
        'dateCmde',
        'effectue',
    ];

    public function __construct() {
        $this->idCmde = 0;
    }

    public function getCommande() {
        return $this->getKey();
    }

    public function getIdCommandeClient($id) {
        $commande = DB::table('commande')
                ->select('idCmde')
                ->where('idCli', '=', $id)
                ->where('effectue','=',false)
                ->first();
        return $commande;
    }
    
   
    

    public function ajouterCommande($idCli) {
        $dateJour = date('Y/m/d', time());
        DB::table('commande')->insert(['IDCLI' => $idCli, 'DATECMDE' => $dateJour]);
    }
    public function supprimerCommande($idCmde) {
        DB::table('commande')->where('IDCMDE','=',$idCmde->idCmde)
                             ->delete();
    }
    
    public function validerCommande($idCmde){
        DB::table('commande')->where('IDCMDE','=',$idCmde->idCmde)
                ->update(['EFFECTUE'=> true]);
    }

}
