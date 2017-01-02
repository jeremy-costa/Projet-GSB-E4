<!--View de transition après s'être inscrit.-->
@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <body class="body">
        <div>
            <h1 class="bvn">Bienvenue sur COPEC!</h1>

            <p>Merci de vous être inscrit sur notre site. Vous allez être redirigé automatiquement sur la page d'accueil dans quelques secondes ... 


                <meta http-equiv="refresh" content="5;{{url('/welcomeMail')}}/{{$mail}}/{{$nom}}" />

                <img src="../resources/images/thx.jpg" width="200px" height="200px">
        </div>
        @stop
    </body>
</html>
