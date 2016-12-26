@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <body class="body">
        <h1>Authentification</h1>
        <br><br>
        {!! Form::open(['url' => 'login']) !!}
        <div class="col-md-offset-3 col-md-9">
            @if ( $erreur != null)
            <p>{{ $erreur }}</p>
            @endif
            <div class="col-md-6">
                <center>
                <input name="login" class="form-control" type="text" placeholder=" Utilisateur" required>
                <input name="pwd" class="form-control" type="password" placeholder=" Mot de passe" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Se souvenir de moi
                    </label>
                </div>
                </center>
            </div>  
        </div>
        <div class="bouton-connexion col-md-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Se connecter</button>
        </div>
        <div class="bouton-connexion-features col-md-3">
            <br/><a href="{{ url('/mdpoublie')}}" data-toggle="tooltip" data-placement="top" title="Modifier" style="color: purple"</a>Mot de passe oublié
            <br/><a href="{{url('/getSubscribe')}}" data-toggle="tooltip" data-placement="top" title="Enregistrement" style="color: purple"</a>S'enregistrer
        </div>
        {!! Form::close() !!}
        @stop
    </body>
</html>

