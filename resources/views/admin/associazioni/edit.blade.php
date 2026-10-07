@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			@include('admin._errori')
			@if ($associazione->id)
				{!! Form::open(['url' => 'admin/associazioni/'.$associazione->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			@else
				{!! Form::open(['url' => 'admin/associazioni', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">{{ $associazione->id ? 'Modifica associazione' : 'Nuova associazione' }}</h3>
					{!! Form::submit('Salva', ['class' => 'btn btn-success btn-sm pull-right']) !!}
					<a href="{{ url('admin/associazioni?stagione='.$associazione->stagione) }}" class="btn btn-default btn-sm pull-right" style="margin-right:5px">&larr; Torna alle associazioni</a>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					@if ($associazione->id)
						{{-- in modifica stagione e GAS non si cambiano --}}
						<div class="form-group">
							<label class="col-md-3 control-label">Stagione</label>
							<div class="col-md-6"><p class="form-control-static">{{ $associazione->stagione }}</p></div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">GAS</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $gas[$associazione->gas_id] ?? 'GAS #'.$associazione->gas_id }}</p>
								{!! Form::hidden('gas_id', $associazione->gas_id) !!}
							</div>
						</div>
					@else
						<div class="form-group">
							{!! Form::label('stagione', 'Stagione', ['class' => 'col-md-3 control-label']) !!}
							<div class="col-md-3">
								{!! Form::select('stagione', $stagioni, old('stagione', $associazione->stagione), ['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('gas_id', 'GAS', ['class' => 'col-md-3 control-label']) !!}
							<div class="col-md-6">
								{!! Form::select('gas_id', $gas, old('gas_id', $associazione->gas_id), ['class' => 'form-control', 'placeholder' => '-- Seleziona --']) !!}
							</div>
						</div>
					@endif
					<div class="form-group">
						{!! Form::label('fornaio_id', 'Fornaio', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-6">
							{!! Form::select('fornaio_id', $fornai, old('fornaio_id', $associazione->fornaio_id), ['class' => 'form-control', 'placeholder' => '-- Seleziona --']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('giorno', 'Giorno di consegna', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-3">
							{!! Form::select('giorno', $giorni, old('giorno', $associazione->giorno), ['class' => 'form-control', 'placeholder' => '-- Seleziona --']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('valido_dal', 'Valida dal', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-3">
							{!! Form::date('valido_dal', old('valido_dal', $associazione->valido_dal), ['class' => 'form-control']) !!}
						</div>
						{!! Form::label('valido_al', 'al', ['class' => 'col-md-1 control-label']) !!}
						<div class="col-md-3">
							{!! Form::date('valido_al', old('valido_al', $associazione->valido_al), ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				<div class="panel-footer">
					Il GAS vede il fornaio e riceve il pane nel giorno indicato solo nel periodo di validità.
					@if (! $associazione->id)
						Se cambi stagione, ricorda di adeguare anche le date.
					@endif
				</div>
			</div>
			{!! Form::close() !!}

			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">Fornaio</div>
						<div class="panel-body" id="dettaglio_fornaio"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">GAS</div>
						<div class="panel-body" id="dettaglio_gas"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page-scripts')
<script>
	$(document).ready(function () {
		var dettagli = @json($dettagli);

		function mostra(scheda, $box) {
			$box.empty();
			if (! scheda) {
				$box.append($('<p class="text-muted"></p>').text('Nessuna selezione'));
				return;
			}
			var $dl = $('<dl class="dl-horizontal" style="margin-bottom:0"></dl>').appendTo($box);
			$.each(scheda.campi, function (etichetta, valore) {
				if (valore === null || valore === '') {
					return;
				}
				$('<dt></dt>').text(etichetta).appendTo($dl);
				$('<dd></dd>').text(valore).appendTo($dl);
			});
			$('<dt></dt>').text('Referenti').appendTo($dl);
			var $dd = $('<dd></dd>').appendTo($dl);
			if (! scheda.referenti.length) {
				$dd.append($('<span class="text-muted"></span>').text('nessuno'));
			}
			$.each(scheda.referenti, function (i, r) {
				var $riga = $('<div></div>').text(r.nome + ' ').appendTo($dd);
				$('<a></a>').attr('href', 'mailto:' + r.email).text(r.email).appendTo($riga);
				if (r.ruolo !== 'referente') {
					$riga.append(' ').append($('<span class="label label-default"></span>').text(r.ruolo));
				}
			});
		}

		$('select[name=fornaio_id]').on('change', function () {
			mostra(dettagli.fornai[$(this).val()], $('#dettaglio_fornaio'));
		}).trigger('change');
		$('[name=gas_id]').on('change', function () {
			mostra(dettagli.gas[$(this).val()], $('#dettaglio_gas'));
		}).trigger('change');
	});
</script>
@endsection
