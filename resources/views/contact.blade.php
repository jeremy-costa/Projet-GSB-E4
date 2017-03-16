@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2"> 
    <head>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <?php $ua = $_SERVER['HTTP_USER_AGENT'] ?>
    </head>
    <body class="body">

        <div class="container_contenu">
            <div class="col-md-12 well well-md">


                <div class="container_presentation">
                    <div class="rw">
                        <div class="col-md-6 ">      



                            {!! Form::open(['url' => 'contactMail']) !!}

                            <div class="form-horizontal">   

                                <h2 class="col-md-offset-2 contact">Contact par mail</h2>
                                <br/>
                                <div class="col-md-12">

                                    <label class="col-md-4 control-label contact"><i class="glyphicon glyphicon-tag"> </i> Nom : </label>
                                    <div class="col-md-6">
                                        <input type='text' name='nom' placeholder="Votre nom" class='form-control col-md-11' required>
                                    </div>



                                    <label class="col-md-4 control-label contact"><i class= "glyphicon glyphicon-tag"> </i> Prénom : </label>
                                    <div class="col-md-6 ">
                                        <input type='text' name='prenom' placeholder="Votre prénom" class='col-md-11 form-control' required>
                                    </div>


                                    <label class="col-md-4 control-label contact"><i class="glyphicon glyphicon-envelope"> </i> Adresse e-mail : </label>
                                    <div class="col-md-6">
                                        <input type='email' name='mail' placeholder="Votre adresse email"  class='col-md-11 form-control' required >
                                    </div>



                                    <label class="col-md-4 control-label contact"><i class="glyphicon glyphicon-earphone"> </i> Téléphone : </label>
                                    <div class="col-md-6">
                                        <input type='tel' name='tel' placeholder="Votre numéro de téléphone"  class='col-md-11 form-control' required >
                                    </div>



                                    <label class="col-md-4 control-label contact"><i class="glyphicon glyphicon-pencil"> </i> Votre message : </label>
                                    <div class="col-md-6 ">
                                        @if (isset($message))
                                        <textarea class="form-control col-md-11 " id="message" name="message"  rows="10" required>{{$message}}</textarea>
                                        @else
                                        <textarea class="form-control col-md-11 " id="message" name="message" placeholder="Entrez votre message ici" rows="10" required></textarea>
                                        @endif
                                    </div>



                                    <center> <div class="col-md-12 contact">

                                            <div class="col-md-12">
                                                @if(isset($objet)) 
                                                <input type='hidden' name="typemessage" value="{{$typeM}}"/>
                                                <label class="col-md-4 control-label contact"><i class="glyphicon glyphicon-tag"> </i> Objet : </label>
                                                <div class="col-md-6">
                                                    <input type='text' name='objet' value="{{$objet}}"  class='col-md-11 form-control' required >
                                                </div>
                                                @else
                                                <p>Votre message concerne : </p>
                                                <input type="radio" name="typemessage" value="informatique" checked>Informatique
                                                <input type="radio" name="typemessage" value="telephonie"> Téléphonie
                                                <input type="radio" name="typemessage" value="autre"> Autre<br>
                                                @endif
                                            </div>

                                            <br/>
                                            <div class="col-md-12">
                                                <div class="g-recaptcha" data-sitekey="6LeRoxYUAAAAANuFSTRfs0EUDvxXjVANuOWmSNkH"></div>
                                                @if(isset($erreur))
                                                {{$erreur}}
                                                @endif 

                                                <div class="col-md-12  button_contact">
                                                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span> Envoyer la demande</button>
                                                </div>

                                            </div>
                                        </div>
                                    </center>

                                </div> 
                            </div>

                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-6 ">
                            <h2 class="contact">Contact par téléphone </h2>



                            <label class="col-md-12 control-label contact"><i class="glyphicon glyphicon-earphone"> </i> Numéro de contact : 09 84 04 03 10</label>
                            <label class="col-md-12 control-label contact">de 10h à 13h et de 14h30 à 19h.</label>
                            <label>Fermé le Lundi matin, et Samedi après-midi </label>

                            <h2 class="contact"> Contact par voie postale</h2>

                            @if(preg_match('/iphone/i',$ua) || preg_match('/android/i',$ua) || preg_match('/blackberry/i',$ua) || preg_match('/symb/i',$ua) || preg_match('/ipad/i',$ua) || preg_match('/ipod/i',$ua) || preg_match('/phone/i',$ua) ) 
                            <a href="geo:45.7676342,4.9579445">Situer le magasin</a>
                            @endif

                            <label class="col-md-12  control-label contact"> SARL RIOTWARE </label>
                            <label class="col-md-12  control-label contact"> 46 rue de la république 69150 Décines Charpieu </label>
                            </br>
                            </br>
                            </br>
                            <div class="full_carte" class="content-area">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2783.1774353877913!2d4.957944515932975!3d45.76763417910562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4c72d5c72595f%3A0xda9f9ab8eff92801!2s46+Rue+de+la+R%C3%A9publique%2C+69150+D%C3%A9cines-Charpieu!5e0!3m2!1sfr!2sfr!4v1484142496305"></iframe>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @if(preg_match('/iphone/i',$ua) || preg_match('/android/i',$ua) || preg_match('/blackberry/i',$ua) || preg_match('/symb/i',$ua) || preg_match('/ipad/i',$ua) || preg_match('/ipod/i',$ua) || preg_match('/phone/i',$ua) ) 
            <a href="tel:+33984040310"><img class="col-md-12 footer_contact" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>  </a> @else
            <img class="col-md-12 footer_contact" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>
            @endif 
        </div>





    </body>


</html>


@stop
