<?php

namespace App\metier;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Session;

class rw_suivi extends Model {

    protected $table = 'rw_suivi';
    public $timestamps = false;
    protected $fillable = [
        'rowid',
        'ip_utilisateur',
        'pageVisitee',
        'Date',
    ];

    public function updateSuivi($ip, $Page, $Date) {

        $existe = DB::table('rw_suivi')->select('ip_utilisateur')
                ->where('pageVisitee', '=', $Page)
                ->where('Date', '=', $Date)
                ->where('ip_utilisateur', '=', $ip)
                ->first();

        if ($existe == null) {

            DB::table('rw_suivi')->insert(['ip_utilisateur' => $ip, 'pageVisitee' => $Page, 'Date' => $Date]);
        }
    }

    public function getLesStats() {
        $results = DB::select('select DISTINCT pageVisitee, year(Date) annee, month(Date) mois, count(pageVisitee) as nbvisite from rw_suivi group by pageVisitee, annee,mois ');



        return $results;
    }

    public function getLesAnnéesMois() {
        $AnneesMois = DB::select('SELECT distinct year(DATE)annee, month(DATE)mois FROM rw_suivi');
        return $AnneesMois;
    }

    public function getLesStatsAnnéeMois($annee, $mois) {
        $AnneesMois = DB::select('select DISTINCT pageVisitee, year(Date) annee, month(Date) mois, count(pageVisitee) as nbvisite from rw_suivi
        where year(Date) = ? and month(Date) = ?
        group by pageVisitee, annee, mois', array( $annee, $mois));
          return $AnneesMois;
    }
  

}
