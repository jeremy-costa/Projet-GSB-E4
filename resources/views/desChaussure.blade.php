@extends('layouts.master')
@section('content')
<div>
    <br> <br>
    <br> <br>
    <div class="container">
        <div class="blanc">
            <br><br>
        </div>


        <div class="col-md-4">
            <div class="col-md-8">
                {{ $uneChaussure->LIBELLECH }}
                <a href="{{ url('/chaussure') }}/{{ $uneChaussure->IDCH }}">
                    <img  src="../../resources/images/{{$uneChaussure->IMAGE }}"</img>   
                </a>
                {{ $uneChaussure->NOMMARQUE }}
                {{ $uneChaussure->PRIXCH }}
                <br>
                @if(isset($Client)) 
                @if ( $Client->LVLSECURITE == 1)
                <a href="{{ url('/modifierChaussure') }}/{{ $uneChaussure->IDCH }}/{{ $type }}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"> Modifier</span></a>
                <br>
                <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/supprimer')}}/{{  $uneChaussure->IDCH }}/{{ $type }}"
                   onclick="javascript:if (confirm('Suppression confirmée ?'))"> Supprimer
                </a>                  
                @endif
                @endif
            </div>


            <div class="col-md-4">
                @if ($uneChaussure->STOCKCH !=0)
                <?php echo " en stock "; ?>
                <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top"> </span>
                @endif
                @if ($uneChaussure->STOCKCH==0)
                <?php echo " Rupture "; ?>
                <span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="top"> </span>
                @endif

            </div>


        </div>
        <BR> <BR>
        {!! Form::open(['url' => '/ajouterPanier']) !!}
        <select class='form-control' name='cbPointures' required>
            <OPTION VALUE=0>Sélectionner une Taille</option>
            @foreach ($lesPointures as $uneP)
            {
            <OPTION VALUE=' {{ $uneP->IDTAILLE }}'> {{ $uneP->IDTAILLE }}</OPTION>
            }
            @endforeach
        </select>
        <button type="submit" class="btn btn-success">Ajouter au panier</button>
        {!! Form::close() !!}


        <BR> <BR>



        <BR> <BR>
    </div>
</div>
@stop




