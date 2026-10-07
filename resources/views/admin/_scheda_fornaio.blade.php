{{-- Riquadro con anagrafica e referenti di un fornaio. Richiede $scheda (Fornaio). --}}
<div class="well well-sm" style="margin:8px 0 0">
	@if (Auth::user()->livello >= \App\Model\User::GESTORE)
		<a href="{{ url('admin/fornai/'.$scheda->id.'/edit') }}" class="pull-right">Scheda fornaio</a>
	@endif
	<strong>{{ $scheda->ragione_sociale }}</strong> ({{ $scheda->nome }})
	<br>{{ $scheda->indirizzo ? $scheda->indirizzo.', ' : '' }}{{ $scheda->comune }}
	<br>Chiusura ordini {{ $scheda->anticipo_chiusura }} giorni prima
	@foreach ($scheda->dettagli() as $etichetta => $valore)
		<br><em>{{ $etichetta }}:</em> {{ $valore }}
	@endforeach
</div>
