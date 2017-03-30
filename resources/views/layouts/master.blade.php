<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('local/assets/css/bootstrap.css') !!}

        {!! Html::style('local/assets/css/gsb.css') !!}
        {!! Html::style('local/assets/css/full-slider.css') !!}
        {!! Html::script('local/assets/js/bootstrap.min.js') !!}
        {!! Html::script('local/assets/js/jquery.js')  !!}  
        {!! Html::script('local/assets/js/bootstrap.js')  !!}


        
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
                                <li><a href="{{url('/')}}">Accueil</a></li>
                    @if (Session::get('nom_visiteur')!=null)
                               <li><a href="{{url('/Rechercher')}}">Recherche</a></li>
                             <li id="li_menu">
                                     
                                  <div class="prestation_on"><a>{{ Session::get('nom_visiteur')}} &nabla; </a></div>
                                  <div class="prestation_off"><a>{{ Session::get('nom_visiteur')}} &Delta;</a></div>
                                  <ul id="menu-vertical">
                                        
                                          <li><a href="{{url('/getLogout')}}">Se déconnecter</a></li>
                                      
                                  </ul>
                             </li>
                             @endif
                             
                                
                    @if (Session::get('nom_visiteur')== null)
                                <li><a data-toggle="modal" data-target="#myModal">Connexion </li>
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
       
        <!-- Modal -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">


                {!! Form::open(['url' => 'login']) !!}


                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 ">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Se connecter</h3>
                                </div>
                                <div class="panel-body">


                                    <div class="form-group">
                                        <input class="form-control col-md-11" placeholder="Login" name="login" type="text" required>

                                    </div>
                                    <div class="form-group">
                                        <input class="form-control col-md-11" placeholder="Mot de passe" name="pwd" type="password" required>
                                    </div>

                                    @if (isset($erreur))
                                    <p>{{ $erreur }}</p>
                                    @endif
                                    <br/>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Se connecter">




                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

                <div class="modal-body ">

                </div>
                <div class="modal-footer">

                </div>

            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div class="contenu">

            @yield('content')
        </div>
    </div>






</body></html>
