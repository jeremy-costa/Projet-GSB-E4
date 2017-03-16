@extends('layouts.master')
@section('content')
<!Doctype html>
<html lang="fr">   <body> 
    <head>
        <meta name="viewport" content="width=device-width">
        <?php $ua = $_SERVER['HTTP_USER_AGENT'] ?>
    </head>
    <body>
        <div class="container_contenu">
            <div class="col-md-12 container_presentation"> 
                <div class="col-md-12">
                    <div class="col-md-3 ">
                        <p class='col-md-12' style='text-align: center;'><span>Depannage informatique</span><br/>
                            <img class="col-md-offset-1 img_arrondie" src="{{asset('local/assets/img/icon_depannage_informatique.jpg')}}"title="Depannage informatique">


                    </div>

                    <div class="col-md-3 col-md-offset-1">
                        <p class='col-md-12' style='text-align: center;'><span>Depannage à distance</span><br/>
                            <img class="col-md-offset-1 img_arrondie"src="{{asset('local/assets/img/icon_depannage_informatique_3.png')}}" title="Depannage à distance" >


                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <p class='col-md-12' style='text-align: center;'><span>Developpement de site</span><br/>
                            <img class="col-md-offset-1 img_arrondie"src="{{asset('local/assets/img/icon_depannage_2.jpg')}}" title="Developpement de site internet">


                    </div>



                </div>
                <br/>
                <h2> Des spécialistes en informatique à Décines-Charpieu sont à votre service</h2>

                <div class="col-md-12">
                    <div class="col-md-6" id="page_reparation">
                        <br/>
                        <p><span> Nous prenons en charge<strong> tout type de problèmes informatiques</strong>, du plus courant au plus complexe. Sur PC fixe ou portable et Mac.</span></p>
                        <span>Quelques exemples de notre domaine d'intervention : </span>                    
                        <br/>
                        <ul>
                            <li><strong>Lenteur, virus, plus de réponse de la part de votre ordinateur</strong> </li>
                            <li><strong>Pop-up insupportable</strong></li>
                            <li><strong>Message d'erreur à répétitions</strong> </li>
                            <li><strong> Panne du matériel</strong></li>
                            <li><strong>Perte de données </strong></li>
                            <li><strong> Impossibilité d'ouvrir des fichiers </strong></li>
                            <li><strong> Ecran bleu ou noir </strong></li>
                        </ul>

                        <p>L’ensemble de nos réparations sont couvertes par <strong>une garantie</strong> et vos appareils sont toujours testés avant et après toute intervention. Rassurez-vous ! Vos données sont sauvegardées et conservées de manière confidentielle.</p>
                    </div>





                    <img class="col-md-4" alt="" src="{{asset('local/assets/img/depannage1.jpg')}}" style=" height: 50%; width:50%">
                </div>

                <h2>Installation système et périphériques</h2>

                <div class="col-md-12">
                    <div class="col-md-6" id="page_reparation">
                        <br/>
                        <p><span>Nous prenons en charge<strong> tout type d'installation ainsi que les procédures complèmentaires parfois nécessaires : </strong></span></p>

                        <br/>
                        <ul>
                            <li><strong>Sauvegarde de vos données sur support externe</strong> </li>
                            <li><strong>Installation logiciel</strong></li>
                            <li><strong>Mises à jour</strong> </li>
                            <li><strong>Installation des drivers</strong></li>
                            <li><strong>Rétablissement des données </strong></li>
                            <li><strong>Installation du système d'exploitation (Windows - Mac Os - Ubuntu ... ) </strong></li>
                            <li><strong>Formatage du disque dur </strong></li>
                        </ul>

                    </div>

                    <img class="col-md-6 col-md-offset-1" alt="" src="{{asset('local/assets/img/installation_systeme.jpg')}}" style=" height: 30%; width:30% ">
                </div>


                <div class="col-md-12">
                    <h2>Intervention matériel ou mise à niveau</h2>
                    <div class="col-md-6" id="page_reparation">
                        <br/>
                        <p>Un ordinateur vieillissant, qui ne veut pas s'allumer, une envie de mieux ? Pas de panique ! Nous sommes là pour remplacer la pièce deffectueuse ou pour améliorer les performances de votre machine !</p>
                        <p><span><strong>Nous intervenons sur le matériel en cas de panne, remplacement de pièces détachées pour tout type de machine. </strong></span></p>

                        <br/>
                        <ul>
                            <li><strong>Remplacement de disque dur</strong> </li>
                            <li><strong>Remplacement des barettes de mémoire</strong></li>
                            <li><strong>Changement de carte mère</strong> </li>
                            <li><strong>Changement de carte vidéo</strong></li>
                            <li><strong>Changement d'alimentation </strong></li>
                            <li><strong>Récupération de données (si possible) </strong></li>

                        </ul>

                    </div>
                    <div class="col-md-4 col-md-offset-1 ">
                        <img class="col-md-12" alt="" src="{{asset('local/assets/img/depannage3.jpg')}}" style=" height: 20%; width:80% ">
                    </div>
                </div>



                <div class="containeur_image_marques_reparation">

                    <img class="id_img-bandeau" src="{{asset('local/assets/img/msi.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/Intel-logo.png')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/amd-logo.gif')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/Logo_Asus.png')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/Logo_PB.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/Sony_Logo.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/dell.png')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/hp.png')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/lenovo.png')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/logo_acer.png')}}">

                </div>
                @if(preg_match('/iphone/i',$ua) || preg_match('/android/i',$ua) || preg_match('/blackberry/i',$ua) || preg_match('/symb/i',$ua) || preg_match('/ipad/i',$ua) || preg_match('/ipod/i',$ua) || preg_match('/phone/i',$ua) ) 
                <a href="tel:+33984040310"><img class="col-md-12 footer_contact" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>  </a> @else
                <img class="col-md-12 footer_contact" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>
                @endif </div>


        </div>

    </div>
</body>
</html>

@stop

