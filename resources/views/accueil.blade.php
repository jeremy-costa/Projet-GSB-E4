@extends('layouts.master')
@section('content')
<!Doctype html>
<html lang="fr">

    <head>
        <meta name="viewport" content="width=device-width"/>
    </head>
     @if (Session::get('nom_visiteur')!=null)
    <h1>Bonjour {{ Session::get('prenom_visiteur')}} {{ Session::get('nom_visiteur')}}</h1>
    @endif
    @if (Session::get('nom_visiteur')==null)
     <h1>Bienvenue sur le site GSB-Frais</h1>
    @endif
</html>

@stop
