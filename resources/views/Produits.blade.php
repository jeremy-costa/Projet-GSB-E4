@extends('layouts.master')
@section('content')
<!Doctype html>
<html lang="fr">
    <body> 
    <head>
        <meta name="viewport" content="width=device-width"/>
        <?php $ua = $_SERVER['HTTP_USER_AGENT'] ?>
        <script>
            function trier(idSousFamille, rowid)
            {



            document.location.href = "{{url('/Trier')}}/" + idSousFamille + "/" + rowid;
            }
        </script>

    </head>
    <body>
        <div>
            <div class="container_contenu">
                <div class=" col-md-12 container_presentation">
                    <div class="col-md-12"><br/></div>

                    <div class="col-md-12">
                        <div id="breadcrumb" itemprop="breadcrumb"> 

                            <a href="{{url('/')}}">Accueil</a> &gt;  <a href="{{url('/Familles')}}">Categories</a> &gt; @if(!isset($nomSF))<span>{{$NomFamille}}</span>@endif  @if(isset($nomSF)) <a href="{{ url('/Produits') }}/{{ $Famille->label }}">{{$NomFamille}}</a> &gt; <span> {{$nomSF}} </span> @endif 

                        </div>

                        <div class="col-md-3">
                            @foreach($lesSousFamilles as $uneSousF )



                            <INPUT type= "radio" name="sousfamille"  onClick="trier({!!$uneSousF -> rowid!!}, {!!$rowid -> rowid!!});"> {{$uneSousF->label}}

                            <br/>
                            @endforeach
                        </div>
                        <table class="table table-bordered table-striped">

                            @foreach($lesProduits as $unP)
                            <?php $dossier = substr($unP->ref, 0, 3) ?>

                            <div class="col-md-3 position_produits_famille">
                                <a class="produits_familles"href="{{ url('/Produit') }}/{{ $unP->ref }}">

                                    <div class="col-md-12  famille" >
                                        <strong class="nom_famille">
                                            <br>
                                            <center>
                                                {{$unP->label }}
                                            </center>


                                            <br>
                                        </strong>

                                        <div class="col-md-6 position_img_produit ">
                                            @if(file_exists("local/assets/Images_produits/$dossier/$unP->ref.jpg"))

                                            <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unP->ref, 0,3) }}/{{$unP->ref}}.jpg" size=portrait>  
                                            @else
                                            <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unP->ref, 0,3) }}/{{ substr($unP->ref, 0,3) }}.jpg" size=portrait>  
                                            @endif
                                        </div>

                                        <br><br>


                                        <br>

                                    </div>

                                </a>
                            </div>

                            @endforeach
                            <BR> <BR>



                        </table>

                    </div>
                </div>
            </div>

        </div>



    </body>
</html>
@stop