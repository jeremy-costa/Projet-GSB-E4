@extends('layouts.master')
@section('content')
<!Doctype html>
<html lang="fr">   
    <head>
        <meta name="viewport" content="width=device-width">
        <?php $ua = $_SERVER['HTTP_USER_AGENT'] ?>
    </head>
    <body>
        <div class="container_contenu">
            <div class="col-md-12 container_presentation"> 
                <div class="col-md-12">
                    <div class="col-md-12"> 
                        <h1 class="col-md-12">Solution d'encaissement</h1>
                        <div class="col-md-3 col-xs-12">
                            <img class="col-md-11 col-xs-12"alt="" src="http://www.fastncast.com/images/contenu/caisse/ses3000.jpg" style="border-radius:15px; box-shadow:0px 2px 3px rgb(119, 119, 119); float:left; height:20%; margin-left:2%; margin-right:2%;">
                        </div>
                        <div class="col-md-6">
                            <span style="font-size:100%">Nos connaissances dans le domaine des caisses enregistreuses nous permet de nous rapprocher des </span>
                            <span style="font-size:100%">différents commerces qui assurent la vie de notre société. </span>
                            <p>&nbsp;</p>
                            <ul>	
                                <li><span style="font-size:100%">Assistance</span></li>	
                                <li><span style="font-size:16px">Vente et conseil</span></li>	
                                <li><span style="font-size:16px">Formation à l'outil</span></li>	
                                <li><span style="font-size:16px">Téléassistance</span></li>	
                                <li><span style="font-size:16px">Un service de proximité</span></li>
                            </ul>
                        </div>
                        <p>&nbsp;</p>
                        <table style="width:100%" cellspacing="0" cellpadding="0" border="0">	
                            <tbody>		
                                <tr>			
                                    <td style="background-color:rgb(204, 204, 204)">&nbsp;</td>		
                                </tr>	
                            </tbody>
                        </table>
                        <h1>Des professionnels à votre service</h1>
                        <p>&nbsp;</p>
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <p>
                                    <span style="color:#800080"><em><span style="font-size:100%">C'est auprès de ces acteurs de la vie courante que nous proposons des solutions d'encaissements en fonction de leurs goûts et de leurs attentes.</span></em></span></p>
                                <p>&nbsp;</p>
                                <p><span style="font-size:100%">Nous avons déjà programmés, installés, et dépannés un large éventail de produits dans ces différentes marques. </span>(CASIO, TOWA, SHARP, OLIVETI)</p>
                                <p>&nbsp;</p>
                                <p><em><span style="color:#800080"><span style="font-size:100%">Nous sommes à même d'intervenir sur tout type de modèles de caisses sur lesquelles nous sommes le plus souvent intervenus, pour la programmation, l'installation ou le dépannage.&nbsp;&nbsp;</span></span></em></p>
                            </div>
                            <div class="col-md-3 col-xs-12"><img class="col-md-11" alt="" src="http://www.fastncast.com/images/contenu/caisse/casio-vr-10004.jpg" style="border-radius:15px; box-shadow:0px 2px 3px rgb(119, 119, 119); margin-left:2%; margin-right:2%; height:20%;"></h2>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <table style="width:100%" cellspacing="0" cellpadding="0" border="0">	
                            <tbody>		
                                <tr>			
                                    <td style="background-color:rgb(204, 204, 204)">&nbsp;</td>		
                                </tr>	
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                        <h1>Les caisses les plus demandées par les commercants</h1>
                        {!! Form::open(['url' => 'contact']) !!} 
                        <div class="col-md-12 image_caisse">
                            <input type='hidden' name="type" value="CAISSE ENREGISTREUSE"/>
                            <div class="col-md-3"><img alt="" class=" img_arrondie" src="http://www.fastncast.com/images/contenu/caisse/vr100.jpg" >
                                <p><strong>CASIO VR100</strong></p>
                            </div>

                            <div class="col-md-3 "><img alt="" class="img_arrondie"  src="http://www.fastncast.com/images/contenu/caisse/ses400.jpg"> 
                                <p><strong>CASIO SES400</strong></p>
                            </div>
                            <div class="col-md-3"><img  class="img_arrondie" alt=""  src="http://www.fastncast.com/images/contenu/caisse/sec3500.jpg">
                                <p><strong>CASIO SES450</strong></p>
                            </div>
                        </div>

                    </div>
                    <p> <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>Obtenir plus d'informations</button></p>

                    {!! Form::close() !!}





                </div>    


                @if(preg_match('/iphone/i',$ua) || preg_match('/android/i',$ua) || preg_match('/blackberry/i',$ua) || preg_match('/symb/i',$ua) || preg_match('/ipad/i',$ua) || preg_match('/ipod/i',$ua) || preg_match('/phone/i',$ua) ) 
                <a href="tel:+33984040310"><img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>  </a> @else
                <img class="col-md-12 footer_accueil" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>
                @endif

            </div>




    </body>
</html>

@stop