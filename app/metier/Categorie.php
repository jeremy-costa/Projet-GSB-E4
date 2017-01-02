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

    public function getListeMCategories() {
        $query = DB::table('Categorie')
                ->get();
        return $query;
    }

    public function getidCategorie() {
        return $this->getKey();
    }

    public function getCategorie($id) {
        $query = DB::table('Categorie')
                ->select()
                ->where('idCat', '=', $id)
                ->first();
        return $query;
    }

}
