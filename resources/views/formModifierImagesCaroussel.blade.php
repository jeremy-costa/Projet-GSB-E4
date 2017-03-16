@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    <head>
        <script language="javascript">
            function toggleDiv(divid) {
                if (document.getElementById(divid).style.display == 'none') {
                    document.getElementById(divid).style.display = 'block';
                } else {
                    document.getElementById(divid).style.display = 'none';
                }
            }
            
           
            function SousFamilles(idFamille)
            {
             

                
               document.location.href = "{{url('/SousFamilles')}}/" + idFamille;
                
               
          
            }
        
        </script>
    </head>
    <body onload="checkEmpty()">

        </br>
        </br>





        <div class="col-md-12 stats">
            <div class="col-md-12">

                <div class="blanc">
                    <h1 style="color:black;">Page d'administration</h1>
                </div>

                <br/>
                <h1>Ajouter un produit : </h1>
                <br/>

                <div class="col-md-12 ">
                    <a href="javascript:;" onmousedown="toggleDiv('volet_ajout_produit');">Afficher/masquer les produits</a>
                    <div id ="volet_ajout_produit">
                        <form action ="{{ route('AjoutProduit')}}" method="post" enctype="multipart/form-data">
                             <div class="col-md-8 col-md-offset-2">
                                <select class='form-control col-sm-1'  id="Famille" name='Famille'  onclick="checkEmpty();">
                                   
                                    <OPTION VALUE=0>Choisissez la famille :</option>
                              
                                    
                                    @foreach ($lesFamilles as $uneF)
                                    {
                                    <OPTION onClick="SousFamilles({!!$uneF->rowid !!});" VALUE="{{ $uneF->rowid}}"  @if(isset($NomFamille)) @if($uneF->label==$NomFamille->label) selected="selected"  @endif @endif   > {{ $uneF->label}}</OPTION>
                                    }
                                    @endforeach
                                
                                </select>
                                <select class='form-control col-sm-1'  id="SousFamille"name='SousFamille' onclick="checkEmpty();">
                                    <OPTION VALUE=0>Choisissez la sous famille :</option>
                                    @foreach ($lesSousFamilles as $uneSF)
                                    {
                                    <OPTION VALUE='{{ $uneSF->rowid}}'> {{ $uneSF->label}}</OPTION>
                                    }
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2 col-md-offset-1">
                                    <label class=' control-label'>Réference : </label> 
                                    <input type='text' name='Reference' id="Reference"value='' class='form-control' onclick="checkEmpty();">
                                </div>
                                <div class="col-md-2">
                                    <label class=' control-label'>Label : </label> 
                                    <input type='text' name='Label' id="Label"class='form-control' onclick="checkEmpty();">
                                </div>

                                <div class="col-md-2">
                                    <label class=' control-label'>Description : </label> 
                                    <input type='text' name='Description' id="Description"value='' class='form-control' onclick="checkEmpty();">
                                </div>

                                <div class="col-md-2">
                                    <label class=' control-label'>Prix TTC : </label> 
                                    <input type='text' name='PrixTTC' id="PrixTTC"value=''class='form-control' onclick="checkEmpty();">
                                </div>
                                <div class='col-md-2'>
                                    <label class='col-md-3 control-label'>Image : </label>

                                    <input id="Image" type="file" name="file" id="file" onclick="checkEmpty();" />                       
                                    <input type='hidden' value="{{ csrf_token()}}"name="_token"/>

                                </div>
                            </div>
                            <div class="col-md-12"><br/></div>
                            <div class="col-md-12">
                                <center>
                                    <button type="submit" class="btn btn-default btn-primary" id="Ajouter"  disabled="disabled">Ajouter le produit</button>
                                </center>
                            </div>
                        </form>
                    </div>

                </div>
                <br/>
                <br/>
                <div class="col-md-12">
                    <h1>Supprimer un produit</h1>
                    <a href="javascript:;" onmousedown="toggleDiv('volet');">Afficher/masquer l'ajout de produits</a>
                    <div id="volet">
                        <table class="table table-bordered table-striped">

                            @foreach($lesProduitsAdd as $unP)


                            <div class="col-md-3  position_produits_caroussel">

                                <div class="col-md-12  famille" >
                                    <strong class="nom_famille">
                                        <br>
                                        <center>
                                            {{$unP->label }}
                                        </center>


                                        <br>
                                    </strong>
                                    <div>
                                        <center>
                                            Reference : {{$unP->ref}}
                                        </center>
                                    </div>
                                    <div>
                                        <center>
                                            Prix HT : {{round($unP->price,2)}}€
                                        </center>
                                    </div>
                                    <div>
                                        <center>
                                            Prix TTC : {{round($unP->price_ttc,2)}}€
                                        </center>
                                    </div>
                                    <div class="col-md-6 position_img_produit">

                                        <img class="col-md-12  img_produit"  src="{{asset('/local/assets/Images_produits/')}}/{{ substr($unP->ref, 0,3) }}/{{$unP->ref}}.jpg" size=portrait>  

                                    </div>

                                    <br><br>
                                    <a class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer" style="color: purple" href="{{ url('/supprimerProduitAdd')}}/{{$unP->rowid }}/{{$unP->ref}}"
                                       onclick="javascript:if (confirm('Suppression confirmée ?'))"> Supprimer
                                    </a>

                                    <br>

                                </div>

                                </a>
                            </div>

                            @endforeach
                        </table>
                    </div>


                </div>

                <div class="col-md-12 ">
                    <h1>Les statistiques de visites : </h1>
                    <br/>
                    <a href="javascript:;" onmousedown="toggleDiv('volet_stats');">Afficher/masquer les statistiques</a>
                    <div id ="volet_stats">
                        {!! Form::open(['url' => 'getLesStatsPeriode']) !!}
                        <div class="col-md-8 col-md-offset-2">

                            <select class='form-control col-sm-1'  name='cbPeriode'>
                                <OPTION VALUE=0>Période</option>
                                @foreach ($AnneesMois as $uneAM)
                                {
                                <OPTION VALUE='{{ $uneAM->annee}} {{$uneAM->mois}}'> {{ $uneAM->annee}}/ {{$uneAM->mois}}</OPTION>
                                }
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-default btn-primary">Filtrer</button>
                        </div>
                        {!! Form::close() !!}

                        <table class="col-md-12">
                            <tr>
                                <th class="col-md-2">Page Visitée</th>
                                <th class="col-md-2">Année</th>
                                <th class="col-md-2">Mois</th>
                                <th class="col-md-2">Nombre de visites</th>
                            </tr>
                            @foreach($lesStats as $unS)
                            <tr>
                                <td class="col-md-2">{{$unS->pageVisitee}}</td>
                                <td class="col-md-2">{{$unS->annee}}</td>
                                <td class="col-md-2">{{$unS->mois}}</td>
                                <td class="col-md-2">{{$unS->nbvisite}} </td>
                            </tr>
                            @endforeach
                        </table>

                        <BR> <BR>
                    </div>
                </div>


            </div>



        </div>

        <br/>
        <br/>



        <div class="col-md-12 stats">
            <h1>Les images du caroussel : </h1>
            <a href="javascript:;" onmousedown="toggleDiv('volet_image_caroussel');">Afficher/masquer les images du caroussel</a>
            <div id ="volet_image_caroussel">


                <form action ="{{ route('updateImageTexteCaroussel')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12  col-sm-12 well well-md">
                        <div class='form-group'>
                            <p>Première Image du caroussel :</p>

                            <div class='col-md-12'>
                                <div class="col-md-3">
                                    <label class=' control-label'>Texte : </label> 
                                    <input type='text' name='Texte' value='{{$lesImagesTextes1->texte or ''}}'class='form-control'>
                                </div>

                                <div class='col-md-3'>
                                    <label class='col-md-3 control-label'>Image : </label>

                                    <input type="file" name="file" id="file" />                       
                                    <input type='hidden' value="{{ csrf_token()}}"name="_token"/>

                                </div>
                                <div class="col-md-3">
                                    <label for="idselect">Etat : </label>
                                    <select name="etat" id="idselect">


                                        <option value="1" selected="selected">Active</option>


                                    </select>

                                </div>
                                <div class="col-md-12 ">
                                    <img  class="image_modification_caroussel" src="{{asset('/local/assets/img/')}}/{{$lesImagesTextes1->image }}?<?php echo time() ?>">
                                </div>
                                <input type='hidden' name="numero" value="{{$lesImagesTextes1->numeroImage }}"/>
                                <input type='hidden' name="image" value="{{$lesImagesTextes1->image }}"/>
                                <button type="submit" class="btn btn-default btn-primary">Confirmer les modifications</button>
                            </div>

                        </div>

                    </div>
                </form>



                <form action ="{{ route('updateImageTexteCaroussel')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12  col-sm-12 well well-md">

                        <p>Deuxieme Image du caroussel :</p>

                        <div class='col-md-12'>
                            <div class="col-md-3">
                                <label class=' control-label'>Texte : </label> 
                                <input type='text' name='Texte' value='{{$lesImagesTextes2->texte or ''}}'
                                       class='form-control' >
                            </div>

                            <div class='col-md-3'>
                                <label class='col-md-3 control-label'>Image : </label>
                                <input type="file" name="file" id="file" />                       
                                <input type='hidden' value="{{ csrf_token()}}"name="_token"/>
                            </div>
                            <div class="col-md-3">
                                <label for="idselect">Etat : </label>
                                <select name="etat" id="idselect">
                                    <option value="">Selectionnez l'etat</option>
                                    @if($lesImagesTextes2->active==1)
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Inactive</option>
                                    @else
                                    <option value="1" >Active</option>
                                    <option value="0" selected="selected">Inactive</option>
                                    @endif

                                </select>

                            </div>
                            <div class="col-md-12 ">
                                <img  class="image_modification_caroussel" src="{{asset('/local/assets/img/')}}/{{$lesImagesTextes2->image }}?<?php echo time() ?>">
                            </div>
                            <input type='hidden' name="numero" value="{{$lesImagesTextes2->numeroImage }}"/>
                            <input type='hidden' name="image" value="{{$lesImagesTextes2->image }}"/>
                            <button type="submit" class="btn btn-default btn-primary">Confirmer les modifications</button>

                        </div>



                    </div>

                </form>
                @if (isset($lesImagesTextes3))
                <form action ="{{ route('updateImageTexteCaroussel')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12  col-sm-12 well well-md">

                        <p>Troisème Image du caroussel :</p>

                        <div class='col-md-12'>
                            <div class="col-md-3">
                                <label class=' control-label'>Texte : </label> 
                                <input type='text' name='Texte' value='{{$lesImagesTextes3->texte or ''}}'
                                       class='form-control'>
                            </div>

                            <div class='col-md-3'>
                                <label class='col-md-3 control-label'>Image : </label>


                                <input type="file" name="file" id="file" />                      
                                <input type='hidden' value="{{ csrf_token()}}"name="_token"/>


                            </div>
                            <div class="col-md-3">
                                <label for="idselect">Etat : </label>
                                <select name="etat" id="idselect">
                                    <option value="">Selectionnez l'etat</option>
                                    @if($lesImagesTextes3->active==1)
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Inactive</option>
                                    @else
                                    <option value="1" >Active</option>
                                    <option value="0" selected="selected">Inactive</option>
                                    @endif
                                </select>

                            </div>
                            @if($lesImagesTextes3->image !=null)
                            <div class="col-md-12 ">
                                <img  class="image_modification_caroussel" src="{{asset('/local/assets/img/')}}/{{$lesImagesTextes3->image }}?<?php echo time() ?>">
                            </div>
                            @else
                            Il n'y a pas de troisième image.
                            @endif
                            <input type='hidden' name="numero" value="{{$lesImagesTextes3->numeroImage }}"/>
                            <input type='hidden' name="image" value="{{$lesImagesTextes3->image }}"/>
                            <button type="submit" class="btn btn-default btn-primary">Confirmer les modifications</button>    

                        </div>



                    </div>
                </form>
                @endif



                @if (isset($lesImagesTextes4))
                <form action ="{{ route('updateImageTexteCaroussel')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12  col-sm-12 well well-md">

                        <p>Quatrième Image du caroussel :</p>

                        <div class='col-md-12'>
                            <div class="col-md-3">
                                <label class=' control-label'>Texte : </label> 
                                <input type='text' name='Texte' value='{{$lesImagesTextes4->texte or ''}}'
                                       class='form-control' >
                            </div>

                            <div class='col-md-3'>
                                <label class='col-md-3 control-label'>Image : </label>

                                <input type="file" name="file" id="file" />                       
                                <input type='hidden' value="{{ csrf_token()}}"name="_token"/>

                            </div>
                            <div class="col-md-3">
                                <label for="idselect">Etat : </label>
                                <select name="etat" id="idselect">
                                    <option value="">Selectionnez l'etat</option>
                                    @if($lesImagesTextes4->active==1)
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Inactive</option>
                                    @else
                                    <option value="1" >Active</option>
                                    <option value="0" selected="selected">Inactive</option>
                                    @endif

                                </select>

                            </div>
                            @if($lesImagesTextes4->image !=null)
                            <div class="col-md-12 ">
                                <img  class="image_modification_caroussel" src="{{asset('/local/assets/img/')}}/{{$lesImagesTextes4->image }}?<?php echo time() ?>">
                            </div>
                            @else
                            Il n'y a pas de quatrième image.
                            @endif
                            <input type='hidden' name="numero" value="{{$lesImagesTextes4->numeroImage }}"/>
                            <input type='hidden' name="image" value="{{$lesImagesTextes4->image }}"/>
                            <button type="submit" class="btn btn-default btn-primary">Confirmer les modifications</button>

                        </div>



                    </div>
                </form>
                @endif
                <form action ="{{ route('updateImageTexteCaroussel')}}" method="post" enctype="multipart/form-data">
                    @if (isset($lesImagesTextes5))
                    <div class="col-md-12  col-sm-12 well well-md">

                        <p>Cinquième Image du caroussel :</p>

                        <div class='col-md-12'>
                            <div class="col-md-3">
                                <label class=' control-label'>Texte : </label> 
                                <input type='text' name='Texte' value='{{$lesImagesTextes5->texte or ''}}'
                                       class='form-control' >
                            </div>

                            <div class='col-md-3'>
                                <label class='col-md-3 control-label'>Image : </label>

                                <input type="file" name="file" id="file" />                       
                                <input type='hidden' value="{{ csrf_token()}}"name="_token"/>

                            </div>
                            <div class="col-md-3">
                                <label for="idselect">Etat : </label>
                                <select name="etat" id="idselect">
                                    <option value="">Selectionnez l'etat</option>
                                    @if($lesImagesTextes5->active==1)
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Inactive</option>
                                    @else
                                    <option value="1" >Active</option>
                                    <option value="0" selected="selected">Inactive</option>
                                    @endif

                                </select>

                            </div>

                            @if($lesImagesTextes5->image !=null)
                            <div class="col-md-12 ">
                                <img  class="image_modification_caroussel" src="{{asset('/local/assets/img/')}}/{{$lesImagesTextes5->image }}?<?php echo time() ?>">
                            </div>
                            @else
                            Il n'y a pas de cinquième image.
                            @endif
                            <input type='hidden' name="numero" value="{{$lesImagesTextes5->numeroImage }}"/>
                            <input type='hidden' name="image" value="{{$lesImagesTextes5->image }}"/>
                            <button type="submit" class="btn btn-default btn-primary">Confirmer les modifications</button>

                        </div>



                    </div>
                    @endif
                </form>

            </div>
        </div>

    </body>
</html>
@stop