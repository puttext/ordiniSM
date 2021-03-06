@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title text-center">
		<h3>{{$ordini[0]->descrizione}}</h3>
		<h3 class="panel-title text-center col-md11">
				{{$ordini[0]->fornitore->nome}}<br/>
				Ordini del {{ trans("datetime.giorni.".$ordini[0]->consegna->format("l")) }}
		</h3>
	</div>
    
		<div class="container table-responsive">
	       	<table class="table table-striped table-bordered table-condensed">
	       		<thead class="text-center">
	       			<tr rowspan=2>
	       				<th>G.A.S.</th>
	       				@foreach ($ordini as $ordine)
		       				<th class="text-center" colspan="{{$ordine->num_prodotti}}">{{$ordine->consegna->format("d/m/Y")}}</th>
	       				@endforeach
	       			</tr>
	       			<tr>
	       				<th>&nbsp;</th>
	       				@foreach ($ordini as $ordine)
		       				@foreach ($ordine->prodotti_sort as $prodotto)
		       					<th class="text-center">{{ $prodotto->descrizione_breve }}</th>
		       				@endforeach
	       				@endforeach
	       			</tr>
	       		</thead>
	       		<tbody>
					@foreach ($elenco_gas as $gas)
	       			<tr>
	       				<td class="col-md-4">{{  $gas->nome }}<br/>({{$gas->comune}})</td>
	       				@foreach ($ordini as $ordine)
	       					@foreach ($ordine->prodotti_sort as $prodotto)
	       						<td class="text-center">{{ $prodotto->getQuantitaGas($gas->id) }}</td>
	       					@endforeach
       					@endforeach
	       			</tr>
	       			@endforeach
	       		</tbody>
	       		<tfoot>
	       			<tr>
	       				<td class="col-md-4"><strong>Totali per tipo</strong></td>
	       				@foreach ($ordini as $ordine)
	       					@foreach ($ordine->prodotti_sort as $prodotto)
	       						<td class="text-center">{{ $prodotto->quantita_totale }}</td>
	       					@endforeach
       					@endforeach
	       			</tr>
	       			<tr>
	       				<td class="col-md-4"><strong>Totali</strong></td>
	       				@foreach ($ordini as $ordine)
       						<td colspan="{{$ordine->num_prodotti}}" class="text-center">{{ $ordine->quantita_totale }} ( {{ $ordine->totale_fornitore }} )</td>
       					@endforeach
	       			</tr>
	       		</tfoot>
	       	</table>
		</div>
</div>
@endsection
@section('page-scripts')
<script>
	$(document).ready(function(){
		$(".selectpicker").selectpicker();
	});

	$('form').areYouSure( {'message':'Le modifiche non sono state salvate!'} );
</script>
@endsection
