@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._errori')
			{!! Form::open(['url' => 'admin/stagioni', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Nuova stagione</h3>
					{!! Form::submit('Crea stagione', ['class' => 'btn btn-success btn-sm pull-right']) !!}
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						{!! Form::label('nome', 'Stagione', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-3">
							{!! Form::text('nome', $nuova->nome, ['class' => 'form-control', 'placeholder' => 'AAAA-AAAA']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('dal', 'Valida dal', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-3">
							{!! Form::date('dal', $nuova->dal, ['class' => 'form-control']) !!}
						</div>
						{!! Form::label('al', 'al', ['class' => 'col-md-1 control-label']) !!}
						<div class="col-md-3">
							{!! Form::date('al', $nuova->al, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div class="checkbox">
								<label>{!! Form::checkbox('corrente', 1, true) !!} Rendi subito corrente la nuova stagione</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Associazioni fornai-GAS da copiare</h3>
					<div class="pull-right">
						Copia dalla stagione
						{!! Form::select('origine', $stagioni, $origine ? $origine->nome : null, ['id' => 'sel_origine']) !!}
					</div>
					<div class="clearfix"></div>
				</div>
				@if ($associazioni->isEmpty())
					<div class="panel-body">Nessuna associazione da copiare.</div>
				@else
				<table class="table table-condensed table-striped">
					<thead>
						<tr>
							<th><input type="checkbox" id="tutte" checked title="Seleziona tutte"></th>
							<th>Fornaio</th>
							<th>Giorno</th>
							<th>GAS</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($associazioni as $a)
						<tr>
							<td>{!! Form::checkbox('associazioni[]', $a->id, true, ['class' => 'associazione']) !!}</td>
							<td>{{ $a->fornaio }}</td>
							<td>{{ $a->giorno_txt }}</td>
							<td>{{ $a->gas }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="panel-footer">
					Le associazioni selezionate vengono copiate nella nuova stagione con le date indicate sopra.
					Togli la spunta ai GAS che non partecipano più; per aggiungerne di nuovi usa la gestione delle associazioni.
				</div>
				@endif
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@section('page-scripts')
<script>
	$(document).ready(function(){
		$('#sel_origine').on('change', function () {
			window.location = '?origine=' + $(this).val();
		});
		$('#tutte').on('change', function () {
			$('.associazione').prop('checked', $(this).prop('checked'));
		});
	});
</script>
@endsection
