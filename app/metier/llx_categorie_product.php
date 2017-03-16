<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class llx_categorie_product extends Model {

    protected $table = 'llx_categorie_product';

    public $timestamps = false;
    protected $fillable = [
        'fk_categorie',
        'fk_product',
        'import_key',
        
        ];


public function insertProduitcat($produit, $idFamillePub, $SousFamille, $Famille)
{
DB::table('llx_categorie_product')->insert(['fk_categorie' => $idFamillePub->rowid, 'fk_product' => $produit->rowid ]);
DB::table('llx_categorie_product')->insert(['fk_categorie' => $Famille, 'fk_product' => $produit->rowid ]);
DB::table('llx_categorie_product')->insert(['fk_categorie' => $SousFamille, 'fk_product' => $produit->rowid ]);
}


public function deleteProduitAdd($rowidProduitAdd){
          DB::table('llx_categorie_product')
                ->where('fk_product', '=', $rowidProduitAdd)
                ->delete();
}
}
