@extends('layouts.master')
@section('content')
<!Doctype html>
<html lang="fr">
    <body> 
    <head>
        <meta name="viewport" content="width=device-width"/>
        <?php $ua = $_SERVER['HTTP_USER_AGENT'] ?>
    </head>
    <body>
        <div class="container_contenu">
            <div class="col-md-12 container_presentation">


                <div class="col-md-12" id="page_reparation"><h2>Fan de la marque Apple ? Notre magasin est fait pour vous ! </h2>
                    <div class="col-md-12">
                        <div class="col-md-2">
                            {!! Form::open(['url' => 'contact']) !!} 
                            <input type='hidden' name="type" value="iPhones reconditionnés"/>
                            <p class='col-md-6'><span><strong>iPhones reconditionnés</strong></span><br/></p>
                            <p><button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>En savoir plus</button></p>

                            {!! Form::close() !!}

                        </div>
                        <div class="col-md-2">
                            {!! Form::open(['url' => 'contact']) !!} 
                            <input type='hidden' name="type" value="iMacs reconditionnés"/>
                            <p class='col-md-6'><span><strong>iMacs reconditionnés</strong></span><br/></p>
                            <p> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>En savoir plus</button></p>

                            {!! Form::close() !!}


                        </div>
                        <div class="col-md-2">

                            {!! Form::open(['url' => 'contact']) !!} 
                            <input type='hidden' name="type" value="MacBooks reconditionnés"/>
                            <p class='col-md-6'><span><strong>MacBooks recondtionnés</strong></span><br/></p>

                            <p> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>En savoir plus</button></p>

                            {!! Form::close() !!}

                        </div>
                        <div class="col-md-2">
                            {!! Form::open(['url' => 'contact']) !!} 
                            <input type='hidden' name="type" value="iPods reconditionnés"/>
                            <p class='col-md-6'><span><strong>iPods reconditionnés</strong></span><br/></p>


                            <p> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>En savoir plus</button></p>

                            {!! Form::close() !!}
                        </div>

                        <div class="col-md-2">
                            {!! Form::open(['url' => 'contact']) !!} 
                            <input type='hidden' name="type" value="iPads reconditionnés"/>
                            <p class='col-md-6'><span><strong>iPads recondtionnés</strong></span><br/></p>


                            <p> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>En savoir plus</button></p>

                            {!! Form::close() !!}
                        </div>

                        <div class="col-md-2">
                            {!! Form::open(['url' => 'contact']) !!} 
                            <input type='hidden' name="type" value="Accessoires neufs"/>
                            <p class='col-md-6'><span><strong>Accessoires neufs</strong></span><br/></p>



                            <p> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>En savoir plus</button></p>

                            {!! Form::close() !!}

                        </div>

                    </div>

                    <h2>La maintenance qualité professionnelle </h2>

                    <p><span>Nous possédons un savoir faire nous permettant d’apporter les solutions de <strong>réparation les plus efficaces pour votre appareil Apple (Tablettes, ordinateurs, telephones).</strong> <span> Nous sommes équipé d’une gamme complète de matériel pour assurer les réparations suivantes :</span></p>
                    <br/>
                    <div class="col-md-6">
                        <ul>
                            <li><strong>Changement de l’écran cassé</strong> en une heure</li>
                            <li><strong>Installation du système d'explotation </strong></li>
                            <li><strong>Remplacement du disque dur</strong></li>
                            <li><strong>Réparation du connecteur de la carte</strong> et du connecteur de l’écran</li>
                            <li><strong>Réparation du lecteur de cartes</strong></li>
                            <li><strong>Réparation carte mère </strong> micro-soudures</li>
                            <li><strong>Réparation chipset </strong></li>
                            <li><strong>Désoxydation du téléphone </strong></li>
                            <li><strong>Desimlockage du téléphone </strong></li>

                        </ul>


                    </div>

                    <img class="col-md-6 img_arrondie" alt="" src="{{asset('local/assets/img/mac_apple1.jpg')}}" style=" width:45%; height: 100%;">

                </div>

                <div class="col-md-12 " id="page_reparation">
                    <h2>MacBook, iMac, iPhone, iPod, iPad reconditionnés </h2>
                    <br/>
                    <p><span>Notre magasin propose également <strong>tout type d'appareil Apple (Tablettes, ordinateurs, telephones) reconditionnés par nos soins </strong> <span>à un prix défiant toute concurrence.</span> </p>
                    <br/>
                    <img alt="" src="{{asset('local/assets/img/mac_apple2.jpg')}}" style=" height: 100%; width:100%;">



                </div>



                @if(preg_match('/iphone/i',$ua) || preg_match('/android/i',$ua) || preg_match('/blackberry/i',$ua) || preg_match('/symb/i',$ua) || preg_match('/ipad/i',$ua) || preg_match('/ipod/i',$ua) || preg_match('/phone/i',$ua) ) 
                <a href="tel:+33984040310"><img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>  </a> @else
                <img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>
                @endif </div> 


        </div>


    </body>
</html>
@stop