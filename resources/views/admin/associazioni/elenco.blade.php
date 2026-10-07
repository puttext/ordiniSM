@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">
						Associazioni fornai-GAS della stagione
						{!! Form::select('stagione', $stagioni, $stagione ? $stagione->nome : null, ['id' => 'sel_stagione']) !!}
						@if ($stagione && $stagione->corrente)
							<span class="label label-success">corrente</span>
						@endif
					</h3>
					@if ($stagione)
						<a href="{{ url('admin/associazioni/create?stagione='.$stagione->nome) }}" class="btn btn-success btn-sm pull-right">Aggiungi associazione</a>
					@endif
					<div class="clearfix"></div>
				</div>
				@if ($associazioni->isEmpty())
					<div class="panel-body">Nessuna associazione per questa stagione.</div>
				@else
				<table class="table table-condensed table-striped">
					<thead>
						<tr>
							<th>Fornaio</th>
							<th>Giorno</th>
							<th>GAS</th>
							<th>Dal</th>
							<th>Al</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($associazioni as $a)
						<tr>
							<td>{{ $a->fornaio }}</td>
							<td>{{ $a->giorno_txt }}</td>
							<td>{{ $a->gas }}</td>
							<td>{{ $a->valido_dal ? \Carbon\Carbon::parse($a->valido_dal)->format('d/m/Y') : '' }}</td>
							<td>{{ $a->valido_al ? \Carbon\Carbon::parse($a->valido_al)->format('d/m/Y') : '' }}</td>
							<td class="text-right">
								<a href="{{ url('admin/associazioni/'.$a->id.'/edit') }}" class="btn btn-default btn-xs">Modifica</a>
								{!! Form::open(['url' => 'admin/associazioni/'.$a->id, 'method' => 'DELETE', 'style' => 'display:inline', 'class' => 'elimina']) !!}
									{!! Form::submit('Elimina', ['class' => 'btn btn-danger btn-xs']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="panel-footer">{{ $associazioni->count() }} associazioni</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('page-scripts')
<script>
	$(document).ready(function(){
		$('#sel_stagione').on('change', function () {
			window.location = '?stagione=' + $(this).val();
		});
		$('form.elimina').on('submit', function () {
			return confirm('Eliminare questa associazione?');
		});
	});
</script>
@endsection
