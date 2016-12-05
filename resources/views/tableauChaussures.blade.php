@extends('layouts.master')
@section('content')
<div>
    <br> <br>
    <br> <br>
    <div class="container">
        <div class="blanc">
            <h1>Chaussures pour {{$type}}</h1>
            <br><br>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>


                    @if(isset($Client))     
                    @if ( $Client->LVLSECURITE == 1)
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    @endif
                    @endif

                </tr>
            </thead>
            @foreach($lesChaussures as $uneChaussure)
            <div class="col-md-4">
            {{ $uneChaussure->LIBELLECH }}
            {{ $uneChaussure->NOMMARQUE }}
            {{ $uneChaussure->PRIXCH }}

            <img src="../resources/images/{{$uneChaussure->IMAGE }}"</img>

            @if ($uneChaussure->STOCKCH !=0)

            <?php echo " en stock "; ?>
            <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top" </span>


            @endif
            @if ($uneChaussure->STOCKCH==0)
            <?php echo " Rupture "; ?>
            <span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="top" </span>

            @endif
</div>
            @if(isset($Client)) 
            @if ( $Client->LVLSECURITE == 1)
            <td style="text-align:center;"><a href="{{ url('/modifierChaussure') }}/{{ $uneChaussure->IDCH }}/{{ $type }}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a></td>
            <td style="text-align:center;">
                <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/supprimer')}}/{{  $uneChaussure->IDCH }}/{{ $type }}"
                   onclick="javascript:if (confirm('Suppression confirmée ?'))">
                </a>
            </td>                     
            @endif
            @endif
            </tr>
            @endforeach
            
            <BR> <BR>
        </table>
        <?php echo $lesChaussures->render(); ?>
    </div>
</div>
@stop


