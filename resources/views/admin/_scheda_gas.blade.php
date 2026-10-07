{{-- Riquadro con i dati di un GAS e i fornai della stagione corrente. Richiede $scheda (Gas). --}}
<div class="well well-sm" style="margin:8px 0 0">
	@if (Auth::user()->livello >= \App\Model\User::GESTORE)
		<a href="{{ url('admin/gas/'.$scheda->id.'/edit') }}" class="pull-right">Scheda GAS</a>
	@endif
	<strong>{{ $scheda->full_name }}</strong>
	{{ $scheda->tipo == 'rivendita' ? '· Rivendita' : '' }}
	@if ($scheda->ragione_sociale)<br>{{ $scheda->ragione_sociale }}@endif
	@if ($scheda->indirizzo)<br>{{ $scheda->indirizzo }}@endif
	<br><em>Fornai {{ config('parametri.stagione') }}:</em>
	@forelse ($scheda->consegne as $a)
		<div>{{ config('parametri.giorni_txt')[$a->giorno] ?? $a->giorno }}: {{ $a->fornaio ? $a->fornaio->ragione_sociale : 'Fornaio #'.$a->fornaio_id }} <small class="text-muted">({{ $a->valido_dal ? \Carbon\Carbon::parse($a->valido_dal)->format('d/m/Y') : '…' }} – {{ $a->valido_al ? \Carbon\Carbon::parse($a->valido_al)->format('d/m/Y') : '…' }})</small></div>
	@empty
		nessuno
	@endforelse
</div>
