@extends('layouts.master')
@section('content')



<center><h1>Authentification</h1></center>
<br><br>
{!! Form::open(['url' => 'login']) !!}
<div class="col-md-offset-3 col-md-12">
    @if ( $erreur != null)
    <p>{{ $erreur }}</p>
    @endif
    <div class="col-md-6">


        <input name="login" class="form-control" type="text" placeholder="Utilisateur" required>
        <input name="pwd" class="form-control" type="password" placeholder="Mot de passe" required>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Se souvenir de moi
            </label>
        </div>
    </div>  
</div>
<div class="bouton-connexion col-md-3">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Se connecter</button>
</div>
<div class="bouton-connexion-features col-md-12">
    <button <a href="{{ url('/mdpoublie')}}"  id="login_lost_btn" type="button" class="btn btn-link"</a>Mot de passe oublié</button>
    <button id="login_register_btn" type="button" class="btn btn-link">S'enregistrer</button>
</div><a href="{{ url('/mdpoublie')}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier" style="color: purple"> Modifier</span>

{!! Form::close() !!}
@stop


