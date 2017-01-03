<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Categorie extends Model {

    protected $table = 'Categorie';
    protected $primaryKey = 'idCat';
    public $timestamps = false;
    protected $fillable = [
        'idCat',
        'libelleCat',
    ];

    public function __construct() {
        $this->id_marque = 0;
    }
    
    //Dialogue aves la bdd pour récupérer la liste des catégories
    public function getListeMCategories() {
        $query = DB::table('Categorie')
                ->get();
        return $query;
    }
    
    //Dialogue aves la bdd pour récupérer l'id d'une catégorie
    public function getidCategorie() {
        return $this->getKey();
    }
    
    //Dialogue aves la bdd pour récupérer une catégorie en fonction de l'id
    public function getCategorie($id) {
        $query = DB::table('Categorie')
                ->select()
                ->where('idCat', '=', $id)
                ->first();
        return $query;
    }

}
