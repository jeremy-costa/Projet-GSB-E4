@extends('layouts.master')
@section('content')
<div>
        <br> <br>
        <br> <br>
        <div class="container">
            <div class="blanc">
                <h1>Liste des chaussures</h1>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom du modèle</th>
                        <th>Marque</th>
                        <th>Prix</th>
                        <th>Type de modèle</th>
                        <th>Pour qui ?</th>
                        <th>Pour quand ?</th>
                        <th>Image</th>
                        <th>Stock </th>
                         
                    </tr>
                </thead>
                @foreach($lesChaussures as $uneChaussure)
                <tr>   
                    <td> {{ $uneChaussure->LIBELLECH }}  </td> 
                    <td> {{ $uneChaussure->NOMMARQUE }} </td>
                    <td> {{ $uneChaussure->PRIXCH }}</td>
                    <td>  
                        {{ $uneChaussure->LIBELLETYPE }}
                    </td>
                    <td>  
                        {{$uneChaussure->LIBELLECAT}}
                    </td>
                    <td> {{$uneChaussure->LIBELLESAISON }} </td>
                    <td> <img href src="resources/images/{{$uneChaussure->IMAGE }}"</img></td>
         
                    <td>  {{$uneChaussure->STOCKCH}}  </td>    
                </tr>
                @endforeach
                <BR> <BR>
            </table>
        </div>
    </div>
@stop


