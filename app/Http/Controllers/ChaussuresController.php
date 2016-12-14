<?php

namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\Client;
use App\metier\Pointure;
use Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\metier\Saison;
use App\metier\Type;


class ChaussuresController extends Controller {

    public function getListeChaussuresHomme() {
        $uneChaussure = new Modele();
     
        $type = "Homme";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);
   
        $uneSaison = new Saison();
        $lesSaisons= $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);
      

        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type', 'lesSaisons', 'lesTypes', 'lesCouleurs'  ));
    }

    public function getListeChaussuresFemme() {
        $uneChaussure = new Modele();
        $type = "Femme";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);
        $uneSaison = new Saison();
        $lesSaisons= $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type','lesSaisons', 'lesTypes', 'lesCouleurs'));
    }

    public function getListeChaussuresEnfant() {
        $uneChaussure = new Modele();
        $type = "Enfant";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);
           $uneSaison = new Saison();
        $lesSaisons= $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type','lesSaisons', 'lesTypes', 'lesCouleurs'));
    }

    public function SupprimerChaussure($id, $type) {
        $uneChaussure = new Modele();
        $uneChaussure->SupprimerChaussure($id);

        switch ($type) {
            case "Homme":
                return redirect('/listerChaussureHomme');
            case "Femme":
                return redirect('/listerChaussureFemme');
            case "Enfant":
                return redirect('/listerChaussureEnfant');
            default:
                return redirect('/');
        }
    }
    
    
      public function modifierChaussure($id,$type){
        $unModele = new Modele();
        $uneChaussure = $unModele->getModele($id);
       
        return view('formChaussureModif', compact('uneChaussure','type'));
    }
    
     public function postmodifierChaussure($id = null, $type){
        $code = $id;
        $libelle = Request::input('LIBELLECH');
        $prix = Request::input('PRIXCH');
        $stock = Request::input('STOCKCH');
        $image = Request::input('couverture');
        $unModele = new Modele();
        $unModele->modificationChaussure($code,$prix,$stock,$image, $libelle);
        switch ($type) {
            case "Homme":
                return redirect('/listerChaussureHomme');
            case "Femme":
                return redirect('/listerChaussureFemme');
            case "Enfant":
                return redirect('/listerChaussureEnfant');
            default:
                return redirect('/');
        }
    }
    
    public function getChaussure($id){
        $unModele = new Modele();
        $unePointure = new Pointure();
        $uneChaussure = $unModele->getModele($id);    
        $lesPointures = $unePointure->getPointure($id);
        return view('desChaussure', compact('uneChaussure','lesPointures'));
    }

    
    public function filrerChaussure(){
         $uneChaussure = new Modele();
        $type = Request::input('type');
        $couleur = Request::input('cbCouleurs');
        $prix = Request::input('cbPrix');
        $Type = Request::input('cbType');
        $saison = Request::input('cbSaison');
        $unModele = new Modele();
        $uneSaison = new Saison();
        $lesSaisons= $uneSaison->getListeSaison();
        $lesCouleurs = $uneChaussure->getListeCouleurs($type);
        $lesTypes = $uneChaussure->getLesTypes($type);
        if (!isset($prix) && isset($Type,$saison,$couleur))
        {
            $lesChaussures=$unModele->filtrerSansPrix($type,$saison,$couleur);
        }
          return view('tableauChaussures', compact('lesChaussures','type', 'lesCouleurs','lesTypes','lesSaisons'));
       
        }
    }
    
    
    
    
    

