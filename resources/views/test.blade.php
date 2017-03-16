@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
      <head>
   
        <meta name="viewport" content="width=device-width"/>
 
    </head>
    
    <body class="body">
    <body>
   
        <div class="header_caroussel col-md-12">
             <div id="carrousel" class="col-md-7">
           <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                 
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               
                @if($lesImagesTextes2->active==1)
                <li data-target="#myCarousel" data-slide-to="1"></li>
                @endif
                @if($lesImagesTextes3->active==1)
                <li data-target="#myCarousel" data-slide-to="2"></li>
                @endif
                  @if($lesImagesTextes4->active==1)
                <li data-target="#myCarousel" data-slide-to="3"></li>
                @endif
                  @if($lesImagesTextes5->active==1)
                <li data-target="#myCarousel" data-slide-to="4"></li>
                @endif
            </ol>

          
            <div class="carousel-inner">
                <div class="item active">
                   
                    <div class="fill" style="background-image:url(local/assets/img/{{$lesImagesTextes1->image}});"></div><a/>
                    <div class="carousel-caption">
                        <h2>{{$lesImagesTextes1->texte}}</h2>
                     
                    </div>
                    
                </div>
             
           
           @if($lesImagesTextes2->active==1)
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                   
                    <div class="fill" style="background-image:url(local/assets/img/{{$lesImagesTextes2->image}});"></div>
                    <div class="carousel-caption">
                        <h2>{{$lesImagesTextes2->texte}}</h2>
                          
                    </div>
                    
                </div>
           @endif
          @if($lesImagesTextes3->active==1)
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url(local/assets/img/{{$lesImagesTextes3->image}});"></div>
                    <div class="carousel-caption">
                        <h2>{{$lesImagesTextes3->texte}}</h2>
                    </div>
                </div>
          @endif
                 @if($lesImagesTextes4->active==1)
          
                 <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url(local/assets/img/{{$lesImagesTextes4->image}});"></div>
                    <div class="carousel-caption">
                        <h2>{{$lesImagesTextes4->texte}}</h2>
                    </div>
                </div>
               @endif
                @if($lesImagesTextes5->active==1)
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url(local/assets/img/{{$lesImagesTextes5->image}});"></div>
                    <div class="carousel-caption">
                        <h2>{{$lesImagesTextes5->texte}}</h2>
                    </div>
                </div>
                @endif
            </div>
         
          
          
        
          
          
           @if (Session::get('id')> 0)
           {!! Form::open(['url' => 'Configuration']) !!}
           <div class="col-md-8 bouton_configuration ">
            <button type="submit" class="btn btn-default btn-primary">Configuration</button>
           </div>
           {!! Form::close() !!}
          
           @endif

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>

        </div>

        </div>
         <div class="col-md-5 container_img_facade"><img class="img_facade" src="{{asset('local/assets/img/facade_boutique.jpg')}}" > 
         </div>
        </div>
   
      <div class="container_accueil_contenu">
    <div class="col-md-12 container_presentation">
       

        <div class="col-md-12">
             <div class="col-md-12">
                 
            <aside role="complementary">
                
                <div class="col-md-12">
                 <div class="col-md-12">
                <h1>Nos produits</h1>
            </div>
            <div class="col-md-2 col-xs-10">
                    <div class="hovereffect">
                    
                        <img class="image_icon_macapple"src="{{asset('local/assets/img/icon_vente_ordinateur.png')}}" alt="Vente d'ordinateurs" title="Vente d'ordinateurs" style="" data-pagespeed-url-hash="1375061636">
                        <div class="overlay">
                            <h2>Vente d'ordinateurs</h2>
                            <a class="info" href="{{url('/Produits')}}">En savoir plus</a>
                        </div>
                    </div>
                </div>
             <div class="col-md-2 col-xs-10 ">
                    <div class="hovereffect">
                    
                        <img class="image_icon_macapple"src="{{asset('local/assets/img/icon_vente_telephones.png')}}" alt="Vente de telephones" title="Vente de telephones" style="" data-pagespeed-url-hash="1375061636">
                        <div class="overlay">
                            <h2>Vente de téléphones toute marque</h2>
                            <a class="info" href="">En savoir plus</a>
                        </div>
                    </div>
                </div>
           <div class="col-md-2 col-xs-10 ">
                    <div class="hovereffect">
                    
                        <img class="image_icon_macapple"src="{{asset('local/assets/img/icon_apple.png')}}" alt="Appareils Apple reconditionnés" title="Appareils Apple reconditionnés" style="" data-pagespeed-url-hash="1375061636">
                        <div class="overlay">
                            
                            
                            <h2>Appareils Apple reconditionnés</h2>
                            <a class="info" href="{{url('/Mac-Apple')}}">En savoir plus</a>
                        </div>
                    </div>
                </div>
          
             <div class="col-md-2 col-xs-10 ">
                    <div class="hovereffect">
                    
                        <img class="image_icon_macapple"src="{{asset('local/assets/img/icon_composant.png')}}" alt="Composants informatiques" title="Composants informatiques" style="" data-pagespeed-url-hash="1375061636">
                        <div class="overlay">
                            <h2>Composants informatiques</h2>
                            <a class="info" href="{{url('/Produits')}}/11-COMPOSANTS">En savoir plus</a>
                        </div>
                    </div>
                </div>
             <div class="col-md-2 col-xs-10">
                    <div class="hovereffect">
                    
                        <img class="image_icon_macapple"src="{{asset('local/assets/img/accessoire_neufs.png')}}" alt="Accessoires" title="Accessoires" style="" data-pagespeed-url-hash="1375061636">
                        <div class="overlay">
                            <h2>Accessoires neufs</h2>
                            <a class="info" href="{{url('/Produits')}}/15-CONSOMMABLES">En savoir plus</a>
                        </div>
                    </div>
                </div>
                </div>
               
                <h1>Nos services</h1>
            
               
              <div class="col-md-6 col-xs-12">
                  <div class="col-md-4 col-md-offset-6 col-xs-10 col-xs-offset-1">
                    <div class="hovereffect">
                    
                        <img class="image_icon_macapple"src="{{asset('local/assets/img/icon_depannage_telephone.png')}}" alt="Depannage de téléphones" title="Depannage de téléphones" style="" data-pagespeed-url-hash="1375061636">
                        <div class="overlay">
                            <h2>Depannage de téléphones</h2>
                            <a class="info" href="{{url('/Reparation_smartphones_tablettes')}}">En savoir plus</a>
                        </div> 
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12">
             <div class="col-md-4 col-xs-10 col-xs-offset-1">
                    <div class="hovereffect">
                    
                        <img class="image_icon_macapple"src="{{asset('local/assets/img/icon_depannage_informatique.png')}}" alt="Depannage informatique" title="Depannage informatique" style="" data-pagespeed-url-hash="1375061636">
                        <div class="overlay">
                            <h2>Depannage informatique</h2>
                            <a class="info" href="{{url('/Reparation_informatique')}}">En savoir plus</a>
                        </div>
                    </div>
             </div>
                </div>
               
            
         </div>
            </aside> 
        </div>
            
        <h1>A très bientôt !</h1>
            
       
           

          
  <img class="col-md-12 footer" alt="" src="{{asset('local/assets/img/footer_2.png')}}"</img>    

        </div>

  
    </div>


     
     
    </body>
   
</html>


@stop