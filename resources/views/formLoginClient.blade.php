@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2">

    <br><br>
    <body>
        {!! Form::open(['url' => 'loginClient']) !!}

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Se connecter</h3>
                            </div>
                            <div class="panel-body">


                                <div class="form-group">
                                    <input class="form-control col-md-11" placeholder="Login" name="login" type="text" required>

                                </div>
                                <div class="form-group">
                                    <input class="form-control col-md-11" placeholder="Mot de passe" name="mdp" type="password" required>
                                </div>
                                @if ( $erreur != null)
                                <p>{{ $erreur }}</p>
                                @endif
                                <br/>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Se connecter">




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



