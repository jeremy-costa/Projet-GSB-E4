<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class rw_netcdes extends Model {

    protected $table = 'rw_netcdes';
    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'ref',
        'date',
        'fk_soc',
        'cde_a_livrer',
        'refclient',
        'fraislivraison_ht',
        'fk_commande',
        
        ];
    public function getIdCommandeClient($idCli){
           $lesCommandesCli = DB::table('rw_netcdes')
                
                ->Select('rowid')
                ->where('fk_soc','=',$idCli)
                ->where('cde_a_livrer','=',0)             
                ->first();
                                                                          
        return $lesCommandesCli;  
    }
    public function getIdAnciennesCommandesClient($idCli){
           $lesAnciennesCommandesCli = DB::table('rw_netcdes')
                
                ->Select('rowid','date','ref')
                ->where('fk_soc','=',$idCli)
                ->where('cde_a_livrer','=',1)             
                ->get();
                                                                          
        return  $lesAnciennesCommandesCli;  
    }
    
    
      public function ajouterCommande($idCli) {
        $dateJour = date('Y-m-d', time());
   
        $date = date('y-m', time());
     
        
 $marequete = "SELECT max(ref)as refmax FROM `rw_netcdes` WHERE date like '%".$date."%'";
   
 
 $nbLigne = DB::select($marequete);
           foreach ($nbLigne as $l){
      $l->refmax;
           }
   
    
      $ref = $l->refmax+1;
      
      
      DB::table('rw_netcdes')->insert(['ref'=>$ref, 'date'=>$dateJour,'fk_soc'=> $idCli, 'cde_a_livrer'=> 0]);
      
      
      
    }
    
     public function supprimerCommande($idCmde) {
        DB::table('rw_netcdes')->where('rowid', '=', $idCmde->rowid)
                ->delete();
    }
  public function majBDD($rowid){
       DB::table('rw_netcdes')->where('rowid', '=', $rowid->rowid)
                ->update(['cde_a_livrer' => 1]);
    }
    

    
    
    
}
