<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/chaussure.css') !!}
        {!! Html::style('assets/css/bootstrap.css') !!}
        <meta name="description" content="CSS only mobile fisrt navigation"> <!-- Mise en page pour mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta charset="utf-8"/>

    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation"> <!-- a modifier pour la mettre en responsive -->
                <div class="container"> <!-- Bloc qui affiche la barre en haute -->
                    <br>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="{{url('/')}}">
                            <img id="img_logo" src="../resources/images/copeclogo.gif" >
                            COPEC</a>
                    </div>
                    <div class="navbar-default navbar-static-top">
                        <ul class="topnav" id="myTopnav">
                            @if (Session::get('id') == 0)
                            <li><a href="{{url('/getLogin')}}">Panier</a></li>
                            <li><a href="{{url('/getLogin')}}">Connexion</a></li>
                            <li><a href="{{url('/getSubscribe')}}">Inscription</a></li>
                            @endif

                            @if (Session::get('id')> 0)
                            <li><a href="{{url('/getLogout')}}">Se déconnecter</a></li>
                            @endif

                            @if (Session::get('id')> 0)
                            <li><a href="{{url('/panier')}}/{{Session::get('id')}}">Panier</a></li>
                            @endif

                            <li><a href="{{url('/listerChaussureFemme')}}">Femme</a></li>
                            <li><a href="{{url('/listerChaussureHomme')}}">Homme</a></li>
                            <li><a href="{{url('/listerChaussureEnfant')}}">Enfant</a></li> 

                            <li class="icon">
                                <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/jquery-2.1.3.min.js')  !!}  
{!! Html::script('assets/js/ui-bootstrap-tpls.js')  !!}
{!! Html::script('assets/js/bootstrap.js')  !!}

