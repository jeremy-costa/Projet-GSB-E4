@extends('layouts.master')
@section('content')

<div class="col-md-12 well well-md">
    
    <center><h1>Inscription</h1></center>
    <br><br>
    {!! Form::open(['url' => 'subscribe']) !!}
    <div class="form-horizontal">   
        <div class="form-group">
            <label class="col-md-3 control-label">Nom : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="nom" class="form-control" placeholder="Votre Nom" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Prénom : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="prenom" class="form-control" placeholder="Votre Prénom" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse : </label>
            <div class="col-md-6 col-md-3">
                <input type="text" name="adr" class="form-control" placeholder="Votre adresse" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Téléphone : </label>
            <div class="col-md-6 col-md-3">
                <input type="tel" name="tel" class="form-control" placeholder="Votre téléphone">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Identifiant : </label>
            <div class="col-md-6  col-md-3">
                <input type="text" name="login" class="form-control" placeholder="Votre identifiant" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mot de passe : </label>
            <div class="col-md-6 col-md-3">
                <input type="password" name="pwd" class="form-control" placeholder="Votre mot de passe" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse e-mail : </label>
            <div class="col-md-6 col-md-3">
                <input type="email" name="mail" class="form-control" placeholder="Votre adresse e-mail" required>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
            
        </div>
    </div>
    {!! Form::close() !!}
</div>
@stop


