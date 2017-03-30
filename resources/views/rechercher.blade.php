@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2">
    <head>

    </head>

    <br><br>

    {!! Form::open(['url' => 'Rechercher']) !!}
    <div class="container_contenu">
        <div class="col-md-12 container_presentation"> 

            <div class="container">
                <div class="row">    
                    <div class="col-xs-8 col-xs-offset-2">
                       
                        <div class="col-md-12">
                        <div class="input-group col-md-12">
                            <div class="col-md-2 ">
                                <SELECT name="typeRecherche" onclick="checkEmpty();"> 
                                <OPTION VALUE=0>Filtrer par :</option>
                                <OPTION VALUE='nom'> Nom</option>
                                <OPTION VALUE='laboratoire'>Laboratoire </option>
                              
                               </SELECT>

                            </div>
                            <div class="col-md-9">
                            <input type="text" class="form-control col-md-10" name="recherche" placeholder="Entrez votre recherche ">
                            <span class="input-group-btn">
                                <button class="btn btn-default col-md-2" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                            </div>
                        </div>
                        </div>
                        {{$erreur}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}



</body>






</html>

@stop
