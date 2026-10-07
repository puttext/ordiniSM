{{--
	Rende DataTable le tabelle con classe "datatable": ordinamento, ricerca e
	un filtro a tendina per le colonne con l'intestazione di classe "filtro".
	Le celle con data-order (es. date in formato AAAA-MM-GG) si ordinano su quel valore.
	Le colonne con classe "no-sort" non si ordinano; con "solo-ordinamento" sulla
	tabella non ci sono ricerca e filtri (serve quando le righe contengono campi
	del modulo, che non verrebbero inviati se nascosti).
--}}
<link href="{{ asset('vendor/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<style>
	.panel > .dataTables_wrapper { padding: 10px 10px 0; }
	table.datatable tr.filtri th { padding: 4px; }
</style>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
	$(document).ready(function () {
		$('table.datatable').each(function () {
			var $tabella = $(this);
			var soloOrdinamento = $tabella.hasClass('solo-ordinamento');

			$tabella.DataTable({
				paging: false,
				searching: ! soloOrdinamento,
				info: ! soloOrdinamento,
				autoWidth: false,
				order: [],
				columnDefs: [{ targets: 'no-sort', orderable: false, searchable: false }],
				language: { url: '{{ asset('vendor/datatables/it-IT.json') }}' },
				initComplete: function () {
					var api = this.api();
					if (soloOrdinamento || ! $tabella.find('thead th.filtro').length) {
						return;
					}
					var $riga = $('<tr class="filtri"></tr>');
					api.columns().every(function () {
						var colonna = this;
						var $cella = $('<th></th>').appendTo($riga);
						if (! $(colonna.header()).hasClass('filtro')) {
							return;
						}
						// valori distinti, nell'ordine di data-order se c'è
						var valori = {};
						colonna.nodes().to$().each(function () {
							var testo = $(this).text().trim();
							var ordine = $(this).attr('data-order');
							valori[testo] = ordine !== undefined ? ordine : testo;
						});
						var testi = Object.keys(valori).sort(function (a, b) {
							var x = valori[a], y = valori[b];
							if (! isNaN(x) && ! isNaN(y)) {
								return x - y;
							}
							return String(x).localeCompare(String(y));
						});
						var $select = $('<select class="form-control input-sm"><option value="">Tutti</option></select>').appendTo($cella);
						testi.forEach(function (testo) {
							$('<option></option>').val(testo).text(testo).appendTo($select);
						});
						$select.on('change', function () {
							var valore = $(this).val();
							colonna.search(valore ? '^' + $.fn.dataTable.util.escapeRegex(valore) + '$' : '', true, false).draw();
						});
					});
					$tabella.find('thead').append($riga);
				}
			});
		});
	});
</script>
