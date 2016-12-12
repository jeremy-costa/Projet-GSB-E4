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
            
            @foreach($lesChaussures as $uneChaussure)
            <div class="col-md-4">
                <br>
                <div class="col-md-8">
                    
                    {{ $uneChaussure->LIBELLECH }}
                    <a href="{{ url('/chaussure') }}/{{ $uneChaussure->IDCH }}">
                    <img  src="../resources/images/{{$uneChaussure->IMAGE }}">   
                </a>
                {{ $uneChaussure->NOMMARQUE }}
                {{ $uneChaussure->PRIXCH }}
                <br>
                </div>
                
               
                <div class="col-md-offset-9">
                    @if ($uneChaussure->STOCKCH !=0)
                    
                <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top" style="color: green" </span>
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
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"> Modifier</span>
                </a>
                  <br>
                <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/supprimer')}}/{{  $uneChaussure->IDCH }}/{{ $type }}"
                   onclick="javascript:if (confirm('Suppression confirmée ?'))"> Supprimer
                </a>                  
                @endif
                @endif
                
                </div>
                </div>
                
                

                               
                </div>
                @endforeach
            
            <BR> <BR>
        </table>
        <?php echo $lesChaussures->render(); ?>
    </div>
</div>
@stop


