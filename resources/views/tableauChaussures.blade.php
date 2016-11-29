@extends('layouts.master')
@section('content')
<div>
        <br> <br>
        <br> <br>
        <div class="container">
            <div class="blanc">
                <h1>Liste des chaussures</h1>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom du modèle</th>
                        <th>Marque</th>
                        <th>Prix</th>
                        <th>Type de modèle</th>
                        <th>Pour qui ?</th>
                        <th>Pour quand ?</th>
                        <th>Image</th>
                        <th>Stock </th>
                  
                   @if(isset($Client))     
                        @if ( $Client->LVLSECURITE == 1)
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        @endif
                   @endif
                         
                    </tr>
                </thead>
                @foreach($lesChaussures as $uneChaussure)
                <tr>   
                    <td> {{ $uneChaussure->LIBELLECH }}  </td> 
                    <td> {{ $uneChaussure->NOMMARQUE }} </td>
                    <td> {{ $uneChaussure->PRIXCH }}</td>
                    <td>  
                        {{ $uneChaussure->LIBELLETYPE }}
                    </td>
                    <td>  
                        {{$uneChaussure->LIBELLECAT}}
                    </td>
                    <td> {{$uneChaussure->LIBELLESAISON }} </td>
                    <td> <img href src="resources/images/{{$uneChaussure->IMAGE }}"</img></td>
         
                    <td>  @if ($uneChaussure->STOCKCH !=0)
                        
                         <?php echo " en stock "; ?>
                             <span class="glyphicon glyphicon-ok-sign" data-toggle="tooltip" data-placement="top" </span>
                           
                            
                         @endif
                          @if ($uneChaussure->STOCKCH==0)
                          <?php echo " Rupture "; ?>
                             <span class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="top" </span>
                            
                         @endif
                    </td>
                      @if(isset($Client)) 
                          @if ( $Client->LVLSECURITE == 1)
                      <td style="text-align:center;"><a href="{{ url('/modifierChaussure') }}/{{ $uneChaussure->IDCH }}">
                              <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a></td>
                     <td style="text-align:center;">
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{ url('/supprimer')}}/{{  $uneChaussure->IDCH }}/{{ $type }}"
                       onclick="javascript:if (confirm('Suppression confirmée ?'))">
                    </a>
                </td>                     
                              @endif
                              @endif
                </tr>
                @endforeach
                <BR> <BR>
            </table>
            <?php echo $lesChaussures->render(); ?>
        </div>
    </div>
@stop


