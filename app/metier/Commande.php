<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Commande extends Model {

    protected $table = 'Commande';
    public $timestamps = false;
    protected $fillable = [
        'idCmde',
        'idCli',
        'dateCmde',
    ];

    public function __construct() {
        $this->idCmde = 0;
    }

    public function getCommande() {
        return $this->getKey();
    }

    public function getUneCommande($id) {
        $commande = DB::table('commande')
                ->select('IDCMDE')
                ->where('IDCLI', '=', $id)
                ->get();
        return $commande;
    }

}
