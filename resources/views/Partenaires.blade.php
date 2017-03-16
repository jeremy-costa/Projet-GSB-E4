@extends('layouts.master')
@section('content')
<!Doctype html>
<html class="body2">  
    <head>
        <meta name="viewport" content="width=device-width">
        <?php $ua = $_SERVER['HTTP_USER_AGENT'] ?>
    </head>
    <body>
        <div class="container_contenu">
            <div class="col-md-12 container_presentation"> 
                <div class="col-md-12">
                    <center> <h2 class="col-md-12">Nos partenaires</h2></center>
                    <div class="col-md-12"><br/></div>
                    <a href="http://www.scf75.fr/"> <div class="col-md-3">
                            <p class="col-md-12"><center><span>Saphir Connexion France</span></center><br/>
                            <img class="col-md-10 col-md-offset-1 image_partenaires col-xs-12" src="{{asset('local/assets/img/saphirconnexion.png')}}"title="Saphir Connexion France">
                        </div> 
                    </a>
                    <a href="http://at-opensite.fr/"><div class="col-md-3">
                            <p class="col-md-12"><center><span>AT-OPENSITE</span></center><br/>
                            <img class="col-md-10 col-md-offset-1 image_partenaires col-xs-12" src="{{asset('local/assets/img/at-opensite.jpg')}}"title="AT-OPENSITE">

                        </div>
                    </a>

                    <a href="http://pharefm.com/"><div class="col-md-3">
                            <p class="col-md-12"><center><span>Phare FM - La radio autrement - 107.0</span></center><br/>
                            <img class="col-md-10 col-md-offset-1 image_partenaires col-xs-12" src="{{asset('local/assets/img/pharefm.jpg')}}"title="Phare FM - La radio autrement - 107.0">

                        </div>
                    </a>

                    <a href="http://www.fastncast.com/"><div class="col-md-3">
                            <p class="col-md-12"><center><span>FASTNCAST - Développement internet</span></center><br/>
                            <img class="col-md-10 col-md-offset-1 image_partenaires col-xs-12" src="{{asset('local/assets/img/fastcast.jpg')}}"title="FASTNCAST - Développement internet">

                        </div>
                    </a>
                </div>
                <div class="col-md-12">

                    <a href="https://www.repfone.fr/"><div class="col-md-3 ">
                            <p class="col-md-12"><center><span>Repfone</span></center><br/>
                            <img class="col-md-10 col-md-offset-1 image_partenaires col-xs-12" src="{{asset('local/assets/img/repfone.png')}}"title="Repfone">

                        </div>
                    </a>
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