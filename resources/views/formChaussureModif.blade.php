@extends('layouts.master')
@section('content')
<div>
    <br><br>
    <br><br>
    <div class="container">
        <div class="blanc">
            <h1>Modification d'un Manga</h1>
        </div>
    </div>
    <div class='well'>
        {!! Form::open(array('route' => array('postmodifierChaussure',$uneChaussure->IDCH,$type), 'method' => 'post')) !!}  
        <div class='form-group'>
            <BR> <BR>
            <div class="col-md-12  col-sm-12 well well-md">
                <div class='form-group'>
                    <label class='col-md-3 control-label'>Titre : </label> 
                    <div class='col-md-3'>
                        <input type='hidden' name='IDCH' value="{{$uneChaussure->IDCH or ''}} ">
                        <input type='text' name='LIBELLECH' value='{{$uneChaussure->LIBELLECH or ''}}'
                               class='form-control' required autofocus>
                    </div>
                </div>
                <BR> <BR>
                <div class='form-group'>
                    <label class='col-md-3 control-label'>Image : </label>
                    <div class='col-md-3'>
                        <input type='hidden' name="couverture" value=""/>
                        <input type='hidden' name="MAX_FILE_SIZE" value="204800"/>
                        <input type='file' name="couverture" class="btn btn-default pull-left" value="{{$uneChaussure->IMAGE}}"/>
                       
                    
                    </div>
                </div>
                <BR> <BR>
                
                <div class='form-group'>
                    <label class='col-md-3 control-label'>Prix : </label>
                    <div class='col-md-3'>
                        <input type='text' name='PRIXCH' value="{{$uneChaussure->PRIXCH or ''}}" class='form-control'>
                    </div>
                </div>
                <BR> <BR> 
                  <div class='form-group'>
                    <label class='col-md-3 control-label'>Stock : </label>
                    <div class='col-md-3'>
                        <input type='text' name='STOCKCH' value="{{$uneChaussure->STOCKCH or ''}}" class='form-control'>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-default btn-primary">
                            <span class="glyphicon glyphicon-ok"></span> Valider
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-default btn-primary" 
                                onclick="javascript: window.location = '{{url('/listerMangas')}}';">
                            <span class="glyphicon glyphicon-remove" ></span> Annuler</button>
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop
