<?php

namespace App\Http\Controllers;

use App\metier\Modele;
use App\metier\Client;
use Request;
use Illuminate\Support\Facades\Session;
use Exception;

class ChaussuresController extends Controller {

    public function getListeChaussuresHomme() {
        $uneChaussure = new Modele();
        $type = "Homme";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type'));
    }

    public function getListeChaussuresFemme() {
        $uneChaussure = new Modele();
        $type = "Femme";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type'));
    }

    public function getListeChaussuresEnfant() {
        $uneChaussure = new Modele();
        $type = "Enfant";
        $lesChaussures = $uneChaussure->getListeModeles($type);
        $unClient = new Client();
        $id = Session::get('id');
        $Client = $unClient->getClient($id);


        return view('tableauChaussures', compact('lesChaussures', 'Client', 'type'));
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

}
