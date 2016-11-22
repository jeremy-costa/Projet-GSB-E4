<?php



namespace App\Http\Controllers;
use App\metier\Modele;

use Request;
use Illuminate\Support\Facades\Session;
use Exception;

class ChaussuresController extends Controller {
    
    public function getListeChaussures($levelsecurite){
        $uneChaussure = new Modele();
        $lesChaussures = $uneChaussure->getListeModeles();
        return view('tableauChaussures', compact('lesChaussures','levelsecurite'));
    }
    
//    public function ajoutManga(){
//        $unGenre = new Genre();
//        $mesGenres = $unGenre->getListeGenres();
//        $unScenariste = new Scenariste();
//        $mesScenaristes = $unScenariste->getListeScenaristes();
//        $unDessinateur = new Dessinateur();
//        $mesDessinateurs = $unDessinateur->getListeDessinateurs();
//        return view('formManga', compact('mesGenres','mesScenaristes','mesDessinateurs'));
//    }
//    
//    public function postajouterManga(){
//        $code_d = Request::input('cbDessinateur');
//        $prix = Request::input('prix');
//        $id_scenariste = Request::input('cbScenariste');
//        $titre = Request::input('titre');
//        $couverture = Request::input('couverture');
//        $code_ge = Request::input('cbGenres');
//        $unManga = new Manga();
//        $unManga->ajoutManga($code_d,$prix,$titre,$couverture,$code_ge,$id_scenariste);
//        return view('home');
//    }
//    
//    public function modifierManga($id){
//        $unMg = new Manga();
//        $unManga = $unMg->getManga($id);
//        $unGenre = new Genre();
//        $mesGenres = $unGenre->getListeGenres();
//        $unScenariste = new Scenariste();
//        $mesScenaristes = $unScenariste->getListeScenaristes();
//        $unDessinateur = new Dessinateur();
//        $mesDessinateurs = $unDessinateur->getListeDessinateurs();
//        return view('formMangaModif', compact('unManga', 'mesGenres', 'mesScenaristes', 'mesDessinateurs'));
//    }
//    
//    public function postmodifierManga($id = null){
//        $code = $id;
//        $code_d = Request::input('cbDessinateur');
//        $prix = Request::input('prix');
//        $id_scenariste = Request::input('cbScenariste');
//        $titre = Request::input('titre');
//        $couverture = Request::input('couverture');
//        $code_ge = Request::input('cbGenres');
//        $unManga = new Manga();
//        $unManga->modificationManga($code,$code_d,$prix,$titre,$couverture,$code_ge,$id_scenariste);
//        $mesMangas = $unManga->getListeManga();
//        return view('tableauManga', compact('mesMangas'));
//    }
//    
//    public function listerGenre(){
//        $unGenre = new Genre();
//        $mesGenres = $unGenre->getListeGenres();
//        return view('formMangaGenre', compact('mesGenres'));
//    }
//    
//    public function postAfficherMangaGenre(){
//        $code_ge = Request::input('cbGenres');
//        $lib_ge = Request::input('cbGenres');
//        $unManga = new Manga();
//        $mesMangas = $unManga->getListeMangaGenre($code_ge);
//        return view('pageMangaGenre', compact('mesMangas','lib_ge'));
//    }
}
