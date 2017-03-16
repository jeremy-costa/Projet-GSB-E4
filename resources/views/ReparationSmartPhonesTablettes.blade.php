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
                <div class="col-md-12">
                    <aside role="complementary">
                        <div class="col-md-3">
                            <center><img class="image_Reparation_tablette_smartphone"src="{{asset('local/assets/img/mobiltec1.png')}}" alt="réparation toutes marques" title="réparation toutes marques" style="" data-pagespeed-url-hash="1375061636"></center>
                        </div>
                        <div class="col-md-3">
                            <center>  <img class="image_Reparation_tablette_smartphone" src="{{asset('local/assets/img/mobiltec2.png')}}" alt="déblocage de téléphone" title="déblocage de téléphone" style="" data-pagespeed-url-hash="1669561557" ></center>
                        </div>
                        <div class="col-md-3">
                            <center> <img class="image_Reparation_tablette_smartphone" src="{{asset('local/assets/img/mobiltec3.png')}}" alt="devis gratuit en boutique et en ligne" title="devis gratuit en boutique et en ligne" style="" data-pagespeed-url-hash="1964061478"></center>
                        </div>
                        <div class="col-md-3">
                            <center>   <img class="image_Reparation_tablette_smartphone" src="{{asset('local/assets/img/mobiltec4.png')}}" alt="prix ultra compétitifs" title="prix ultra compétitifs" style="" data-pagespeed-url-hash="2258561399"></center>
                        </div>
                    </aside> 
                </div>

                <div class="col-md-12">
                    <div class="col-md-6" id="page_reparation"><h2>Des spécialistes en réparation de téléphones et de tablettes à Décines-Charpieu sont à votre service</h2>
                        <br/>
                        <p><span>Nous possédons une réelle expertise nous permettant d’apporter les solutions de <strong>réparation les plus efficaces pour votre téléphone ou votre tablette</strong> </span><a><span style="color:#000000">quelle </span></a><span style="color:#000000">que soit la marque <strong>Apple</strong>, <strong>Samsung</strong>, Huawei, Nokia et autres. Notre atelier est équipé d’une gamme complète de matériel pour assurer les réparations suivantes :</span></p>
                        <br/>
                        <ul>
                            <li><strong>Changement de l’écran cassé</strong> de votre téléphone ou de votre tablette en une heure</li>
                            <li><strong>Remplacement de la batterie</strong></li>
                            <li><strong>Réparation du connecteur de la carte</strong> et du connecteur de l’écran</li>
                            <li><strong>Réparation du lecteur de cartes</strong></li>
                            <li><strong>Désoxydation du téléphone </strong></li>
                            <li><strong>Desimlockage du téléphone </strong></li>
                        </ul>


                    </div>
                    <img class="col-md-6 img_arrondie_spéciale " alt="" src="{{asset('local/assets/img/reparation_1.jpg')}}" style=" height: 50%; float: right;">
                </div>
                <div class="col-md-12">

                    <img class="col-md-6 image_Reparation_tablette_smartphone" alt="" src="{{asset('local/assets/img/reparation_2.jpg')}}" style=" float:left; ">
                    <p class="col-md-6">L’ensemble de nos réparations sont couvertes par <strong>une garantie de 6 mois</strong> et vos appareils sont toujours testés avant et après toute intervention. Rassurez-vous ! Vos données sont sauvegardées et conservées de manière confidentielle.</p>
                </div>

                <div class="col-md-12">
                    <h2>Visitez notre magasin de téléphones et de tablettes à Décines-Charpieu&nbsp;pour l’achat de votre nouveau smartphone !</h2>

                    <div class="col-md-6">
                        <p>Vous êtes à la recherche d’un <strong>smartphone ou d'une tablette à prix raisonnable</strong>, neuf ou d’occasion ? Mobiltec, à Décines-Charpieu près de Lyon, vous propose une multitude de téléphones mobiles et de tablettes:</p>

                        <ul>
                            <li>Téléphones neufs : Blackview BV2000 et BV 5000</li>
                            <li>IPhones reconditionnés</li>
                            <li>Tablettes Ipad reconditionnées</li>
                            <li>Tablettes Samsung</li>
                        </ul>
                        <br/>
                        <p>Concernant les<strong> accessoires pour Smartphone</strong>, notre magasin vous fournit un large choix de chargeurs, housses de protection ou adaptateurs à petits prix pour <strong>équiper votre téléphone</strong>.</p>
                        <p>Nos <strong>réparateurs de téléphones</strong> sont capables de vous accompagner et vous offrir les meilleures prestations. N’hésitez pas à nous contacter.</p>
                    </div>
                    <div class="col-md-6 ">
                        <img class=" col-md-12 img_arrondie" alt="" src="{{asset('local/assets/img/image_produit_apple.jpg')}}" style=" height: 20%; width:100%;">   
                    </div>

                </div>



                <div class="containeur_image_marques_reparation col-md-12">

                    <img class="id_img-bandeau" src="{{asset('local/assets/img/apple.jpg')}}"></li>
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/samsung.jpg')}}"></a>
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/nokia.png')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/lg.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/xperia.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/sony_ericsson.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/windowsphone.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/Wiko.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/android.jpg')}}">
                    <img class="id_img-bandeau" src="{{asset('local/assets/img/huawei.jpg')}}">

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

