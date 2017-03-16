@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <head>

        <meta name="viewport" content="width=device-width"/>
        <?php $ua = $_SERVER['HTTP_USER_AGENT'] ?>

    </head>

    <body class="body">


        <div class="container_contenu">

            <div class="col-md-12 container_presentation">
                <div class="col-md-12">
                    <h1>Création de site internet vitrine</h1>
                    <h2> <strong>Envie d'un site vitrine pour votre commerce ? Vous êtes au bon endroit.</strong></h2>
                    <div class="col-md-6">
                        <p>Le site vitrine est la carte de visite virtuelle d’une entreprise. Accessible 24h/24, il permet de présenter votre société et votre activité. </p>
                        <p>   Quel que soit votre secteur d’activité, les produits ou services que vous proposez, il est devenu quasiment indispensable d'être présent sur internet.</p>
                        <p>  En effet cela permet de certifier son identité, de présenter l’ensemble des services que vous proposez mais aussi, de toucher un public beaucoup plus large. </p>

                    </div>
                    <img class="col-md-4" alt="" src="{{asset('local/assets/img/pagedev.png')}}" style=" height: 50%; float: right;">



                    <p class="col-md-12">Nous pouvons nous occuper de votre site vitrine, il suffit de nous <a href="{{url('/contact')}}">contacter</a></p>
                    

                </div>







                @if(preg_match('/iphone/i',$ua) || preg_match('/android/i',$ua) || preg_match('/blackberry/i',$ua) || preg_match('/symb/i',$ua) || preg_match('/ipad/i',$ua) || preg_match('/ipod/i',$ua) || preg_match('/phone/i',$ua) ) 
                <a href="tel:+33984040310"><img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>  </a> @else
                <img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>
                @endif 



            </div>


        </div>


    </body>
</html>

@stop