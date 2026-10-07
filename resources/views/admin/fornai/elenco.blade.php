@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			@include('admin._errori')
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Fornai</h3>
					<a href="{{ url('admin/fornai/create') }}" class="btn btn-success btn-sm pull-right">Aggiungi fornaio</a>
					<div class="clearfix"></div>
				</div>
				<table class="table table-condensed table-striped datatable">
					<thead>
						<tr>
							<th>Ragione sociale</th>
							<th>Nome</th>
							<th>Comune</th>
							<th>Chiusura ordini</th>
							<th>Referenti</th>
							<th>GAS {{ config('parametri.stagione') }}</th>
							<th class="no-sort"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($elenco as $f)
						<tr>
							<td>{{ $f->ragione_sociale }}</td>
							<td>{{ $f->nome }}</td>
							<td>{{ $f->comune }}</td>
							<td data-order="{{ $f->anticipo_chiusura }}">{{ $f->anticipo_chiusura }} giorni prima</td>
							<td>
								@foreach ($referenti->get($f->id, []) as $r)
									<div>{{ $r->name }}</div>
								@endforeach
							</td>
							<td>{{ $gas[$f->id] ?? 0 }}</td>
							<td class="text-right" style="white-space:nowrap">
								<a href="{{ url('admin/fornai/'.$f->id.'/edit') }}" class="btn btn-default btn-xs">Modifica</a>
								@if (empty($utilizzi[$f->id]))
									{!! Form::open(['url' => 'admin/fornai/'.$f->id, 'method' => 'DELETE', 'style' => 'display:inline', 'class' => 'elimina']) !!}
										{!! Form::submit('Elimina', ['class' => 'btn btn-danger btn-xs']) !!}
									{!! Form::close() !!}
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="panel-footer">Si possono eliminare solo i fornai senza associazioni, ordini, prodotti e utenti.</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page-scripts')
@include('admin._datatable')
<script>
	$(document).ready(function(){
		$('form.elimina').on('submit', function () {
			return confirm('Eliminare questo fornaio?');
		});
	});
</script>
@endsection
