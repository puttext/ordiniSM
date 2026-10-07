{{-- Riquadro con i dati di un fornaio e i GAS della stagione corrente. Richiede $scheda (Fornaio). --}}
<div class="well well-sm" style="margin:8px 0 0">
	@if (Auth::user()->livello >= \App\Model\User::GESTORE)
		<a href="{{ url('admin/fornai/'.$scheda->id.'/edit') }}" class="pull-right">Scheda fornaio</a>
	@endif
	<strong>{{ $scheda->ragione_sociale }}</strong> ({{ $scheda->nome }})
	<br>{{ $scheda->indirizzo ? $scheda->indirizzo.', ' : '' }}{{ $scheda->comune }}
	<br>Chiusura ordini {{ $scheda->anticipo_chiusura }} giorni prima
	<br><em>GAS {{ config('parametri.stagione') }}:</em>
	@forelse ($scheda->consegne as $a)
		<div>{{ config('parametri.giorni_txt')[$a->giorno] ?? $a->giorno }}: {{ $a->gas ? $a->gas->full_name : 'GAS #'.$a->gas_id }} <small class="text-muted">({{ $a->valido_dal ? \Carbon\Carbon::parse($a->valido_dal)->format('d/m/Y') : '…' }} – {{ $a->valido_al ? \Carbon\Carbon::parse($a->valido_al)->format('d/m/Y') : '…' }})</small></div>
	@empty
		nessuno
	@endforelse
</div>
