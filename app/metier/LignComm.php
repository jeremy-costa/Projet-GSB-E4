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
    
    //Dialogue aves la bdd pour récupérer les chaussures d'une commande dont l'id est obtenu par une requête
    public function getlesChaussuresCommande($idcmde) {

        $lesChaussures = DB::table('ligncomm')
                ->Select('ligncomm.IDCMDE', 'ligncomm.IDTAILLE', 'modele.IDCH', 'modele.LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'QTECOMMANDE')
                ->join('modele', 'ligncomm.IDCH', '=', 'modele.IDCH')
                ->join('marque', 'marque.IDMARQUE', '=', 'modele.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->where('ligncomm.idCmde', '=', $idcmde->idCmde)
                ->get();
        return $lesChaussures;
    }

    //Dialogue aves la bdd pour récupérer les chaussures d'une commande dont l'id est passé en post
    public function getlesChaussuresCommandeClient($idcmde) {

        $lesChaussures = DB::table('ligncomm')
                ->Select('ligncomm.IDTAILLE', 'modele.IDCH', 'modele.LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'QTECOMMANDE')
                ->join('modele', 'ligncomm.IDCH', '=', 'modele.IDCH')
                ->join('marque', 'marque.IDMARQUE', '=', 'modele.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->where('ligncomm.idCmde', '=', $idcmde)
                ->get();
        return $lesChaussures;
    }

    //Dialogue aves la bdd pour récupérer les commandes effectuées par un utilisateur
    public function getAnciennesCommandesClient($id) {
        $commandes = DB::table('ligncomm')
                ->select('ligncomm.IDTAILLE', 'modele.IDCH', 'modele.LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'QTECOMMANDE', 'DATECMDE')
                ->join('commande', 'commande.idcmde', '=', 'ligncomm.idcmde')
                ->join('modele', 'modele.IDCH', '=', 'ligncomm.IDCH')
                ->join('marque', 'marque.IDMARQUE', '=', 'modele.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->where('commande.IDCLI', '=', $id)
                ->where('effectue', '=', true)
                ->get();
        return $commandes;
    }

    //Dialogue aves la bdd pour supprimer une ligne de commande d'une commande 
    public function SupprimerLignComm($id, $idtaille, $idCmde) {
        DB::table('ligncomm')
                ->where('IDCH', '=', $id)
                ->where('idTaille', '=', $idtaille)
                ->where('idCmde', '=', $idCmde->idCmde)
                ->delete();
    }

    //Dialogue aves la bdd pour récupérer la quantitée commandée d'une chaussure dans une commande (en fonction de l'id et de la pointure)
    public function getQte($idCh, $id, $idTaille) {
        $qte = DB::table('ligncomm')->Select('QTECOMMANDE')
                ->where('IDCH', '=', $idCh)
                ->where('idTaille', '=', $idTaille)
                ->where('idCmde', '=', $id->idCmde)
                ->first();
        return $qte;
    }

    //Dialogue aves la bdd pour ajouter une ligne de commande dans une commande
    public function AjouterLignComm($id, $pointure, $idCmde) {
        DB::table('ligncomm')->insert(['IDCH' => $id, 'IDCMDE' => $idCmde->idCmde, 'IDTAILLE' => (int) $pointure, 'QTECOMMANDE' => 1]);
    }

    //Dialogue aves la bdd pour récupérer une ligne de commande (en fonction de l'id chaussure, de la pointure et de l'id commande)
    public function chaussureInPanier($id, $Pointure, $idCmde) {
        $query = DB::table('ligncomm')->Select('idCmde')
                ->where('idCmde', '=', $idCmde->idCmde)
                ->where('idCh', '=', $id)
                ->where('idTaille', '=', $Pointure)
                ->first();
        return $query;
    }

    //Dialogue aves la bdd pour augmenter la quantitée commandée d'une chaussure dans une ligne de commande (en fonction de l'id de la chaussure et de la pointure)
    public function augmenterQte($idCh, $idTaille) {
        DB::table('ligncomm')->where('idCh', '=', $idCh)
                ->where('idTaille', '=', $idTaille)
                ->Increment('QteCommande');
    }

    //Dialogue aves la bdd pour diminuer la quantitée commandée d'une chaussure dans une ligne de commande (en fonction de l'id de la chaussure et de la pointure)
    public function diminuerQte($idCh, $idTaille) {
        DB::table('ligncomm')->where('idCh', '=', $idCh)
                ->where('idTaille', '=', $idTaille)
                ->Decrement('QteCommande');
    }

}
