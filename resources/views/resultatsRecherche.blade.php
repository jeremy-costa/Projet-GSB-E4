@extends('layouts.master')
@section('content')
<!doctype html>

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

                
            </table>

            
            
            <a href="{{ url('/Rechercher')}}" data-original-title="Annuler" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-off">Retour</i></a>

        </div>




@stop

