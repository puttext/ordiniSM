@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._menu')
			@include('admin._errori')
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Utenti</h3>
					<a href="{{ url('admin/utenti/create') }}" class="btn btn-success btn-sm pull-right">Aggiungi utente</a>
					<div class="clearfix"></div>
				</div>
				<table class="table table-condensed table-striped datatable">
					<thead>
						<tr>
							<th>Nome</th>
							<th>E-mail</th>
							<th class="filtro">Ruolo</th>
							<th class="filtro">GAS</th>
							<th class="filtro">Fornaio</th>
							<th class="no-sort"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($elenco as $u)
						<tr>
							<td>{{ $u->name }}</td>
							<td>{{ $u->email }}</td>
							<td>{{ $ruoli[$u->ruolo] ?? $u->ruolo }}</td>
							<td>{{ $u->gas ? $u->gas->nome : '' }}</td>
							<td>{{ $u->referenza ? $u->referenza->ragione_sociale : '' }}</td>
							<td class="text-right" style="white-space:nowrap">
								@if ($u->ruolo != 'admin' || Auth::user()->livello >= \App\Model\User::ADMIN)
									<a href="{{ url('admin/utenti/'.$u->id.'/edit') }}" class="btn btn-default btn-xs">Modifica</a>
									@if ($u->id != Auth::id())
										{!! Form::open(['url' => 'admin/utenti/'.$u->id, 'method' => 'DELETE', 'style' => 'display:inline', 'class' => 'elimina']) !!}
											{!! Form::submit('Elimina', ['class' => 'btn btn-danger btn-xs']) !!}
										{!! Form::close() !!}
									@endif
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="panel-footer">
					I referenti vedono gli ordini del proprio GAS, i coordinatori quelli del proprio fornaio.
					Solo un amministratore può creare o modificare altri amministratori.
				</div>
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
			return confirm('Eliminare questo utente?');
		});
	});
</script>
@endsection
