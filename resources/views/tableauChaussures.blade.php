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
                        @if ( $Client->LVLSECURITE == 1)
                            <th>Modifier</th>
                        @endif
                        
                         
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
                    @if ( $Client->LVLSECURITE == 1)
                    <td style="text-align:center;"><a href="{{ url('/modifierManga') }}">
                              <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a></td>
                              @endif
                </tr>
                @endforeach
                <BR> <BR>
            </table>
        </div>
    </div>
@stop


