@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
		<div class="panel panel-warning">
	        <div class="panel-heading">
				<h3 class="panel-title text-center">Prossimi Ordini</h3>
		    </div>
			<div class="panel-body">
	       	<table class="table table-striped table-bordered table-condensed">
	       		<thead>
	       			<tr>
	       				<th class="col-md-3">Descrizione</th>
	       				<th class="col-md-1">Fornitori</th>
	       				<th class="col-md-4">Consegne</th>
	       				<th class="col-md-1">Apertura</th>
	       				<th class="col-md-1">Chiusura</th>
	       				<th class="col-md-2">Operazioni</th>
	       			</tr>
	       		</thead>
	       		<tbody>
					@foreach ($prossimi as $gruppo)
	       			<tr>
	       				<td class="col-md3">{{ $gruppo["descrizione"] }}</td>
	       				<td class="col-md1">{{ $gruppo["fornitori"] }}</td>
	       				<td class="col-md4">{{ $gruppo["consegne"] }}</td>
	       				<td class="col-md1">{{ $gruppo["apertura"] }}</td>
	       				<td class="col-md1">{{ $gruppo["chiusura"] }}</td>
	       				<td class="col-md2">
	       					<a class="btn btn-xs btn-primary" href="{{ $gruppo['url_view'] }}">Riepilogo</a>
	       					<a class="btn btn-xs btn-warning" href="{{ $gruppo['url_edit'] }}">Modifica</a>
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
@section('page-scripts')
<script>
	$(document).ready(function(){
		$(".selectpicker").selectpicker();
	});
</script>
@endsection
