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
            <h1>Anciennes commandes</h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date commande</th>
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
  
  
                </tr>
               
                
            </thead>
       
  
    <input type='hidden' name='idCli' value="{{$idCli}}">
    
            @foreach($lesChaussures as $uneChaussure)
            <tr>   
                <td>{{ $uneChaussure->DATECMDE }}
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
                <td > <img src="../resources/images/{{$uneChaussure->IMAGE }}"</img></td>
               
                <td> {{ $uneChaussure->PRIXCH }}€</td>
                <td>{{$uneChaussure->QTECOMMANDE }} </td>
                 
                  <td> {{ $uneChaussure->PRIXCH * $uneChaussure->QTECOMMANDE}}€</td>
                   
                </a></td>
              
            
            @endforeach
            
             </tr>
             
                 
               
            <BR> <BR>
        </table>
          <a href="{{url( '/getProfil/'.Session::get('id')) }}"data-original-title="Annuler" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-off"> Annuler</i></a>    
    
    </div>
    @endif
    {{$error}}
   
</div>
{!! Form::close() !!}
@stop

    </body>
</html>

