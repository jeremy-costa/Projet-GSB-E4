<?php

namespace App\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Type extends Model{
    protected $table = 'Type';
    protected $primaryKey = 'idType';
    public $timestamps = false;
    protected $fillable = [
         'idType',
        'libelleType',
    ];
    
    public function __construct(){
        $this->id_marque= 0;
    }
    
    public function getListeTypes(){
        $query = DB::table('Type')
                ->get();
        return $query;       
    }
    
    public function getidType(){
        return $this->getKey();
    }
    
    public function getType($id){
        $query = DB::table('Type')
                ->select()
                ->where('idType', '=', $id)
                -> first();
        return $query;
    }
}