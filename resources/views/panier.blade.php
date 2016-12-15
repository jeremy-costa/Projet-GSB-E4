@extends('layouts.master')
@section('content')
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
                    <th>Pour qui ?</th>
                    <th>Pour quand ?</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            @foreach($lesChaussures as $uneChaussure)
            <tr>   
                <td> {{ $uneChaussure->LIBELLECH }}  </td> 
                <td> {{ $uneChaussure->NOMMARQUE }} </td>

                <td>  
                    {{ $uneChaussure->LIBELLETYPE }}
                </td>
                <td>  
                    {{$uneChaussure->LIBELLECAT}}
                </td>
                <td> {{$uneChaussure->LIBELLESAISON }} </td>
                <td > <img src="../resources/images/{{$uneChaussure->IMAGE }}"</img></td>
                <td> {{ $uneChaussure->PRIXCH }}</td>
                <td><a href="{{ url('/augmenterQte')}}/{{$uneChaussure->IDCH}}/{{$id}}" class=" glyphicon glyphicon-chevron-up" data-toggle="tooltip" data-placement="top"></a>
                    {{$uneChaussure->QTECOMMANDE }}
                    <a href="{{ url('/diminuerQte')}}/{{$uneChaussure->IDCH}}/{{$id}}" class=" glyphicon glyphicon-chevron-down" data-toggle="tooltip" data-placement="top" ><a></a></td>
                <td><a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/supprimerChPanier')}}/{{  $uneChaussure->IDCH }}/{{$uneChaussure->IDTAILLE}}/{{$id}}"
                   onclick="javascript:if (confirm('Voulez vous vraiment enlever la chaussure du panier ?'))"> 
                </a></td>
            </tr>
            @endforeach
            <BR> <BR>
        </table>
    </div>
    @endif
    {{$error}}
</div>
@stop


