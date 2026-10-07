{{-- Riquadro con anagrafica e statistiche di un GAS. Richiede $scheda (Gas). --}}
<div class="well well-sm" style="margin:8px 0 0">
	@if (Auth::user()->livello >= \App\Model\User::GESTORE)
		<a href="{{ url('admin/gas/'.$scheda->id.'/edit') }}" class="pull-right">Scheda GAS</a>
	@endif
	<strong>{{ $scheda->full_name }}</strong>
	{{ $scheda->tipo == 'rivendita' ? '· Rivendita' : '' }}
	@if ($scheda->ragione_sociale)<br>{{ $scheda->ragione_sociale }}@endif
	@if ($scheda->indirizzo)<br>{{ $scheda->indirizzo }}@endif
	@foreach ($scheda->statistiche() as $etichetta => $valore)
		<br><em>{{ $etichetta }}:</em> {{ $valore }}
	@endforeach
</div>
