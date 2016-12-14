@extends('layouts.master')
@section('content')
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
                    <div class="col-md-5 col-lg-7">
                        {{$uneChaussure->NOMMARQUE}} {{$uneChaussure->PRIXCH}}<?php echo "€"; ?>
                        <br>
                    </div>
                </div>

                <div class="col-md-8 col-lg-6">
                    @if ($uneChaussure->STOCKCH !=0)

                    <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top" style="color: darkgreen" </span>
                    <?php echo "en stock"; ?>

                    @endif
                    @if ($uneChaussure->STOCKCH==0)

                    <span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="top" style="color: red"</span>
                    <?php echo "Rupture"; ?>

                    @endif
                    <br>
                    @if(isset($Client)) 
                    @if ( $Client->LVLSECURITE == 1)
                    <a href="{{ url('/modifierChaussure') }}/{{ $uneChaussure->IDCH }}/{{ $type }}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier" style="color: purple; font-style:italic; "> Modifier</span>
                    </a>
                    <br>
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" style="color: purple; font-style:italic; " href="{{ url('/supprimer')}}/{{  $uneChaussure->IDCH }}/{{ $type }}"
                       onclick="javascript:if (confirm('Suppression confirmée ?'))"> Supprimer
                    </a>                  
                    @endif
                    @endif

                </div>
            </div>
            @endforeach

            <BR> <BR>
        </table>
        <?php echo $lesChaussures->render(); ?>
    </div>
</div>
@stop


