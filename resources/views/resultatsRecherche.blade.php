@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2">
    <head>

    </head>
    <body class="body">




        <div class="container">



            <h1 style="color:white;">Resulat de recherche</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Coordonnées</th>
                        <th>Laboratoire</th>
                        <th>Voir les activités complémentaires</th>


                    </tr>


                </thead>






                @foreach($lesVisiteurs as $unV)

                <tr>   
                    <td>{{ $unV->nom_visiteur }}</td> 

                    <td>{{ $unV->prenom_visiteur }}</td>


                    <td>  
                        {{ $unV->adresse_visiteur }}

                    </td>
                    <td>
                        {{ $unV->nom_laboratoire}}

                    </td>

                    <td>  

                        <a class="glyphicon glyphicon-list-alt" href="{{ url('/ActivitesComplementaires')}}/{{$unV->nom_visiteur}}"></a>
                    </td>


                </tr>
                @endforeach




                <BR> <BR>
            </table>


        </div>



    </body>
</html>
@stop

