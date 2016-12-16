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
    ];

    public function __construct() {
        $this->idCmde = 0;
    }

    public function getCommande() {
        return $this->getKey();
    }

    public function getUneCommandeClient($id) {
        $commande = DB::table('commande')
                ->select('idCmde')
                ->where('idCli', '=', $id)
                ->first();
        return $commande;
    }

    public function getUneCommande($id) {
        $commande = DB::table('commande')
                ->select('idCmde')
                ->where('idCli', '=', $id)
                ->first();
        return $commande->idCmde;
    }

    public function ajouterCommande($idCli) {
        $dateJour = date('Y/m/d', time());
        DB::table('commande')->insert(['IDCLI' => $idCli, 'DATECMDE' => $dateJour]);
    }
    public function supprimerCommande($idCmde) {
        DB::table('ligncomm')->where('IDCMDE','=',$idCmde)
                             ->delete();
    }

}
