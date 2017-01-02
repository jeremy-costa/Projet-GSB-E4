<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Saison extends Model {

    protected $table = 'Saison';
    protected $primaryKey = 'idSaison';
    public $timestamps = false;
    protected $fillable = [
        'idSaison',
        'libelleSaison',
    ];

    public function __construct() {
        $this->id_marque = 0;
    }

    public function getListeSaison() {
        $saison = DB::table('saison')
                        ->select('IDSAISON', 'LIBELLESAISON')
                        ->distinct()->get();
        return $saison;
    }

    public function getidSaison() {
        return $this->getKey();
    }

    public function getSaison($id) {
        $query = DB::table('saison')
                ->select()
                ->where('idSaison', '=', $id)
                ->first();
        return $query;
    }

}
