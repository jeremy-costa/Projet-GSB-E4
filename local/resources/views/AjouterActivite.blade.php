@extends('layouts.master')
@section('content')
<!Doctype html>
<html lang="fr">

    <head>
        <meta name="viewport" content="width=device-width"/>
    </head>
    <h1>Ajout d'une activité</h1>
 <div class="form-horizontal col-md-12">   
                <div class="col-md-12">
                    <label class="col-md-3 control-label"><i class="glyphicon glyphicon-tag"> </i> Nom : </label>   
                    <div class="col-md-6">
                        <input type="text" name="nom" class="form-control" placeholder="Votre Nom" required autofocus>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-3 control-label"><i class="glyphicon glyphicon-tag"> </i> Prénom : </label>
                    <div class="col-md-6">
                        <input type="text" name="prenom" class="form-control" placeholder="Votre Prénom" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-3 control-label"><i class="glyphicon glyphicon-home"> </i> Adresse : </label>
                    <div class="col-md-6">
                        <input type="text" name="adr" class="form-control" placeholder="Votre adresse" required>
                    </div>
                </div>
                <div class="col-md-12 ">

                    <label class="col-md-3 control-label "> <i class="glyphicon glyphicon-earphone"> </i> Téléphone :</label>
                    <div class="col-md-6">
                        <input type="tel" name="tel" class="form-control" placeholder="Votre téléphone">
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-3 control-label"><i class= "glyphicon glyphicon-user"> </i> Identifiant : </label>
                    <div class="col-md-6">
                        <input type="text" name="login" class="form-control" placeholder="Votre identifiant" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-3 control-label"><i class= "glyphicon glyphicon-eye-close"> </i> Mot de passe : </label>
                    <div class="col-md-6">
                        <input type="password" name="pwd" class="form-control" placeholder="Votre mot de passe" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-3 control-label"><i class="glyphicon glyphicon-envelope"> </i> Adresse e-mail : </label>
                    <div class="col-md-6">
                        <input type="email" name="mail" class="form-control" placeholder="Votre adresse e-mail" required>
                    </div>
                </div>

    <input class="btn btn-lg btn-success btn-block" type="submit" value="Ajouter">

</html>

@stop
