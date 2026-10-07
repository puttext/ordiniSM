@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			@include('admin._errori')
			@if ($user->exists)
				{!! Form::open(['url' => 'admin/utenti/'.$user->id, 'method' => 'PUT', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
			@else
				{!! Form::open(['url' => 'admin/utenti', 'method' => 'POST', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">{{ $user->exists ? 'Modifica utente' : 'Nuovo utente' }}</h3>
					{!! Form::submit('Salva', ['class' => 'btn btn-success btn-sm pull-right']) !!}
					<a href="{{ url('admin/utenti') }}" class="btn btn-default btn-sm pull-right" style="margin-right:5px">&larr; Torna agli utenti</a>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						{!! Form::label('name', 'Nome', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'maxlength' => 20, 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('email', 'E-mail', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::email('email', old('email', $user->email), ['class' => 'form-control', 'required']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('ruolo', 'Ruolo', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-3">
							@if ($se_stesso)
								<p class="form-control-static">{{ $ruoli[$user->ruolo] ?? $user->ruolo }} (non puoi cambiare il tuo ruolo)</p>
							@else
								{!! Form::select('ruolo', $ruoli, old('ruolo', $user->ruolo), ['class' => 'form-control']) !!}
							@endif
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('gas_id', 'GAS', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::select('gas_id', ['' => '-- nessuno --'] + $gas->all(), old('gas_id', $user->gas_id), ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('attore_id', 'Fornaio', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::select('attore_id', ['' => '-- nessuno --'] + $fornai->all(), old('attore_id', $user->attore_id), ['class' => 'form-control']) !!}
							<span class="help-block">Obbligatorio per i coordinatori: è il fornaio di cui gestiscono gli ordini.</span>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-4">
							{!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'new-password', 'required' => ! $user->exists]) !!}
							@if ($user->exists)
								<span class="help-block">Lascia vuoto per non cambiarla.</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('password_confirmation', 'Ripeti password', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-4">
							{!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
