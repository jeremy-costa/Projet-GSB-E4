<!--View qui sert à voir son profil.-->
@extends('layouts.master')
@section('content')

<div class="container">
      <div class="row">
   
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   {!! Form::open(['url' => '/postmodificationProfil']) !!}
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$unC->PRENOMCLI}} {{$unC->NOMCLI}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img  src="../../resources/images/user.jpg" class="img-circle img-responsive"> </div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      
                        <tr>
                        <td>Adresse</td>
                        <td>{{$unC->ADRESSECLI}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{$unC->MAIL}}</a></td>
                      </tr>
                        <td>Numero de telephone</td>
                        <td>0{{$unC->NUMTELCLI}}<br>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
               
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                         
                            
                     <button type="submit"data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Editer profil</button>
                     
                       
                     <a href="{{url( '/getAnciennesCommandes') }}"data-original-title="Se deconnecter" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-shopping-cart">Anciennes commandes</i></a>
                            <a href="{{url( '/getLogout') }}"data-original-title="Se deconnecter" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-off"> Se deconnecter</i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>