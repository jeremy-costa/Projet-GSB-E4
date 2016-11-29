@extends('layouts.master')
@section('content')

<div class="col-md-12 well well-md">

    <center><h1>Authentification</h1></center>
    {!! Form::open(['url' => 'login']) !!}
    <div class="modal-body">
            @if ( $erreur != null)
            <p>{{ $erreur }}</p>
            @endif
        <div id="div-login-msg">
            
            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
            <span id="text-login-msg">Taper votre utilisateur et mot de passe</span>
        </div>
        <input name="login" class="form-control" type="text" placeholder="Utilisateur" required>
        <input name="pwd" class="form-control" type="password" placeholder="Mot de passe" required>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Se souvenir de moi
            </label>
        </div>
    </div>
    <div class="modal-footer">
        <div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
        </div>
        <div>
            <button id="login_lost_btn" type="button" class="btn btn-link">Mot de passe perdu</button>
            <button id="login_register_btn" type="button" class="btn btn-link">S'enregistrer</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
</div>
@stop


