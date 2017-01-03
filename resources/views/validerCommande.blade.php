<!--page de transition après avoir valider sa commande.-->
@extends('layouts.master')
@section('content')

<div>
    <h1 class="bvn">Nous vous remercions.</h1>
    
    <p>Un Mail récaputulatif de votre commande vous a été envoyé.
        Vous allez être redirigé automatiquement sur la page d'accueil dans quelques secondes ... </p>


    <meta http-equiv="refresh" content="5;{{url('/validerMail')}}/{{$idcli}}/{{$total}}/{{$idCmde}}" />

    <img src="../resources/images/thx.jpg" width="200px" height="200px">
</div>
@stop
