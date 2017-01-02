@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <body class="body">
<div>
    <br> <br>
    <br> <br>
    @if ($lesChaussures != null)
    <div class="container">    
        <div class="blanc">
            <h1>Commande</h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom du modèle</th>
                    <th>Marque</th>
                    <th>Type de modèle</th>
                    <th>Pointure</th>
                    <th>Pour qui ?</th>
                    <th>Pour quand ?</th>
                    <th>Image</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Supprimer</th>
                    <th>Total</th>
                </tr>
               
                
            </thead>
    {!! Form::open(['url' => 'passercommande']) !!}      
  
    <input type='hidden' name='idCli' value="{{$idCli}}">
    
            @foreach($lesChaussures as $uneChaussure)
            <tr>   
                <td>{{ $uneChaussure->LIBELLECH }}</td> 
               
                <td>{{ $uneChaussure->NOMMARQUE }}</td>
                 

                <td>  
                    {{ $uneChaussure->LIBELLETYPE }}
                    
                </td>
                <td>
                    {{$uneChaussure->IDTAILLE}}
                      
                </td>
                
                <td>  
                    {{$uneChaussure->LIBELLECAT}}
                     
                </td>
                <td> {{$uneChaussure->LIBELLESAISON }} </td>
                <td > <img src="../../resources/images/{{$uneChaussure->IMAGE }}"</img></td>
               
                <td> {{ $uneChaussure->PRIXCH }}€</td>
                <td><a href="{{ url('/augmenterQte')}}/{{$uneChaussure->IDCH}}/{{$idCli}}/{{$uneChaussure->IDTAILLE}}" class=" glyphicon glyphicon-chevron-up" data-toggle="tooltip" data-placement="top"></a>
                    {{$uneChaussure->QTECOMMANDE }}
                    <a href="{{ url('/diminuerQte')}}/{{$uneChaussure->IDCH}}/{{$idCli}}/{{$uneChaussure->IDTAILLE}}" class=" glyphicon glyphicon-chevron-down" data-toggle="tooltip" data-placement="top" ><a></a></td>
                  <td> {{ $uneChaussure->PRIXCH * $uneChaussure->QTECOMMANDE}}€</td>
                    <td><a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/supprimerChPanier')}}/{{  $uneChaussure->IDCH }}/{{$uneChaussure->IDTAILLE}}/{{$idCli}}"
                   onclick="javascript:if (confirm('Voulez vous vraiment enlever la chaussure du panier ?'))"> 
                </a></td>
              
            
            @endforeach
            <th>{{$total}}€</th>
             <input type='hidden' name='total' value="{{$total}}">
             </tr>
                  
                 
               
            <BR> <BR>
        </table>
        @if($lesChaussures!=null)
         <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Passer la commande</button>
            </div>
        </div>
        @endif
    </div>
    @endif
    {{$error}}
   
</div>
{!! Form::close() !!}
@stop

    </body>
</html>

