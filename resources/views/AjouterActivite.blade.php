@extends('layouts.master')
@section('content')
<!Doctype html>
<html lang="fr">

    <head>
        <meta name="viewport" content="width=device-width"/>
    </head>
    <h1 class="col-md-12">Ajout d'une activité pour {{$prenom_visiteur}} {{$nom_visiteur}}</h1>
  {!! Form::open(['url' => 'ajoutActivite']) !!}
      <input type='hidden' name='id_visiteur' value="{{$id_visiteur}} ">
    <input type='hidden' name='prenom_visiteur' value="{{$prenom_visiteur}} ">
    <input type='hidden' name='nom_visiteur' value="{{$nom_visiteur}} ">
      <div class="form-horizontal col-md-12">   
                <div class="col-md-12">
                    <label class="col-md-6 positionEcran control-label"><i class="glyphicon glyphicon-bookmark"> </i> Thème : </label>   
                    <div class="col-md-6">
                        <input type="text" name="theme" class="form-control positionText" placeholder="Thème" required autofocus>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-6 positionEcran control-label"><i class="glyphicon glyphicon-tag"> </i> Motif : </label>
                    <div class="col-md-6">
                        <input type="text" name="motif" class="form-control positionText" placeholder="Motif" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-6 positionEcran control-label"><i class="glyphicon glyphicon-calendar"> </i> Date : </label>
                    <div class="col-md-6">
                        <input type="text" name="date" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" class="form-control positionText" placeholder="DD/MM/YYYY" required>
                    </div>
                </div>
                <div class="col-md-12 ">

                    <label class="col-md-6 positionEcran control-label "> <i class="glyphicon glyphicon-map-marker"> </i> Lieu :</label>
                    <div class="col-md-6">
                        <input type="tel" name="lieu" class="form-control positionText" placeholder="Lieu">
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="col-md-6 positionEcran control-label"><i class= " glyphicon glyphicon-euro"> </i> Montant : </label>
                    <div class="col-md-6">
                        <input type="text" name="montant" class="form-control positionText" placeholder="Montant" required><br/><br/>
                    </div>
                   
                </div> 
 </div>
   <input class="btn btn-lg btn-success btn-block" type="submit" value="Ajouter">
 <a href="{{ url('/')}}" data-original-title="Annuler" type="submit" class="btn btn-lg btn-danger btn-block"><i>Retour</i></a>
     {!! Form::close() !!}
   
</html>

@stop
