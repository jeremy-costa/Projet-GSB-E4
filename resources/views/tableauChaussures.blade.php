@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <body onload="checkEmptyTrier()"> 
    <head>
        <meta name="viewport" content="width=device-width"/>
    </head>

    <div>
        <br> <br>
        <div class="container">
            <div class="blanc">
                <h1>Chaussures pour {{$type}}</h1>
                <br><br>
            </div>

            {!! Form::open(['url' => '/getChaussureCondition']) !!}

            <div class="col-md-6 col-lg-11">
                <select class='form-control col-sm-1' name='cbCouleurs' id="couleur" onclick="checkEmptyTrier()" >
                    <OPTION VALUE=0>Couleurs</option>
                    @foreach ($lesCouleurs as $uneC)
                    {
                    <OPTION VALUE='{{ $uneC->COULEURCH }}'> {{ $uneC->COULEURCH}}</OPTION>
                    }
                    @endforeach
                </select>

                <select class='form-control col-sm-1'  name='cbType' id="type" onclick="checkEmptyTrier()">
                    <OPTION VALUE=0>Type</option>
                    @foreach ($lesTypes as $unT)
                    {
                    <OPTION VALUE='{{ $unT->IDTYPE }}'> {{ $unT->LIBELLETYPE}}</OPTION>
                    }
                    @endforeach
                </select>

                <select class='form-control col-sm-1' name='cbSaison' id="saison" onclick="checkEmptyTrier()">
                    <OPTION VALUE=0>Saison</option>
                    @foreach ($lesSaisons as $uneS)
                    {
                    <OPTION VALUE='{{ $uneS->IDSAISON }}'> {{ $uneS->LIBELLESAISON}}</OPTION>
                    }
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-lg-12">
                <input name="type"  type="hidden" value="{{$type}}">
                <button id = "trier" data-toggle="tooltip" type="submit" class="btn btn-md btn-warning"><i class="glyphicon glyphicon-sort"></i> Filtrer</button>
                {!! Form::close() !!}
                @if(isset($Client)) 
                @if ( $Client->LVLSECURITE == 1)   
                <a href="{{url('/ajoutChaussure')}}" data-original-title="Se deconnecter" data-toggle="tooltip" type="button" class="btn btn-md btn-warning"><i class="glyphicon glyphicon-plus"> Ajouter</i></a>
                @endif
                @endif
            </div>




            <div class="col-md-12">
                <table class="table table-bordered table-striped">

                    @foreach($lesChaussures as $uneChaussure)
                    <div class="col-md-4 col-lg-4">
                        <div class="col-md-7 col-lg-9" >
                            <strong>
                                <br>
                                {{ $uneChaussure->LIBELLECH }}
                                <br>
                            </strong>
                            <a href="{{ url('/chaussure') }}/{{ $uneChaussure->IDCH }}">
                                <img  src="../resources/images/{{$uneChaussure->IMAGE }}" size=portrait>  
                            </a>
                            <br><br>

                            {{$uneChaussure->NOMMARQUE}} {{$uneChaussure->PRIXCH}}<?php echo "€"; ?>
                            <br>

                        </div>

                        <div class="col-md-7 col-lg-9">
                            @if ($uneChaussure->STOCKCH !=0)

                            <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top" style="color: green" </span>
                            En stock

                            @endif
                            @if ($uneChaussure->STOCKCH==0)

                            <span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="top" style="color: red"</span>
                            Rupture

                            @endif
                            <br>
                            @if(isset($Client)) 
                            @if ( $Client->LVLSECURITE == 1)
                            <a href="{{ url('/modifierChaussure') }}/{{ $uneChaussure->IDCH }}/{{ $type }}">
                                <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier" style="color: purple"> Modifier</span>
                            </a>
                            <br>
                            <a class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer" style="color: purple" href="{{ url('/supprimer')}}/{{  $uneChaussure->IDCH }}/{{ $type }}"
                               onclick="javascript:if (confirm('Suppression confirmée ?'))"> Supprimer
                            </a>                  
                            @endif
                            @endif

                        </div>
                    </div>
                    @endforeach
                    <BR> <BR>

                    @if ($idpage==1)
                    {{ $lesChaussures->render() }}
                    @endif

                </table>

            </div>
        </div>
    </div>
    @stop


</body>
</html>
