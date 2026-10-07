@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			@include('admin._errori')
			@if ($fornaio->exists)
				{!! Form::open(['url' => 'admin/fornai/'.$fornaio->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			@else
				{!! Form::open(['url' => 'admin/fornai', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">{{ $fornaio->exists ? 'Modifica fornaio' : 'Nuovo fornaio' }}</h3>
					{!! Form::submit('Salva', ['class' => 'btn btn-success btn-sm pull-right']) !!}
					<a href="{{ url('admin/fornai') }}" class="btn btn-default btn-sm pull-right" style="margin-right:5px">&larr; Torna ai fornai</a>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						{!! Form::label('ragione_sociale', 'Ragione sociale', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('ragione_sociale', old('ragione_sociale', $fornaio->ragione_sociale), ['class' => 'form-control', 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('nome', 'Nome', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('nome', old('nome', $fornaio->nome), ['class' => 'form-control', 'maxlength' => 20, 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('comune', 'Comune', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('comune', old('comune', $fornaio->comune), ['class' => 'form-control', 'maxlength' => 30]) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('indirizzo', 'Indirizzo', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('indirizzo', old('indirizzo', $fornaio->indirizzo), ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('anticipo_chiusura', 'Chiusura ordini', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-2">
							{!! Form::number('anticipo_chiusura', old('anticipo_chiusura', $fornaio->exists ? $fornaio->anticipo_chiusura : 2), ['class' => 'form-control', 'min' => 0, 'max' => 30, 'required']) !!}
						</div>
						<div class="col-md-4"><p class="form-control-static">giorni prima della consegna</p></div>
					</div>
				</div>
				<div class="panel-footer">
					I referenti si gestiscono dagli utenti, i GAS dalle associazioni.
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
