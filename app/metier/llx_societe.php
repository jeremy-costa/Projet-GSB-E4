<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;

class llx_societe extends Model {

    protected $table = 'llx_societe';

    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'nom',
        'email',
        'phone',
       
        
        ];
    
    
public function getLesInfosClient($idClient)   
{  $InfosClient = DB::table('llx_societe')
                ->Select('nom','email','phone')
                ->where('rowid', '=', $idClient)
                ->first();
        return $InfosClient;
}
}
