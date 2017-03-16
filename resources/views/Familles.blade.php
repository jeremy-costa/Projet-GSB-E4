@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2"> 
    <body> 
    <head>
        <meta name="viewport" content="width=device-width"/>
    </head>
    <body>
   
        <br> <br>
        
        <div class="container_contenu">
        <div class="container">
            
           


            <div class="col-md-12">
            
                    <center>
                    @foreach($lesFamilles as $uneF)
                   
                   
                    <div class="col-md-4 col-lg-4 position_famille ">
                          <a href="{{ url('/Produits') }}/{{ $uneF->label }}">
                        <div class="col-md-7 col-lg-9 famille" >
                            <strong class="nom_famille">
                                <br>
                                {{ substr($uneF->label, 3,strlen($uneF->label)) }}
                                <br>
                            </strong>
                           
                            <img class="img_arrondie"  src="local/assets/img/{{ substr($uneF->label, 3) }}.jpg" size=portrait>  
                            <br><br>
                            <br>
                        </div>
                    </a>
                    </div>
                   
                    @endforeach
                    </center>
                    <BR> <BR>

                   

              

            </div>
        </div>
    </div>
    
   
    

</body>
</html>
@stop