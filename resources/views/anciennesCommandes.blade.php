@extends('layouts.master')
@section('content')
<!doctype html>
<html class="body2">
    <head>

    </head>
    <body>

        
            <br> <br>
            <br> <br>
            @if ($lesProduits != null)
            <div class="container">

                <div class="container_panier">

                    <h1 style="color:white;">Anciennes commandes</h1>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Numéro de commande</th>
                                <th>Date de la commande</th>
                                <th>Nom du produit</th>
                                <th>Reference</th>
                                <th>Description</th>
                                <th>Prix HT</th>
                                <th>Prix TTC</th>
                                <th>Produit</th>
                                <th>Quantité</th>



                            </tr>


                        </thead>






                        @foreach($lesProduits as $unProduit)
                        <?php $dossier = substr($unProduit->refprod, 0, 3) ?>
                        <tr>   
                            <td>{{$unProduit->refcom}}</td>
                            <td>{{$unProduit->date}}</td>
                            <td>{{ $unProduit->label }}</td> 

                            <td>{{ $unProduit->refprod }}</td>


                            <td>  
                                {!! $unProduit->description !!}

                            </td>
                            <td>
                                {{$unProduit->price}}€

                            </td>

                            <td>  
                                {{$unProduit->price_ttc}}€

                            </td>
                            <td > @if(file_exists("local/assets/Images_produits/$dossier/$unProduit->refprod.jpg"))    
                                <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unProduit->refprod, 0,3) }}/{{$unProduit->refprod}}.jpg" size=portrait>   </td>
                            @else
                        <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unProduit->refprod, 0,3) }}/{{ substr($unProduit->refprod, 0,3) }}.jpg" size=portrait>  
                        @endif


                        <td>
                            {{(int)$unProduit->quantite }}
                        </td>




                        @endforeach



                        </tr>





                        <BR> <BR>
                    </table>

                    <div class="form-group">



                    </div>

                </div>

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

                                <h4 class="modal-title  ">Aucune ancienne commande !</h4>
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






    </body>
</html>
@stop

