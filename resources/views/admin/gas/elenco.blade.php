@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			@include('admin._errori')
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">GAS e rivendite</h3>
					<a href="{{ url('admin/gas/create') }}" class="btn btn-success btn-sm pull-right">Aggiungi GAS</a>
					<div class="clearfix"></div>
				</div>
				<table class="table table-condensed table-striped datatable">
					<thead>
						<tr>
							<th>Nome</th>
							<th class="filtro">Tipo</th>
							<th class="filtro">Comune</th>
							<th>Referenti</th>
							<th>Fornai {{ config('parametri.stagione') }}</th>
							<th class="no-sort"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($elenco as $g)
						<tr>
							<td>{{ $g->nome }}</td>
							<td>{{ $g->tipo == 'rivendita' ? 'Rivendita' : 'GAS' }}</td>
							<td>{{ $g->comune }}</td>
							<td>
								@foreach ($referenti->get($g->id, []) as $r)
									<div>{{ $r->name }}</div>
								@endforeach
							</td>
							<td>
								@foreach ($fornai->get($g->id, []) as $f)
									<div>{{ $f }}</div>
								@endforeach
							</td>
							<td class="text-right" style="white-space:nowrap">
								<a href="{{ url('admin/gas/'.$g->id.'/edit') }}" class="btn btn-default btn-xs">Modifica</a>
								@if (empty($utilizzi[$g->id]))
									{!! Form::open(['url' => 'admin/gas/'.$g->id, 'method' => 'DELETE', 'style' => 'display:inline', 'class' => 'elimina']) !!}
										{!! Form::submit('Elimina', ['class' => 'btn btn-danger btn-xs']) !!}
									{!! Form::close() !!}
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="panel-footer">Si possono eliminare solo i GAS senza associazioni, ordini, versamenti e utenti.</div>
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
			return confirm('Eliminare questo GAS?');
		});
	});
</script>
@endsection
