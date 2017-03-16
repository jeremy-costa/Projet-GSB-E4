<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class llx_categorie extends Model {

    protected $table = 'llx_categorie';
    protected $primaryKey = 'rowid';
    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'fk_parent',
        'label',
        'type',
        'entity',
        'description',
        'fk_soc',
        'visible',
        'import_key',
        ];

   public function getToutesLesFamilles() {
        $lesFamilles = DB::table('llx_categorie')
                ->Select('label', 'rowid')
                ->where('type', '=','0')
                ->where('label', 'like', '1%')
                ->get();
        return $lesFamilles;
    }
    
    
    public function getIdFamille($label){
        
         $IDFamille = DB::table('llx_categorie')
                ->Select('rowid')
                ->where('llx_categorie.label','=',$label)
                ->first();
        return $IDFamille;  
}

  public function getIdFamillePublication(){
        
         $IDFamillePublication = DB::table('llx_categorie')
                ->Select('rowid')
                ->where('llx_categorie.label','like','0-pub%')
                ->where('type','=',0)
                ->first();
        return $IDFamillePublication; 
}

 public function getLesSousFamillesFiltrer($id)
         {
 
  $lesSousFamilles = DB::table('llx_categorie')
                ->Select('label', 'rowid')
                ->where('type', '=','0')
                ->where('fk_parent', '=',$id)
                ->get();
        return $lesSousFamilles;
}


public function getNomFamille($rowid)
{ 
        $NomFamille = DB::table('llx_categorie')
        ->select('label')
        ->where('rowid','=',$rowid)
        ->first();
        return $NomFamille;
        
}

public function getLaSousFamille($ref) 
{
     $NomSousFamille = DB::table('v_familles_articles')
        ->select('label_categ as label','cle_categorie as rowid')
        ->where('ref_product','=', $ref)
        ->where('categ_parent_cle','<>', '0' )
        ->first();
        return $NomSousFamille;
}


public function getIdSousFamille($SousFamille){
        
         $IDSousFamille = DB::table('llx_categorie')
                ->Select('fk_parent')
                ->where('llx_categorie.label','=',$SousFamille->label)
                ->first();
        return $IDSousFamille;  
}

public function getLesSousFamilles (){
     $LesSousFamilles = DB::table('llx_categorie')
                ->Select('label','rowid')
                ->where('type','=',0)
                ->where('fk_parent','!=',0)
                ->get();
        return $LesSousFamilles;  
}

public function getLesSousFamillesAdmin ($idFamille){
     $LesSousFamilles = DB::table('llx_categorie')
                ->Select('label','rowid')
                ->where('type','=',0)
                ->where('fk_parent','=',$idFamille)
                ->get();
        return $LesSousFamilles;  
}
}