<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/chaussure.css') !!}
        {!! Html::style('assets/css/bootstrap.css') !!}
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale)1, user-scalable=no"/>
        <meta charset="utf-8"/>
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>

                        <a class="navbar-brand" href="{{url('/')}}">
                            <img id="img_logo" src="../resources/images/copeclogo.gif">
                            COPEC</a>
                    </div>
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="{{url('/listerChaussureFemme')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Femme</a></li>
                        <li><a href="{{url('/listerChaussureHomme')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Homme</a></li>
                        <li><a href="{{url('/listerChaussureEnfant')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Enfant</a></li> 
                    </ul>
                    @if (Session::get('id') == 0)
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav navbar-right">  

                            <li><a href="{{url('/getLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Connexion</a></li>
                            <li><a href="{{url('/getSubscribe')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Inscription</a></li>
                        </ul> 
                    </div>
                    @endif

                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav navbar-right">  
                            <li>
                                @if (Session::get('id') == 0)
                                <a href="{{url('/getLogin')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Panier</a></li>
                            @endif
                            @if (Session::get('id')> 0)
                            <a href="{{url('/panier')}}/{{Session::get('id')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Panier</a></li>
                            @endif

                            @if (Session::get('id')> 0)
                            <li><a href="{{url('/getLogout')}}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                            @endif
                        </ul> 
                    </div> 

                </div><!--/.container-fluid -->
            </nav>
        </div> 
        <div class="container">
            @yield('content')
        </div>
        {!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/jquery-2.1.3.min.js')  !!}  
        {!! Html::script('assets/js/ui-bootstrap-tpls.js')  !!}
        {!! Html::script('assets/js/bootstrap.js')  !!}
    </body>
</html>
