<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('local/assets/css/bootstrap.css') !!}
       
        {!! Html::style('local/assets/css/Riotware.css') !!}
        {!! Html::style('local/assets/css/full-slider.css') !!}
        {!! Html::script('local/assets/js/bootstrap.min.js') !!}
        {!! Html::script('local/assets/js/jquery.js')  !!}  
        {!! Html::script('local/assets/js/bootstrap.js')  !!}
     

  <script type="text/javascript">
   $(document).ready(function(){
      $('.carousel').carousel({
         interval: 4000,
         cycle: true
      });
   });
   
</script>

        }
        <meta name="description" content="CSS only mobile fisrt navigation"> <!-- Mise en page pour mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2"/>
        <meta charset="utf-8"/>

    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <a class="position_image_mobiltec" href="{{url('/')}}">
                    <img id="img_logo" src="{{asset('local/assets/img/logo.png')}}"></a>

                <div class="container"> <!-- Bloc qui affiche la barre en haut -->


                    <div class="navbar-default navbar-static-top">
                        <div class="menu">
                            <ul class="topnav" id="myTopnav">
                               
                                <li><a href="{{url('/Rechercher')}}">Rechercher</a></li>

                             @if (Session::get('nom')== '')
                            <li><a href="{{url('/Connexion')}}">Connexion</a></li>
                            @endif
                             @if (Session::get('nom')!=null)
                            <li><a href="{{url('/getLogoutClient')}}">Se déconnecter</a></li>
                                      
                            </ul>
                             </li>
                             @endif
                            <li class="icon">
                                <a href="javascript:void(0);" onclick="myFunction()">☰</a>
                            </li>
                               


                            </ul>
                        </div>
                        

                    </div>

                </div>
            </nav>
        </div>



        <div class="contenu">

            @yield('content')
        </div>
    </div>






</body></html>
