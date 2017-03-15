@extends('layouts.app')

@section('content')
<div class="container">
	{!! Form::open([
		'method' => 'POST', 
		'url' => URL::to('ordini/pane/'.$anno."/".$mese),
		'class' => 'form-vertical',
	]) !!}
    <!-- <div class="row"> -->
	<div class="panel panel-default">
        <div class="panel-heading">
			<h3 class="panel-title text-center col-md11">Ordini Pane {{ $mese_txt }} {{ $anno }}</h3>
	    	{!! Form::submit("Salva", ['class'=>'col-md1 btn btn-success pull-right']) !!}
	    	<div class="clearfix"></div>
	    </div>
		<div class="panel-body">
		@foreach ($date as $riga)
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">{{ $riga["fornaio"]->ragione_sociale }} ({{ $riga["fornaio"]->nome }})<br/>
                {{ title_case($riga["giorno"]) }}
                </div>

                <div class="panel-body">
					<div class="col-md-12">
                   		{!! Form::text("descrizione[]",$riga["descrizione"],["class"=>"form-control"]) !!}
                   	</div>
                	{!! Form::label("apertura[]","Apertura ordine",["class"=>"col-md-6 control-label"]) !!}
					<div class="col-md-6">
                   		{!! Form::text("apertura[]",$riga["apertura"],["class"=>"form-control datepicker",'data-provide'=>'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy']) !!}
                   	</div>
                	{!! Form::label("chiusura[]","Chiusura ordine",["class"=>"col-md-6 control-label"]) !!}
					<div class="col-md-6">
                   		{!! Form::text("chiusura[]",$riga["chiusura"],["class"=>"form-control datepicker",'data-provide'=>'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy']) !!}
                   	</div>
					{!! Form::hidden("fornitore[]",$riga["fornitore"]) !!}
					{!! Form::hidden("codice_gruppo[]",$riga["codice_gruppo"]) !!}
                	{!! Form::label("data1_consegna[]","Settimana 1",["class"=>"col-md-6 control-label"]) !!}
					<div class="col-md-6">
						{!! Form::hidden("data1_id[]",$riga["data1_id"]) !!}
						{!! Form::text("data1_consegna[]",$riga["data1_consegna"],["class"=>"form-control datepicker",'data-provide'=>'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy']) !!}
					</div>
                	{!! Form::label("data2_consegna[]","Settimana 2",["class"=>"col-md-6 control-label"]) !!}
					<div class="col-md-6">
						{!! Form::hidden("data2_id[]",$riga["data2_id"]) !!}
						{!! Form::text("data2_consegna[]",$riga["data2_consegna"],["class"=>"form-control datepicker",'data-provide'=>'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy']) !!}
					</div>
                	{!! Form::label("data1_consegna[]","Settimana 3",["class"=>"col-md-6 control-label"]) !!}
					<div class="col-md-6">
						{!! Form::hidden("data3_id[]",$riga["data3_id"]) !!}
						{!! Form::text("data3_consegna[]",$riga["data3_consegna"],["class"=>"form-control datepicker",'data-provide'=>'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy']) !!}
					</div>
					@if (isset($riga["data4_id"]))
                		{!! Form::label("data4_consegna[]","Settimana 4",["class"=>"col-md-6 control-label"]) !!}
						<div class="col-md-6">
							{!! Form::hidden("data4_id[]",$riga["data4_id"]) !!}
							{!! Form::text("data4_consegna[]",$riga["data4_consegna"],["class"=>"form-control datepicker"]) !!}
						</div>
					@endif
					@if (isset($riga["data5_id"]))
	                	{!! Form::label("data5_consegna[]","Settimana 5",["class"=>"col-md-6 control-label"]) !!}
						<div class="col-md-6">
							{!! Form::hidden("data5_id[]",$riga["data5_id"]) !!}
							{!! Form::text("data5_consegna[]",$riga["data5_consegna"],["class"=>"form-control datepicker",'data-provide'=>'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy']) !!}
						</div>
					@endif
                	{!! Form::label("dataNEW_consegna[]","Aggiungi data",["class"=>"col-md-6 control-label"]) !!}
					<div class="col-md-6">
						{!! Form::text("dataNEW_consegna[]",null,["class"=>"form-control datepicker",'data-provide'=>'datepicker', 'data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy']) !!}
					</div>
                </div>
            </div>
        </div>
        @endforeach
		</div>
    </div>
	{!! Form::close() !!}
</div>
@endsection
@section('page-scripts')
<script>
	$(document).ready(function(){
		$(".selectpicker").selectpicker();
	});
</script>
@endsection
