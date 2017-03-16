@extends('layouts.master')
@section('content')
<!Doctype html>
<html class="body2"> 
    <body>
    <head>
        <meta name="viewport" content="width=device-width"/>
        <?php $dossier = substr($unProduit->ref, 0, 3) ?>
    </head>




    {!! Form::open(['url' => 'ajoutPanier']) !!}
    <div class="container_contenu">

        <div class="col-md-12 container_presentation"> 
            <div class="col-md-12"><br/></div>
            <div id="breadcrumb" itemprop="breadcrumb">

                <a href="{{url('/')}}">Accueil</a> &gt;<a href="{{url('/Familles')}}">Categories</a> &gt; <a href="{{url('/Produits')}}/{{$nomFamille}}">{{$NomFamilleCoupe}}</a> &gt; <a href="{{url('/Trier')}}/{{$IdSousFamille}}/{{$rowidFamille->rowid}}">{{$SousFamille->label}}</a> &gt; <span> {{$unProduit->label }}<span>

                        </div>
                        <div class="col-md-12"><br/></div>
                        <div class="col-md-12"><br/></div>

                        <div class="col-md-8 ">
                            <div class="col-md-6">
                                @if(file_exists("local/assets/Images_produits/$dossier/$unProduit->ref.jpg"))
                                <center>     <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unProduit->ref, 0,3) }}/{{$unProduit->ref}}.jpg" size=portrait>   </center>
                                @else
                                <center> <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unProduit->ref, 0,3) }}/{{ substr($unProduit->ref, 0,3) }}.jpg" size=portrait>  </center>
                                @endif
                            </div>

                            <div class="col-md-6">

                                <div class="col-md-12">
                                    {!!$unProduit->description!!}


                                </div>
                                <input type='hidden' name="idproduit" value="{{$unProduit->rowid}}"/>
                                <div class="col-md-12"><br/></div>
                                <div class="col-md-12"><br/></div>
                                <div class="col-md-12">
                                    <strong>{{round($unProduit->price_ttc , 2)}}€ TTC</strong>
                                </div>
                            </div>
                            @if (Session::get('nom')!=null)
                            <input class="btn  btn-success " type="submit" value="Ajouter au panier">
                            @endif
                        </div>



                        </div>

                        </div>
                        {!! Form::close() !!}

                        </body>
                        </html>
                        @stop