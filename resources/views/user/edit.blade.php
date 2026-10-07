@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('admin._errori')
			{!! Form::open(['route' => ['user.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">I tuoi dati</h3>
					{!! Form::submit('Salva', ['class' => 'btn btn-success btn-sm pull-right']) !!}
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						{!! Form::label('name', 'Nome', ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'maxlength' => 20, 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('email', 'E-mail', ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
							{!! Form::email('email', old('email', $user->email), ['class' => 'form-control', 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Ruolo</label>
						<div class="col-md-6"><p class="form-control-static">{{ $user->ruolo }}</p></div>
					</div>
					@if ($user->gas)
					<div class="form-group">
						<label class="col-md-4 control-label">GAS</label>
						<div class="col-md-6"><p class="form-control-static">{{ $user->gas->full_name }}</p></div>
					</div>
					@endif
					@if ($user->referenza)
					<div class="form-group">
						<label class="col-md-4 control-label">Fornaio</label>
						<div class="col-md-6"><p class="form-control-static">{{ $user->referenza->ragione_sociale }}</p></div>
					</div>
					@endif
					<div class="form-group">
						{!! Form::label('password', 'Nuova password', ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-4">
							{!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
							<span class="help-block">Lascia vuoto per non cambiarla.</span>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('password_confirmation', 'Ripeti password', ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-4">
							{!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
						</div>
					</div>
				</div>
				<div class="panel-footer">Ruolo, GAS e fornaio li cambia un gestore da Amministrazione → Utenti.</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
