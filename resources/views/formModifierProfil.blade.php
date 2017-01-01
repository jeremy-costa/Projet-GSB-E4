@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <body class="body">
<div class="col-md-12 well well-md">
    
    <center><h1>Modification du profil</h1></center>
    <br><br>

            {!! Form::open(['url' => 'modifierProfil']) !!}
            <div class="form-horizontal">   
                <div class="form-group">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Adresse : </label>
                        <div class="col-md-6 col-md-3">
                            <input type='text' name='adressecli' value='{{$unC->ADRESSECLI or ''}}'
                               class='form-control' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Téléphone : </label>
                        <div class="col-md-6 col-md-3">
                           <input type='tel' name='telcli' value='0{{$unC->NUMTELCLI or ''}}'
                               class='form-control' required>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mot de passe : </label>
                        <div class="col-md-6 col-md-3">
                            <input type='password' name='mdp' value='{{$unC->MDP or ''}}'
                               class='form-control' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Adresse e-mail : </label>
                        <div class="col-md-6 col-md-3">
                             <input type='text' name='mail' value='{{$unC->MAIL or ''}}'
                               class='form-control' required >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
                        </div>
                    </div>


                </div>
            </div>
             {!! Form::close() !!}
        </div>
        @stop
    </body>  
</html>