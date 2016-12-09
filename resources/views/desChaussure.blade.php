@extends('layouts.master')
@section('content')
<div>
    <br> <br>
    <br> <br>
    <div class="container">
        <div class="blanc">
            <br><br>
        </div>
        <table class="table table-bordered table-striped">          

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
                    <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top"> </span>
                </div>      
                <a href="{{ url('/ajouterPanier') }}/{{ $uneChaussure->IDCH }}" type="button" class="btn btn-success">Ajouter au panier :)</a>
            </div>

            <BR> <BR>
        </table>
    </div>
</div>
@stop




