<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pointure extends Model {

    protected $table = 'pointure';
    protected $primaryKey = 'idCh';
    public $timestamps = false;
    protected $fillable = [
        'idCh',
        'idTaille',
        'QteStock',
    ];

    public function __construct() {
        $this->idCh = 0;
    }

    //Dialogue aves la bdd pour récupérer une pointure
    public function getPointure($id) {
        $query = DB::table('pointure')
                ->Select('IDTAILLE')
                ->where('IDCH', '=', $id)
                ->get();
        return $query;
    }

}
