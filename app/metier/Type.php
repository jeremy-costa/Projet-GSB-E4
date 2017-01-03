<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Type extends Model {

    protected $table = 'Type';
    protected $primaryKey = 'idType';
    public $timestamps = false;
    protected $fillable = [
        'idType',
        'libelleType',
    ];

    public function __construct() {
        $this->id_marque = 0;
    }

    //Dialogue aves la bdd pour récupérer la liste des types de chaussures
    public function getListeTypes() {
        $types = DB::table('Type')
                ->get();
        return $types;
    }

    public function getidType() {
        return $this->getKey();
    }

    //Dialogue aves la bdd pour récupérer un type de chaussure
    public function getType($id) {
        $query = DB::table('Type')
                ->select()
                ->where('idType', '=', $id)
                ->first();
        return $query;
    }

}
