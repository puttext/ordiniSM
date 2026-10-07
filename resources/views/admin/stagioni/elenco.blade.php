@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">Stagioni</h3>
					<a href="{{ url('admin/stagioni/create') }}" class="btn btn-success btn-sm pull-right">Crea nuova stagione</a>
					<div class="clearfix"></div>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Stagione</th>
							<th>Dal</th>
							<th>Al</th>
							<th class="text-right">Associazioni fornai-GAS</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($stagioni as $stagione)
						<tr @if ($stagione->corrente) class="success" @endif>
							<td>
								{{ $stagione->nome }}
								@if ($stagione->corrente)
									<span class="label label-success">corrente</span>
								@endif
							</td>
							<td>{{ $stagione->dal->format('d/m/Y') }}</td>
							<td>{{ $stagione->al->format('d/m/Y') }}</td>
							<td class="text-right">{{ $associazioni[$stagione->nome] ?? 0 }}</td>
							<td class="text-right">
								<a href="{{ url('admin/stagioni/'.$stagione->id.'/edit') }}" class="btn btn-default btn-xs">Modifica</a>
								@if (! $stagione->corrente)
									{!! Form::open(['url' => 'admin/stagioni/'.$stagione->id.'/corrente', 'method' => 'POST', 'style' => 'display:inline']) !!}
										{!! Form::submit('Rendi corrente', ['class' => 'btn btn-primary btn-xs']) !!}
									{!! Form::close() !!}
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
