@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2">
    <head>

    </head>
    <body class="body">


  {!! Form::open(['url' => 'Rechercher']) !!}

        <div class="container">



            <h1>Activites complementaires de {{$nom_visiteur}}</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Theme</th>
                        <th>Motif</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Montant</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>


                    </tr>


                </thead>






                @foreach($lesActivites as $unA)

                <tr>   
                    <td>{{ $unA->theme_activite }}</td> 

                    <td>{{ $unA->motif_activite }}</td>


                    <td>  
                        {{ $unA->date_activite }}

                    </td>
                    <td>
                        {{ $unA->lieu_activite}}

                    </td>
                    <td>
                        {{ $unA->montant_ac}}

                    </td>

                    <td>  

                        <a class="glyphicon glyphicon-pencil" href="{{ url('/ModifierActivite')}}"</a>
                    </td>
                    <td>
                       <a class="glyphicon glyphicon-trash" href="{{ url('/SupprimerActivite')}}/{{$unA->id_activite_compl}}/{{$nom_visiteur}}"</a>
                    </td>


                </tr>
                @endforeach




                <BR> <BR>
            </table>

            
            
          <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-remove">Retour</span></button>

        </div>



    </body>
</html>
@stop

