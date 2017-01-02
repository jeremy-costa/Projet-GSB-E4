<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Marque extends Model {

    protected $table = 'Marque';
    protected $primaryKey = 'idMarque';
    public $timestamps = false;
    protected $fillable = [
        'idMarque',
        'nomMarque',
        'numeroMarque',
    ];

    public function __construct() {
        $this->id_marque = 0;
    }

    public function getListeMarques() {
        $query = DB::table('Marque')
                ->get();
        return $query;
    }

    public function getidMarque() {
        return $this->getKey();
    }

    public function getMarque($id) {
        $query = DB::table('Marque')
                ->select()
                ->where('idMarque', '=', $id)
                ->first();
        return $query;
    }

}
