<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Modele extends Model {

    protected $table = 'Modele';
    protected $primaryKey = 'idCh';
    public $timestamps = false;
    protected $fillable = [
        'IDCH',
        'IDTYPE',
        'IDMARQUE',
        'IDCAT',
        'IDSAISON',
        'LIBELLECH',
        'PRIXCH',
        'STOCKCH',
        'MATIERECH',
        'COULEURCH',
        'IMAGE',
    ];

    public function __construct() {
        $this->idCh = 0;
    }

    public function getidModele() {
        return $this->getKey();
    }

    //Dialogue aves la bdd pour récupérer un modèle de chaussure
    public function getModele($id) {
        $query = DB::table('Modele')
                ->Select('IDCH', 'LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'MATIERECH')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->join('marque', 'modele.IDMARQUE', '=', 'marque.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->where('IDCH', '=', $id)
                ->first();
        return $query;
    }

    //Dialogue aves la bdd pour récupérer la liste des modèles de chaussure (avec pagination)
    public function getListeModeles($type) {

        $lesChaussures = DB::table('Modele')
                ->Select('IDCH', 'LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'modele.IDSAISON', 'modele.IDTYPE', 'COULEURCH')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->join('marque', 'modele.IDMARQUE', '=', 'marque.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->where('categorie.LIBELLECAT', '=', $type)
                ->paginate(12);
        return $lesChaussures;
    }

    //Dialogue aves la bdd pour récupérer la liste des modèles de chaussure (sans pagination)
    public function getListeModelesBis($type) {

        $lesChaussures = DB::table('Modele')
                ->Select('IDCH', 'LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'modele.IDSAISON', 'modele.IDTYPE', 'COULEURCH')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->join('marque', 'modele.IDMARQUE', '=', 'marque.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->where('categorie.LIBELLECAT', '=', $type)
                ->get();
        return $lesChaussures;
    }

    //Dialogue aves la bdd pour récupérer la liste des couleurs des chaussures
    public function getListeCouleurs($type) {
        $couleurs = DB::table('Modele')
                        ->Select('COULEURCH')
                        ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                        ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                        ->where('categorie.LIBELLECAT', '=', $type)
                        ->distinct()->get();

        return $couleurs;
    }

    //Dialogue aves la bdd pour récupérer la liste des types des chaussures
    public function getLesTypes($type) {
        $lesTypes = DB::table('Modele')
                        ->Select('modele.IDTYPE', 'LIBELLETYPE')
                        ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                        ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                        ->where('categorie.LIBELLECAT', '=', $type)
                        ->distinct()->get();
        return $lesTypes;
    }

    //Dialogue aves la bdd pour supprimer un modèle de chaussure de la bdd (pointure et modèle)
    public function SupprimerChaussure($id) {
        DB::table('pointure')->where('IDCH', '=', $id)->delete();
        DB::table('modele')->where('IDCH', '=', $id)->delete();
    }

    //Dialogue aves la bdd pour modifier un modèle de chaussure 
    public function modificationChaussure($code, $prix, $stock, $image, $libelle) {
        DB::table('modele')->where('IDCH', $code)
                ->update(['PRIXCH' => $prix, 'STOCKCH' => $stock, 'IMAGE' => $image, 'LIBELLECH' => $libelle]);
    }

    //Dialogue aves la bdd pour filtrer les modèles de chaussures en fonction du type, de la saison et de la couleur 
    public function filtrerSansPrix($type, $saison, $couleur) {
        $lesChaussures = DB::table('Modele')
                ->Select('IDCH', 'LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->join('marque', 'modele.IDMARQUE', '=', 'marque.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->where('categorie.LIBELLECAT', '=', $type)
                ->where('saison.LIBELLESAISON', '=', $saison)
                ->where('modele.COULEURCH', '=', $couleur)
                ->paginate(12);
        return $lesChaussures;
    }

    //Dialogue aves la bdd pour récupérer la quantitée en stock d'un modèle de chaussure
    public function getQteStock($idch) {
        $qte = DB::table('Modele')->Select('STOCKCH')
                ->where('IDCH', '=', $idch)
                ->first();
        return $qte;
    }

    //Dialogue aves la bdd pour récupérer la liste des modèles de chaussure par type
    public function getListeModelesType($type, $Type) {

        $lesChaussures = DB::table('Modele')
                ->Select('IDCH', 'LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'modele.IDSAISON', 'modele.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->join('marque', 'modele.IDMARQUE', '=', 'marque.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->where('categorie.LIBELLECAT', '=', $type)
                ->where('modele.IDTYPE', '=', $Type)
                ->get();

        return $lesChaussures;
    }

    //Dialogue aves la bdd pour récupérer la liste des modèles de chaussures par couleur
    public function getListeModelesCouleur($type, $couleur) {

        $lesChaussures = DB::table('Modele')
                ->Select('IDCH', 'LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'modele.IDSAISON', 'modele.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->join('marque', 'modele.IDMARQUE', '=', 'marque.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->where('categorie.LIBELLECAT', '=', $type)
                ->where('modele.COULEURCH', '=', $couleur)
                ->get();

        return $lesChaussures;
    }

    //Dialogue aves la bdd pour récupérer la liste des modèles de chaussures par saison
    public function getListeModelesSaison($type, $saison) {

        $lesChaussures = DB::table('Modele')
                ->Select('IDCH', 'LIBELLECH', 'NOMMARQUE', 'PRIXCH', 'LIBELLETYPE', 'LIBELLECAT', 'LIBELLESAISON', 'IMAGE', 'STOCKCH', 'modele.IDSAISON', 'modele.IDTYPE')
                ->join('categorie', 'modele.IDCAT', '=', 'categorie.IDCAT')
                ->join('marque', 'modele.IDMARQUE', '=', 'marque.IDMARQUE')
                ->join('saison', 'modele.IDSAISON', '=', 'saison.IDSAISON')
                ->join('type', 'modele.IDTYPE', '=', 'type.IDTYPE')
                ->where('categorie.LIBELLECAT', '=', $type)
                ->where('modele.IDSAISON', '=', $saison)
                ->get();

        return $lesChaussures;
    }

    //Dialogue aves la bdd pour ajouter un modéle de chaussure dans la bdd 
    public function ajoutChaussure($idCh, $titre, $code_cat, $code_mar, $code_saison, $couverture, $prix, $couleur, $code_type, $matiere, $pointures, $qtepointures) {
        $lesPointures = explode(",", $pointures);
        $lesQtePointures = explode(",", $qtepointures);
        $stock = array_sum($lesQtePointures);
        DB::table('Modele')->insert(['IDCH' => $idCh, 'IDTYPE' => $code_type, 'IDMARQUE' => $code_mar, 'IDCAT' => $code_cat, 'IDSAISON' => $code_saison, 'LIBELLECH' => $titre, 'PRIXCH' => $prix, 'STOCKCH' => $stock, 'MATIERECH' => $matiere, 'COULEURCH' => $couleur, 'IMAGE' => $couverture]);
        $cpt = 0;
        while ($cpt < count($lesPointures)) {
            DB::table('pointure')->insert(['IDCH' => $idCh, 'IDTAILLE' => $lesPointures[$cpt], 'QTESTOCK' => $lesQtePointures[$cpt]]);
            $cpt += 1;
        }
    }

    //Dialogue aves la bdd pour composer l'id d'une chaussure 
    public function compositionIDChaussure($code_type, $code_cat) {
        $cpt = DB::table('Modele')->Select('IDCH')
                ->where('IDTYPE', '=', $code_type)
                ->where('IDCAT', '=', $code_cat)
                ->count();
        if ($cpt < 10) {
            $cpt += 1;
            $idCh = $code_cat . $code_type . '0' . (string) $cpt;
        } else {
            $cpt += 2;
            $idCh = $code_cat . $code_type . (string) $cpt;
        }
        return $idCh;
    }

    //Dialogue aves la bdd pour mettre à jour la quantitée en stock d'une chaussure (modèle et pointure)
    //en fonction de la quantité commandée par le client 
    public function miseAJourDonnee($uneL) {
        DB::table('modele')->where('IDCH', $uneL->IDCH)
                ->decrement('STOCKCH', $uneL->QTECOMMANDE);
        DB::table('pointure')->where('IDCH', $uneL->IDCH)
                ->where('IDTAILLE', $uneL->IDTAILLE)
                ->decrement('QTESTOCK', $uneL->QTECOMMANDE);
    }

}
