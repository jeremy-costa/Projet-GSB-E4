@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2">
    <head>
        <script>
        $(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});
</script>
    </head>

    <br><br>

    {!! Form::open(['url' => 'Rechercher']) !!}
<div class="container_contenu">
            <div class="col-md-12 container_presentation"> 

   <div class="container">
    <div class="row">    
        <div class="col-xs-8 col-xs-offset-2">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter par :</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#Par_Nom">Par nom</a></li>
                      <li><a href="#Par_laboratoire">Par laboratoire</a></li>
                     
                    </ul>
                </div>
                    
                <input type="text" class="form-control" name="x" placeholder="Entrez votre recherche">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
	</div>
</div>

            </div>
</div>
    {!! Form::close() !!}



</body>






</html>

@stop
