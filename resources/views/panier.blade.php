@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2">
    <head>

    </head>
    <body class="body">

        <div>
            <br> <br>
            <br> <br>
            @if ($lesProduits != null)
            <div class="container">
                @if($page=="Panier") 
                {!! Form::open(['url' => 'passercommande']) !!}  
                @else
                {!! Form::open(['url' => 'validercommande']) !!}  
                @endif
                <div class="container_panier">

                    <h1 style="color:white;">{{$page}}</h1>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom du produit</th>
                                <th>Reference</th>
                                <th>Description</th>
                                <th>Prix HT</th>
                                <th>Prix TTC</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                @if($page=="Panier")  
                                <th>Supprimer du panier</th>
                                @endif
                                <th>Total TTC</th>


                            </tr>


                        </thead>






                        @foreach($lesProduits as $unProduit)
                        <?php $dossier = substr($unProduit->ref, 0, 3) ?>
                        <tr>   
                            <td>{{ $unProduit->label }}</td> 

                            <td>{{ $unProduit->ref }}</td>


                            <td>  
                                {!! $unProduit->description !!}

                            </td>
                            <td>
                                {{$unProduit->price}}€

                            </td>

                            <td>  
                                {{$unProduit->price_ttc}}€

                            </td>
                            <td >       @if(file_exists("local/assets/Images_produits/$dossier/$unProduit->ref.jpg"))
                                <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unProduit->ref, 0,3) }}/{{$unProduit->ref}}.jpg" size=portrait>   
                                @else
                                <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unProduit->ref, 0,3) }}/{{ substr($unProduit->ref, 0,3) }}.jpg" size=portrait>  
                                @endif

                            </td>


                            <td> @if($page=="Panier")  <a href="{{ url('/augmenterQte')}}/{{$unProduit->rowid}}/{{$idClient}}" class=" glyphicon glyphicon-chevron-up" data-toggle="tooltip" data-placement="top"></a>@endif
                                {{(int)$unProduit->quantite }}
                                @if($page=="Panier")     <a href="{{ url('/diminuerQte')}}/{{$unProduit->rowid}}/{{$idClient}}" class=" glyphicon glyphicon-chevron-down" data-toggle="tooltip" data-placement="top" ></td>@endif

                            @if($page=="Panier")   <td><a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/SupprimerProduit')}}/{{ $unProduit->rowid }}/{{$idClient}}"
                                                          onclick="javascript:if (confirm('Voulez vous vraiment enlever la chaussure du panier ?'))"> 
                                </a></td>
                            @endif


                            @endforeach
                            <td> {{ $total_ttc}}€</td>


                        </tr>





                        <BR> <BR>
                    </table>

                    <div class="form-group">

                        <div class="col-md-12">
                            <center>
                                @if($page=="Panier")
                                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Passer la commande</button>
                                @else
                                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider la commande</button>

                                @endif


                            </center>
                        </div>

                    </div>

                </div>
                {!! Form::close() !!}
                @else
                <script>

                    $(function () {
                        $('#myModal').modal('show');
                    });


                </script>
                <!-- Modal -->

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content col-md-10">
                            <div class="modal-header col-md-offset-3 ">

                                <h4 class="modal-title  ">Panier vide :(</h4>
                            </div>
                            <div class="modal-body ">
                                <img class="img_modal col-md-8"src="{{asset('local/assets/img/panier_vide.png')}}">
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <meta http-equiv="refresh" content="4;{{url('/')}}" />
                @endif

            </div>



            {!! Form::close() !!}


    </body>
</html>
@stop

