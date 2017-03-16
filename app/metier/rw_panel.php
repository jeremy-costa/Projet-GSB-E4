<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class rw_panel extends Model {

    protected $table = 'rw_panel';

    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'image',
        'texte',
        'numeroImage',
        ];


public function getLesImagesTextes($num){
        $lesImagesTextes = DB::table('rw_panel')
                
                ->Select('rowid','image','texte','active','numeroImage')
                ->where('numeroImage','=',$num)
             
                ->first();
                                                                          
        return $lesImagesTextes;  
}



public function updateImageCaroussel($couverture,$texte,$active, $numero){
    DB::table('rw_panel')->where('numeroImage', $numero)
                ->update(['image' => $couverture, 'texte' => $texte, 'active' => $active]);
}

}