@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@include('admin._errori')
			{!! Form::model($stagione, ['url' => 'admin/stagioni/'.$stagione->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">
						Stagione {{ $stagione->nome }}
						@if ($stagione->corrente)
							<span class="label label-success">corrente</span>
						@endif
					</h3>
					{!! Form::submit('Salva', ['class' => 'btn btn-success btn-sm pull-right']) !!}
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						{!! Form::label('dal', 'Valida dal', ['class' => 'col-md-3 control-label']) !!}
						<div class="col-md-3">
							{!! Form::date('dal', $stagione->dal, ['class' => 'form-control']) !!}
						</div>
						{!! Form::label('al', 'al', ['class' => 'col-md-1 control-label']) !!}
						<div class="col-md-3">
							{!! Form::date('al', $stagione->al, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<div class="checkbox">
								<label>{!! Form::checkbox('aggiorna_associazioni', 1, false) !!} Applica le nuove date anche a tutte le associazioni della stagione</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}

			<div class="panel panel-default">
				<div class="panel-heading">Associazioni fornai-GAS ({{ $associazioni->count() }})</div>
				<table class="table table-condensed table-striped">
					<thead>
						<tr>
							<th>Fornaio</th>
							<th>Giorno</th>
							<th>GAS</th>
							<th>Dal</th>
							<th>Al</th>
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
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<a href="{{ url('admin/stagioni') }}">&larr; Torna alle stagioni</a>
		</div>
	</div>
</div>
@endsection
