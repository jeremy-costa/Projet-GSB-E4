@extends('layouts.master')
@section('content')
<div>
    <br> <br>
    <br> <br>
    @if ($lesChaussures != null)
    <div class="container">    
        <div class="blanc">
            <h1>Recapitulatif de la commande : {{$idCmde}} </h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
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
                    <th>Total</th>
                 
                </tr>
               
                
            </thead>
          
                </tr>
            </thead>
  
 {!! Form::open(['url' => 'validercommande']) !!}     
 
  
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
                <td > <img src="../resources/images/{{$uneChaussure->IMAGE }}"</img></td>
               <td> {{ $uneChaussure->PRIXCH}}€</td>
               
            <td>  {{$uneChaussure->QTECOMMANDE }}</td>
             <td> {{ $uneChaussure->PRIXCH * $uneChaussure->QTECOMMANDE}}€</td>
             
              
            
            @endforeach
            
            <td>{{$total}} €</td>
            <input type='hidden' name='total' value="{{$total}}">
            </tr>
            <BR> <BR>
        </table>
       
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> valider la commande</button>
            </div>
        </div>
        </div>
        
    </div>
    @endif
    {{$error}}
 {!! Form::close() !!}
</div>

@stop
