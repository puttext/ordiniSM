@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			@include('admin._errori')
			@if ($gas->exists)
				{!! Form::open(['url' => 'admin/gas/'.$gas->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			@else
				{!! Form::open(['url' => 'admin/gas', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">{{ $gas->exists ? 'Modifica GAS' : 'Nuovo GAS' }}</h3>
					{!! Form::submit('Salva', ['class' => 'btn btn-success btn-sm pull-right']) !!}
					<a href="{{ url('admin/gas') }}" class="btn btn-default btn-sm pull-right" style="margin-right:5px">&larr; Torna ai GAS</a>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						{!! Form::label('tipo', 'Tipo', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-3">
							{!! Form::select('tipo', $tipi, old('tipo', $gas->tipo), ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('nome', 'Nome', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('nome', old('nome', $gas->nome), ['class' => 'form-control', 'maxlength' => 20, 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('comune', 'Comune', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('comune', old('comune', $gas->comune), ['class' => 'form-control', 'maxlength' => 30, 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('indirizzo', 'Indirizzo', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('indirizzo', old('indirizzo', $gas->indirizzo), ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('ragione_sociale', 'Ragione sociale', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('ragione_sociale', old('ragione_sociale', $gas->ragione_sociale), ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				<div class="panel-footer">
					Nome e comune compaiono negli elenchi e negli ordini come "Nome (Comune)".
					I referenti si gestiscono dagli utenti, i fornai dalle associazioni.
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
