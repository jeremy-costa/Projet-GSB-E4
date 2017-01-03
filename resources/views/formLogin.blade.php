@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <h1>Authentification</h1>
    <br><br>
    {!! Form::open(['url' => 'login']) !!}
    <body class="body">
        <div class="col-md-8 col-md-offset-2">
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
        </div></body>
    <div class="col-md-4 col-md-offset-2">
        <button type="submit" class="btn btn-default btn-primary">Se connecter</button>
    </div>
    <div class="col-md-4 col-md-offset-2">
       
        <br/><a href="{{ url('/mdpoublie') }}" data-toggle="tooltip" type="button">Mot de passe oublié</a>
          <br/>  <a href="{{ url('/getSubscribe') }}" data-toggle="tooltip" type="button">S'inscrire</a>
       
    </div>
        <br />
    <br />
    {!! Form::close() !!}
    @stop

</html>

