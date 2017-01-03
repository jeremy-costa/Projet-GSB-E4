@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <body class="body">
        <div>
            <br><br>
            <br><br>
            <div class="container">
                <div class="blanc">
                    <h1>Ajout d'un Modèle</h1>
                </div>
            </div>
            {!! Form::open(array('route' => array('postajouterChaussure'), 'method' => 'post')) !!}  
            <div class='form-group'>
                <BR> <BR>
                <div class="col-md-12  col-sm-12 well well-md">
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Titre : </label> 
                        <div class='col-md-2'>
                            <input type='text' name='LIBELLECH'
                                   class='form-control' required autofocus>
                        </div>
                    </div>
                    <sub>20 caractères maximum !</sub>
                    <BR><BR>
                    <label class='col-md-3 control-label'>Catégorie : </label>
                    <div class='col-md-3'>
                        <select class='form-control' name='cbCategorie' required>
                            <OPTION VALUE=0>Sélectionner une Catégorie</option>
                            @foreach ($mesCategories as $uneC)
                            {
                            <OPTION VALUE='{{ $uneC->IDCAT }}'> {{ $uneC->LIBELLECAT }}</OPTION>
                            }
                            @endforeach
                        </select>
                    </div>
                    <BR> <BR>
                    <label class='col-md-3 control-label'>Marque : </label>
                    <div class='col-md-3'>
                        <select class='form-control' name='cbMarque' required>
                            <OPTION VALUE=0>Sélectionner une Marque</option>
                            @foreach ($mesMarques as $uneM)
                            {
                            <OPTION VALUE='{{ $uneM->IDMARQUE }}'> {{ $uneM->NOMMARQUE }}</OPTION>
                            }
                            @endforeach
                        </select>
                    </div>
                    <BR> <BR>
                    <label class='col-md-3 control-label'>Saison : </label>
                    <div class='col-md-3'>
                        <select class='form-control' name='cbSaison' required>
                            <OPTION VALUE=0>Sélectionner une Saison</option>
                            @foreach ($mesSaisons as $uneS)
                            {
                            <OPTION VALUE='{{ $uneS->IDSAISON }}'> {{ $uneS->LIBELLESAISON }}</OPTION>
                            }
                            @endforeach
                        </select>
                    </div>
                    <BR> <BR>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Matière : </label> 
                        <div class='col-md-3'>
                            <input type='text' name='MATIERECH'
                                   class='form-control' required autofocus>
                        </div>
                    </div>
                    <BR> <BR>
                    <label class='col-md-3 control-label'>Type : </label>
                    <div class='col-md-3'>
                        <select class='form-control' name='cbType' required>
                            <OPTION VALUE=0>Sélectionner un Type</option>
                            @foreach ($mesTypes as $unT)
                            {
                            <OPTION VALUE='{{ $unT->IDTYPE }}'> {{ $unT->LIBELLETYPE }}</OPTION>
                            }
                            @endforeach
                        </select>
                    </div>
                    <BR> <BR>

                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Couleur : </label> 
                        <div class='col-md-3'>
                            <input type='text' name='COULEURCH'
                                   class='form-control' required autofocus>
                        </div>
                    </div>
                    <BR><BR>
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Image : </label>
                        <div class='col-md-3'>
                            <input type='hidden' name="couverture" value=""/>
                            <input type='hidden' name="MAX_FILE_SIZE" value="204800"/>
                            <input type='file' name="couverture" class="btn btn-default pull-left"/>
                        </div>
                    </div>
                    <BR> <BR>

                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Prix : </label>
                        <div class='col-md-3'>
                            <input type='text' name='PRIXCH' class='form-control'>
                        </div>
                    </div>
                    <BR> <BR> 
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Pointures Disponibles : </label>
                        <div class='col-md-3'>
                            <input type='text' name='POINTURES'  class='form-control'>
                        </div>
                        <sub>Exemple : 42,45,38 ... (les pointures doivent être comprises entre 24 et 47 inclus !) </sub>
                    </div>
                    <BR> <BR> 
                    <div class='form-group'>
                        <label class='col-md-3 control-label'>Quantités Disponibles : </label>
                        <div class='col-md-3'>
                            <input type='text' name='QTEPOINTURES'  class='form-control'>
                        </div>
                        <sub>Exemple : 5,7,2 ... (les quantités correspondent dans l'ordre aux pointures indiquées au-dessus) </sub>
                    </div>
                    <BR> <BR> 
                    <div class="form-group">

                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <button type="submit" class="btn btn-default btn-primary">
                                <span class="glyphicon glyphicon-ok"></span> Valider
                            </button>

                            &nbsp;
                            <button type="button" class="btn btn-default btn-primary" 
                                    onclick="javascript: window.location = '{{url('/')}}';">
                                <span class="glyphicon glyphicon-remove" ></span> Annuler</button>
                        </div>           

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            @stop
    </body>
</html>


