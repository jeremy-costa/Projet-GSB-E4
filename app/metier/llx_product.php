<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class llx_product extends Model {

    protected $table = 'llx_product';

    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'datec',
        'tms',
        'virtual',
        'fk_parent',
        'ref',
        'label',
        'note',
        'price_ttc'
        
        ];



public function getLesProduitsFamilles($idFamillePub,$id){
 $results = DB::select('select prod.rowid,ref, prod.label,note,price_ttc from llx_product prod
  join llx_categorie_product on llx_categorie_product.fk_product =prod.rowid
  join llx_categorie cat on (cat.rowid = llx_categorie_product.fk_categorie)
  
  where
   prod.rowid in (
     select pd.rowid from llx_product pd
     left join llx_categorie_product cp on (cp.fk_product =pd.rowid)
     where pd.rowid = rowid and cp.fk_categorie = ?
     )
  and  llx_categorie_product.fk_categorie = ?
   and prod.tosell="1"
  

order by ref', array( $id->rowid, $idFamillePub->rowid));
        
     
 
 

return $results;


}

public function getLesProduitsSousFamilles($idFamillePub, $idSousFamille){
 $results = DB::select('select prod.rowid,ref, prod.label,note,price_ttc from llx_product prod
  join llx_categorie_product on llx_categorie_product.fk_product =prod.rowid
  join llx_categorie cat on (cat.rowid = llx_categorie_product.fk_categorie)
  
  
  where
   prod.rowid in (
     select pd.rowid from llx_product pd
     left join llx_categorie_product cp on (cp.fk_product =pd.rowid)
     where pd.rowid = rowid and cp.fk_categorie = ?
     )
  and  llx_categorie_product.fk_categorie = ?
  and prod.tosell=1
  
  

order by ref', array($idFamillePub->rowid, $idSousFamille));
 
 

return $results;


}

public function getLeProduit($ref){
     $unP = DB::table('llx_product')
                ->Select('rowid','ref','label','description','note','price_ttc')
                ->where('ref', '=',$ref)
                ->first();
        return $unP;
}


public function insertProd($label,$Description, $Reference, $prixTTC)
{
    $prixHT=$prixTTC/1.20;
DB::table('llx_product')->insert(['ref' => $Reference, 'description' => $Description, 'label' => $label, 'price' => $prixHT, 'price_ttc' => $prixTTC, 'tva_tx'=>'20.000' ]);
}


public function getLesProduitsAdd() {
    $lesProduitsAdd = DB::table('llx_product')->select('rowid','ref','label','description','price','price_ttc')
                            ->where('ref','like','ajo%')
                            ->orderby('rowid')->get();
    return $lesProduitsAdd;
}

public function deletePAdd($rowidProduitAdd)
{
      DB::table('llx_product')
                ->where('rowid', '=', $rowidProduitAdd)
                ->delete();
}

}