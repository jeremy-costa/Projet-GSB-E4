<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class rw_user extends Model {

    protected $table = 'rw_user';

    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'login',
        'mdp'
   
        
        ];
    
    
     public function login($login, $pwd) {
        $connected = false;
        $admin = DB::table('rw_user')
                ->select()
                ->where('login', '=', $login)
                ->first();
        if ($admin) {
            if ($admin->mdp == $pwd) {
                Session::put('id', $admin->rowid);
                $connected = true;
            }
        }
        return $connected;
    }

    //Dialogue avec la bdd pour déconnecter un utilisateur
    public function logout() {
        Session::put('id', 0);
    }
}