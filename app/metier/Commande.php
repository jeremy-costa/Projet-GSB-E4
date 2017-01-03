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
    
    //Dialogue aves la bdd pour récupérer une commande en fonction de son id
    public function getIdCommandeClient($id) {
        $commande = DB::table('commande')
                ->select('idCmde')
                ->where('idCli', '=', $id)
                ->where('effectue', '=', false)
                ->first();
        return $commande;
    }

    //Dialogue aves la bdd pour ajouter une commande dans la bdd en fonction de l'id de l'utilisateur
    public function ajouterCommande($idCli) {
        $dateJour = date('Y/m/d', time());
        DB::table('commande')->insert(['IDCLI' => $idCli, 'DATECMDE' => $dateJour]);
    }

    //Dialogue aves la bdd pour supprimer une commande en fonction de l'id de la commande 
    public function supprimerCommande($idCmde) {
        DB::table('commande')->where('IDCMDE', '=', $idCmde->idCmde)
                ->delete();
    }

    //Dialogue aves la bdd pour modifier le statut d'une commande comme étant effectuée 
    public function validerCommande($idCmde) {
        DB::table('commande')->where('IDCMDE', '=', $idCmde->idCmde)
                ->update(['EFFECTUE' => true]);
    }

}
