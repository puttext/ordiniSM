@extends('layouts.app')

@section('content')
<div class="container">
	{!! Form::model($user,[
		'method' => 'PATCH', 
		'route' => ['user.update',$user->id],
		'class' => 'form-vertical',
	]) !!}
    <!-- <div class="row"> -->
	<div class="panel panel-default col-md-6 pull-center">
        <div class="panel-heading">
			<h3 class="panel-title text-center col-md11">Modifica Utente</h3>
	    	{!! Form::submit("Salva", ['class'=>'col-md1 btn btn-success pull-right']) !!}
	    	<div class="clearfix"></div>
	    </div>
		<div class="panel-body">
			<div class="form-group">
				{!! Form::label("name","Nome",["class"=>"col-md-6 control-label"]) !!}
				<div class="col-md-6">
					{!! Form::text("name",$user->name,["class"=>"form-control datepicker",'data-provide'=>'']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label("email","E-mail",["class"=>"col-md-6 control-label"]) !!}
				<div class="col-md-6">
					{!! Form::text("email",$user->email,["class"=>"form-control",$disable]) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label("ruolo","Ruolo",["class"=>"col-md-6 control-label"]) !!}
				<div class="col-md-6">
					{!! Form::select("ruolo",$ruoli,$user->ruolo,['class'=>'selectpicker', 'data-none-selected-text'=>'-- Seleziona --', $disable]) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label("gas_id","GAS",["class"=>"col-md-6 control-label"]) !!}
				<div class="col-md-6">
					{!! Form::select("gas_id",$gas,$user->gas_id,['class'=>'selectpicker', 'data-none-selected-text'=>'-- Seleziona --']) !!}
				</div>
			</div>
			<div class="form-group">
				{!! Form::label("attore_id","Referente per",["class"=>"col-md-6 control-label"]) !!}
				<div class="col-md-6">
					{!! Form::select("attore_id",$fornai,$user->attore_id,['class'=>'selectpicker', 'data-none-selected-text'=>'-- Seleziona --',$disable_coord]) !!}
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
