<?php
namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\visiteur;
use App\metier\activite_compl;



class VisiteurController extends Controller {

   

  
 
    

     public function getPageRechercher() {
        $erreur = "";
       
       
        return view('rechercher', compact('erreur'));
    }

public function getLaRecherche() {
    $unV = new visiteur();
    $typeRecherche = Request::input('typeRecherche');
    $recherche = Request::input('recherche');
    
    if ($typeRecherche =="nom")
        $lesVisiteurs = $unV->getLesVisiteursNom($recherche);
   
    else 
        if($typeRecherche =="laboratoire")
    {
         $lesVisiteurs = $unV->getLesVisiteursLaboratoire($recherche);
    }
  
       
     return view('resultatsRecherche', compact('lesVisiteurs' ));
}


public function getLesActivitesComplementaires($nom_visiteur)
{
    $unA = new activite_compl();
   $lesActivites= $unA->getLesActivitesComplementaires($nom_visiteur);
   return view('activitesComplementaires', compact('lesActivites','nom_visiteur' ));
}
    

public function deleteActiviteComplementaire($idActivite, $nom_visiteur)
{
    $uneA = new activite_compl();
    $uneA->deleteActivite($idActivite);
      return redirect('/ActivitesComplementaires/' . $nom_visiteur);
}
   

}
