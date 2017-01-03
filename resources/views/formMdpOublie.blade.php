@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <body class="body">
    <center><h1>Envoyez-moi mon mot de passe</h1></center>
    <br><br>
    {!! Form::open(['url' => 'mdp']) !!}
    <div class="col-md-offset-3 col-md-12">
        @if ( $erreur != null)
        <p>{{ $erreur }}</p>
        @endif
        <div class="col-md-6">


            <input name="login" class="form-control" type="text" placeholder="Utilisateur" required>
            <input name="email" class="form-control" type="text" placeholder="Adresse email" required>

        </div>  
    </div>
    <div class="bouton-connexion col-md-3">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Envoyer</button>
    </div>


    {!! Form::close() !!}
    @stop

</body>
</html>

