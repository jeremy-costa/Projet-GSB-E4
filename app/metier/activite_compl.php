<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class activite_compl extends Model {

    protected $table = 'activite_compl';

    public $timestamps = false;
    protected $fillable = [
        'id_activite_compl',
        'date_activite',
        'lieu_activite',
        'theme_activite',
        'motif_activite',
    
        
        ];
    
    
    public function getLesActivitesComplementaires($nom_visiteur)
    {
        
         $activites = DB::table('activite_compl')
        ->select('activite_compl.id_activite_compl','theme_activite','motif_activite', 'lieu_activite','montant_ac','date_activite')
        ->join('realiser','activite_compl.id_activite_compl','=','realiser.id_activite_compl')
        ->join('visiteur','realiser.id_visiteur','=','visiteur.id_visiteur')
        ->where('nom_visiteur', '=', $nom_visiteur)
        ->get();
        
        return $activites;
   }
   
   
    public function deleteActivite($idActivite) {
         DB::table('realiser')->where('id_activite_compl', '=', $idActivite)->delete();
        DB::table('activite_compl')->where('id_activite_compl', '=', $idActivite)->delete();
        
    }
    
    
  
}