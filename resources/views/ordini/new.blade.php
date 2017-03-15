@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {!! Form::open([
	    	'method' => 'POST', 
	    	'url' => URL::to('ordini'),
	    	'class' => 'form-vertical',
		]) !!}
    
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ordini Pane</div>

                <div class="panel-body">
                   	{!! Form::hidden("pane",true) !!}
                   	{!! Form::text("anno",$anno,["class"=>"Form-control"]) !!}
                	{!! Form::select("mese",$mesi,null,['class'=>'selectpicker', 'data-none-selected-text'=>'-- Seleziona il mese --']) !!}
                	{!! Form::submit("Crea", ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row">
        {!! Form::open([
	    	'method' => 'POST', 
	    	'url' => URL::to('ordini'),
	    	'class' => 'form-horizontal',
		]) !!}
    
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ordine Farine</div>

                <div class="panel-body">
                	{!! Form::label("data","Data",["class"=>"col-md-2 control-label"]) !!}
					<div class="col-md-3">
                   		{!! Form::text("data",null,["class"=>"form-control"]) !!}
                   	</div>
                   	{!! Form::hidden("farina",true) !!}
                	{!! Form::submit("Crea", ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row">
        {!! Form::open([
	    	'method' => 'POST', 
	    	'url' => URL::to('ordini'),
	    	'class' => 'form-horizontal',
		]) !!}
    
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Altro Ordine</div>

                <div class="panel-body">
                	{!! Form::label("data","Data consegna",["class"=>"col-md-2 control-label"]) !!}
					<div class="col-md-3">
                   		{!! Form::text("data",null,["class"=>"form-control"]) !!}
                   	</div>
                	{!! Form::label("chiusura","Data chiusura",["class"=>"col-md-2 control-label"]) !!}
					<div class="col-md-3">
                   		{!! Form::text("chiusura",null,["class"=>"form-control"]) !!}
                   	</div>
                	{!! Form::submit("Crea", ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('page-script')
<script>
	$(document).ready(function(){
		$(".selectpicker").selectpicker();
	}
</script>
@endsection
