@extends('layouts.master')
@section('content')
<!doctype html>
<html lang="fr">
    

<body onload="checkEmpty()">
<div>
    <br> <br>
    <br> <br>
    <div class="container">
        <div class="blanc">
            <br><br>
        </div>


        <div class="col-md-5">
            <div class="col-md-6">
                {{ $uneChaussure->LIBELLECH }}
                <br /><br />
                <a href="{{ url('/chaussure') }}/{{ $uneChaussure->IDCH }}">
                    <img  src="../../resources/images/{{$uneChaussure->IMAGE }}"</img>   
                </a>   
                <br>
                @if(isset($Client)) 
                @if ( $Client->LVLSECURITE == 1)
                <a href="{{ url('/modifierChaussure') }}/{{ $uneChaussure->IDCH }}/{{ $type }}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"> Modifier</span></a>
                <br>
                <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/supprimer')}}/{{  $uneChaussure->IDCH }}/{{ $type }}"
                   onclick="javascript:if (confirm('Suppression confirmée ?'))"> Supprimer
                </a>                  
                @endif
                @endif
                <br />
                {{ $uneChaussure->NOMMARQUE }}
                {{ $uneChaussure->PRIXCH }}
            </div>
            <br />
            <div class="menu-deroulant">
                @if ($uneChaussure->STOCKCH !=0)
                <?php echo "En stock "; ?>
                <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top" style="color: green" > </span>
                @endif
                @if ($uneChaussure->STOCKCH==0)
                <?php echo "Rupture "; ?>
                <span id="rupture" class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="top" style="color: red" > </span>
                @endif
                <br/>
            </div>

        </div>
        <div class="col-md-3">
            @if(Session::get('id') == 0)
            {!! Form::open(['url' => '/getLogin']) !!}
            @endif
            @if (Session::get('id') > 0)
            {!! Form::open(['url' => '/ajouterPanier']) !!}
            @endif
            <input name="idCli"  type="hidden" value="{{Session::get('id')}}">
            <input name="idCH"  type="hidden" value="{{$uneChaussure->IDCH}}"> 


            <select class='menu-deroulant' name='cbPointures' id="deroulant" onclick="checkEmpty();checkStock()" >
                <OPTION VALUE=0>Sélectionner une Taille</option>
                @foreach ($lesPointures as $uneP)
                {
                <OPTION  VALUE=' {{ $uneP->IDTAILLE }}'> {{ $uneP->IDTAILLE }}</OPTION>
                }
                @endforeach


            </select>
            </div>

  
  

            <div class="col-md-3">
                <button type="submit" class="btn btn-success glyphicon glyphicon-shopping-cart" id="ajouter"  disabled="disabled"> Ajouter au panier</button>
            {!! Form::close() !!}
            </div>

        <br />
           
            <div class="menu-deroulant">
                <br />
                <p class="glyphicon glyphicon-ok"> Livraison en 24h</p>
                <br />
                <p class="glyphicon glyphicon-ok"> 30 jours pour changer d'avis</p> 
                <br />
                <p class="glyphicon glyphicon-ok"> Retour gratuit</p>
            </div>

    </div>
</div>
@stop


    </body>
</html>



