@extends('layouts.app')

@section('content')
<div class="container">
	{!! Form::open([
		'method' => 'PATCH', 
		'url' => URL::to('ordini/current/'),
		'class' => 'form-horizontal',
	]) !!}
    <div class="title text-center">
		<h3>Ordini attivi - GAS {!! Form::select("gas",$gas,$gas_id, ['id'=>'gas','class'=>'selectpicker']) !!} 
		{!! Form::submit("Salva", ['class'=>'col-md1 btn btn-success']) !!}</h3>
	</div>
    
	@foreach ($gruppi as $gruppo=>$ordini)
	<div class="panel panel-default">
        <div class="panel-heading">
			<h3 class="panel-title text-center col-md11">{{$ordini[0]->descrizione}} </h3>
	    </div>
		<div class="panel-body">
			@foreach ($ordini->sortBy("consegna") as $ordine)
		        <div class="col-md-3">
		            <div class="panel panel-info">
		                <div class="panel-heading text-center">
			                <strong>{{$ordine->consegna}}</strong> - {{$ordine->fornitore->nome}}
						</div>
		
		                <div class="panel-body">
		                	@foreach ($ordine->prodotti_sort as $prodotto)
			                	{!! Form::label("prodotto[]",$prodotto->descrizione,["class"=>"col-md-6 control-label"]) !!}
								<div class="col-md-6">
			                   		{!! Form::hidden("prodotto[".$prodotto->id."][prodotto_id]",$prodotto->id) !!}
			                   		{!! Form::hidden("prodotto[".$prodotto->id."][gas_id]",$gas_id) !!}
			                   		{!! Form::text("prodotto[".$prodotto->id."][quantita]",$prodotto->getQuantitaGas($gas_id),["class"=>"form-control input-sm"]) !!}
			                   	</div>
							@endforeach
		                </div>
		                <div class="panel-footer">
		                	<h6>Luogo: {{$ordine->fornitore->ragione_sociale}} <br/>
		                	{{$ordine->fornitore->indirizzo}} ({{$ordine->fornitore->comune}})</h6>
		                </div>
		            </div>
				</div>
			@endforeach
		</div>
	</div>
	@endforeach
	{!! Form::close() !!}
</div>
@endsection
@section('page-scripts')
<script>
	$(document).ready(function(){
		$(".selectpicker").selectpicker();
	});
	$('#gas').change(function(e){
		var curr_page = window.location.href,
		next_page = "";

		if(curr_page.indexOf("?") > -1) {
		    next_page = curr_page.substr(0,curr_page.indexOf("?"));
		} else {
		    next_page = curr_page;
		}
		next_page+="?gas="+$('#gas').val();
		// Redirect to next page
		window.location = next_page;	
	});

	$('form').areYouSure( {'message':'Le modifiche non sono state salvate!'} );
</script>
@endsection
