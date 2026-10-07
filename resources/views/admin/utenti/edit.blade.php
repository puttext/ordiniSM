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
							@if ($gas_associato)
								<div class="well well-sm" style="margin:8px 0 0">
									<a href="{{ url('admin/gas/'.$gas_associato->id.'/edit') }}" class="pull-right">Scheda GAS</a>
									<strong>{{ $gas_associato->full_name }}</strong>
									{{ $gas_associato->tipo == 'rivendita' ? '· Rivendita' : '' }}
									@if ($gas_associato->ragione_sociale)<br>{{ $gas_associato->ragione_sociale }}@endif
									@if ($gas_associato->indirizzo)<br>{{ $gas_associato->indirizzo }}@endif
									<br><em>Fornai {{ config('parametri.stagione') }}:</em>
									@forelse ($consegne_gas as $a)
										<div>{{ config('parametri.giorni_txt')[$a->giorno] ?? $a->giorno }}: {{ $a->fornaio ? $a->fornaio->ragione_sociale : 'Fornaio #'.$a->fornaio_id }} <small class="text-muted">({{ $a->valido_dal ? \Carbon\Carbon::parse($a->valido_dal)->format('d/m/Y') : '…' }} – {{ $a->valido_al ? \Carbon\Carbon::parse($a->valido_al)->format('d/m/Y') : '…' }})</small></div>
									@empty
										nessuno
									@endforelse
								</div>
							@endif
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('attore_id', 'Fornaio', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::select('attore_id', ['' => '-- nessuno --'] + $fornai->all(), old('attore_id', $user->attore_id), ['class' => 'form-control']) !!}
							<span class="help-block">Obbligatorio per i coordinatori: è il fornaio di cui gestiscono gli ordini.</span>
							@if ($fornaio_associato)
								<div class="well well-sm" style="margin:0">
									<a href="{{ url('admin/fornai/'.$fornaio_associato->id.'/edit') }}" class="pull-right">Scheda fornaio</a>
									<strong>{{ $fornaio_associato->ragione_sociale }}</strong> ({{ $fornaio_associato->nome }})
									<br>{{ $fornaio_associato->indirizzo ? $fornaio_associato->indirizzo.', ' : '' }}{{ $fornaio_associato->comune }}
									<br>Chiusura ordini {{ $fornaio_associato->anticipo_chiusura }} giorni prima
									<br><em>GAS {{ config('parametri.stagione') }}:</em>
									@forelse ($consegne_fornaio as $a)
										<div>{{ config('parametri.giorni_txt')[$a->giorno] ?? $a->giorno }}: {{ $a->gas ? $a->gas->full_name : 'GAS #'.$a->gas_id }} <small class="text-muted">({{ $a->valido_dal ? \Carbon\Carbon::parse($a->valido_dal)->format('d/m/Y') : '…' }} – {{ $a->valido_al ? \Carbon\Carbon::parse($a->valido_al)->format('d/m/Y') : '…' }})</small></div>
									@empty
										nessuno
									@endforelse
								</div>
							@endif
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
