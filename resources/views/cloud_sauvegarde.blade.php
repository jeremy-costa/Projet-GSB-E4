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
                    {!! Form::open(['url' => 'contact']) !!} 
                    <input type='hidden' name="type" value="HOSTNCAST"/>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2>Hébergement HOSTNCAST</h2>
                            <p class="col-md-5 col-xs-12"><img class="img_cloud"alt="" src="http://www.hostncast.com/images/img_HOST.png" title="Hébergement web sur-mesure !">
                            </p>
                            <div class="col-md-6">
                                <ul>	
                                    <li>Hébergement sécurisé</li>	
                                    <li>Pack domaine, Emails, base donnée SQL</li>	
                                    <li>Base de donnée MySql</li>	
                                    <li>Installation CMS (Joomla, Wordpress, ...)</li>	
                                    <li>Language PHP, PERL, CGI, ASP</li>
                                </ul>
                                <p>
                                    <strong>
                                        <span style="font-size:100%">A partir de :</span></strong>
                                    <em><strong><span style="font-size:100%"> 1,54€ HT</span></strong></em><strong>/mois</strong></p>
                                <p> <center><button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>Contactez-nous</button></center></p>
                            </div>
                        </div>  
                    </div>


                    {!! Form::close() !!}

                    {!! Form::open(['url' => 'contact']) !!} 
                    <input type='hidden' name="type" value="HOUSING"/>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2>Hébergement HOUSING</h2>
                            <p class="col-md-5"><img class="img_cloud "alt="" src="http://hostncast.com/images/data/IMG_3981%5B1%5D.JPG"  title="Hébergement web sur-mesure !"></p>
                            <div class="col-md-6"> 
                                <ul>	
                                    <li>Hébergement sécurisé</li>	
                                    <li>Site sous surveillance 24H/24 7J/7</li>	
                                    <li>Accès 24H24H 7J/7J</li>	
                                    <li>BP garantie de 200Mps à 1Gbps</li>	
                                    <li>Service de proximité pour les urgences</li>
                                </ul>
                                <p style="font-size:100%">
                                    <strong><span>A partir de :</span></strong><em><strong><span> 99€ HT</span></strong></em>
                                    <strong>/mois /1-3U</strong></p>
                                <p> <center><button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>Contactez-nous</button></center></p>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>         


                <div class="col-md-12">

                    {!! Form::open(['url' => 'contact']) !!} 
                    <input type='hidden' name="type" value="CLOUD"/>

                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2>Serveur en cloud privé</h2>
                            <p class="col-md-5"><img class="img_cloud" alt="" src="http://hostncast.com/images/img_VPS.png" title="Serveur cloud privé !"></p>
                            <div class="col-md-6">
                                <ul>	
                                    <li>Serveur puissant et de qualité !</li>	
                                    <li>Débian, Centos, FreeBSD, Ubuntu, Plesk</li>
                                    <li>Personalisation de votre serveur</li>	
                                    <li>Outils de gestion offert</li>	
                                    <li>Sauvegarde journalière</li>
                                </ul>
                                <p><strong><span style="font-size:100%">A partir de :</span></strong><em><strong><span style="font-size:100%"> 3,99€ HT</span></strong></em><strong>/mois</strong></p>
                                <p> <center><button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>Contactez-nous</button></center></p>
                            </div>

                        </div>


                    </div> 
                    {!! Form::close() !!}

                    {!! Form::open(['url' => 'contact']) !!} 
                    <input type='hidden' name="type" value="CLOUD"/>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2>Serveur en cloud dédié</h2>
                            <p class="col-md-5"><img class="img_cloud "alt="" src="http://hostncast.com/images/img_RPS.png" title="Serveur cloud dédié !"></p>
                            <div class="col-md-6">
                                <ul>	
                                    <li>KVM Ip offert</li>	
                                    <li>Windows 2008, Windows 7, Débian, ...</li>	
                                    <li>Chargeur d'ISO en ligne</li>	
                                    <li>Sauvegardes journalières système</li>	
                                    <li>Bande passante garantie</li></ul>
                                <p><strong><span style="font-size:100%">A partir de :</span></strong><em><strong><span style="font-size:100%"> 6,99€ HT</span></strong></em><strong>/mois</strong></p>
                                <p><center> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>Contactez-nous</button></center></p>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>

                <div class="col-md-12">
                    {!! Form::open(['url' => 'contact']) !!} 
                    <input type='hidden' name="type" value="DOMAINE"/>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2>Nom de domaine</h2>
                            <p class="col-md-5"><img class="img_cloud "alt="" src="http://hostncast.com/images/internet-un-reseau-icone-5031-128.png" title="Nom de domaine !"></p
                            <p><span style="font-size:100%">Choix du nom de domaine :</span><br>.<em><strong>fr, .com, .info, net, .pro, .biz</strong></em>, ...<br>&nbsp;</p>
                            <p><strong><span style="font-size:100%">A partir de :</span></strong><em><strong><span style="font-size:100%"> 9,90€ HT</span></strong></em></p>
                            <p><center> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>Contactez-nous</button></center></p>
                        </div>

                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['url' => 'contact']) !!} 
                    <input type='hidden' name="type" value="SITE"/>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <h2>Location et création site internet et e-commerce</h2>
                            <p class="col-md-5"><img class="img_cloud "alt="" src="http://hostncast.com/images/boites-des-couleurs-des-modules-icone-5028-128.png"  title="Location et création site internet et e-commerce !"></p>
                            <p><span style="font-size:100%">Votre site internet clé et modulaire sans avoir à vous ruiner !<br>CMS nouvelle génération avec backoffice sécurisé.</span></p><p><strong><span style="font-size:100%">A partir de :</span></strong><em><strong><span style="font-size:100%"> 19,90€ HT</span></strong></em></p>
                            <p> <center><button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>Contactez-nous</button></center></p>
                        </div>



                    </div>
                    {!! Form::close() !!}
                </div>


                @if(preg_match('/iphone/i',$ua) || preg_match('/android/i',$ua) || preg_match('/blackberry/i',$ua) || preg_match('/symb/i',$ua) || preg_match('/ipad/i',$ua) || preg_match('/ipod/i',$ua) || preg_match('/phone/i',$ua) ) 
                <a href="tel:+33984040310"><img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>  </a> @else
                <img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>
                @endif </div>
        </div>
    </div>



</body>

@stop