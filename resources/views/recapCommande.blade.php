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
            <h1>Recapitulatif de la commande : </h1>
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
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Montant total :</th>
          
                </tr>
            </thead>
  
   
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
                <td > <img src="../resources/images/{{$uneChaussure->IMAGE }}"</img></td>
               <td> {{ $uneChaussure->PRIXCH * $uneChaussure->QTECOMMANDE}}</td>
               
            <td>  {{$uneChaussure->QTECOMMANDE }}</td>
               
              
            </tr>
            @endforeach
            
            <BR> <BR>
        </table>
       
        </div>
        
    </div>
    @endif
    {{$error}}
 
</div>

@stop
</body>
</html>
