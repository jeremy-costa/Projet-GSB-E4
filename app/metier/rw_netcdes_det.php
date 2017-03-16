<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class rw_netcdes_det extends Model {

    protected $table = 'rw_netcdes_det';
    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'fk_netcde',
        'fk_product',
        'prixunit_ht',
        'txtva',
        'prixunit_ttc',
        'quantite',
        'total_ht',
        'total_ttc',
    ];

    public function AjouterLignComm($idProduit, $idCmde) {
        $produit = DB::table('llx_product')->select('price', 'price_ttc', 'tva_tx')
                ->where('rowid', '=', $idProduit)
                ->first();


        DB::table('rw_netcdes_det')->insert(['fk_netcde' => $idCmde->rowid, 'fk_product' => $idProduit, 'prixunit_ht' => $produit->price, 'txtva' => $produit->tva_tx, 'quantite' => 1]);
    }

    public function ProduitInPanier($idProduit, $idCmde) {
        $query = DB::table('rw_netcdes_det')->Select('rowid')
                ->where('fk_netcde', '=', $idCmde->rowid)
                ->where('fk_product', '=', $idProduit)
                ->first();
        return $query;
    }

    public function getlesProduitsCommande($idcmde) {

        $lesProduits = DB::table('rw_netcdes_det')
                ->Select('rw_netcdes_det.rowid', 'rw_netcdes_det.total_ttc', 'llx_product.rowid', 'llx_product.ref', 'llx_product.label', 'llx_product.label', 'llx_product.description', 'price', 'price_ttc', 'quantite')
                ->join('llx_product', 'llx_product.rowid', '=', 'rw_netcdes_det.fk_product')
                ->where('rw_netcdes_det.fk_netcde', '=', $idcmde->rowid)
                ->get();
        return $lesProduits;
    }

    public function getlesProduitsAnciennesCommandes($idClient) {

        $lesProduits = DB::table('rw_netcdes_det')
                ->Select('rw_netcdes_det.rowid', 'rw_netcdes_det.total_ttc', 'llx_product.rowid', 'llx_product.ref as refprod', 'llx_product.label', 'llx_product.label', 'llx_product.description', 'price', 'price_ttc', 'quantite','rw_netcdes.ref as refcom','rw_netcdes.date' )
                ->join('llx_product', 'llx_product.rowid', '=', 'rw_netcdes_det.fk_product')
                ->join('rw_netcdes','rw_netcdes.rowid','=','rw_netcdes_det.fk_netcde')
                ->where('cde_a_livrer', '=', 1)
                ->where('fk_soc', '=', $idClient)
                ->get();
        return $lesProduits;
    }

    public function SupprimerLignComm($idProduit, $idCmde) {
        DB::table('rw_netcdes_det')
                ->where('fk_product', '=', $idProduit)
                ->where('fk_netcde', '=', $idCmde->rowid)
                ->delete();
    }

    public function augmenterQte($idProd, $idCmde) {
        DB::table('rw_netcdes_det')->where('fk_product', '=', $idProd)
                ->where('fk_netcde', '=', $idCmde->rowid)
                ->Increment('quantite');
    }

    //Dialogue aves la bdd pour diminuer la quantité commandée d'un Produit dans une ligne de commande
    public function diminuerQte($idProd, $idCmde) {
        DB::table('rw_netcdes_det')->where('fk_product', '=', $idProd)
                ->where('fk_netcde', '=', $idCmde->rowid)
                ->Decrement('quantite');
    }

    public function getQte($idProduit, $idCmde) {
        $qte = DB::table('rw_netcdes_det')->Select('quantite')
                ->where('fk_product', '=', $idProduit)
                ->where('fk_netcde', '=', $idCmde->rowid)
                ->first();
        return $qte;
    }

}
