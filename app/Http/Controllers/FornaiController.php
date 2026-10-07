<?php

namespace App\Http\Controllers;

use App\Model\Fornaio;
use App\Model\Gas;
use App\Model\User;
use Illuminate\Http\Request;

/**
 * Anagrafica dei fornai (tabella attori).
 */
class FornaiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('gestore');
    }

    public function index()
    {
        $this->dati['elenco'] = Fornaio::orderBy('ragione_sociale')->get();
        $this->dati['utilizzi'] = Fornaio::utilizzi();
        $this->dati['referenti'] = User::whereNotNull('attore_id')->orderBy('name')->get()->groupBy('attore_id');
        // numero di GAS associati nella stagione corrente, per fornaio
        $this->dati['gas'] = \DB::table('associazione_fornai')
            ->where('stagione', config('parametri.stagione'))
            ->whereIn('gas_id', Gas::pluck('id'))
            ->selectRaw('fornaio_id, count(distinct gas_id) as n')
            ->groupBy('fornaio_id')
            ->pluck('n', 'fornaio_id');

        return view('admin.fornai.elenco')->with($this->dati);
    }

    public function create()
    {
        return $this->modulo(new Fornaio);
    }

    public function store(Request $request)
    {
        Fornaio::create($this->valida($request));

        return redirect('admin/fornai')->with('message', 'Fornaio aggiunto');
    }

    public function edit($id)
    {
        return $this->modulo(Fornaio::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        Fornaio::findOrFail($id)->update($this->valida($request));

        return redirect('admin/fornai')->with('message', 'Fornaio aggiornato');
    }

    public function destroy($id)
    {
        $fornaio = Fornaio::findOrFail($id);
        if ($fornaio->usato()) {
            return redirect('admin/fornai')->withErrors(['Il fornaio '.$fornaio->ragione_sociale.' è usato in associazioni, ordini, prodotti o utenti: non si può eliminare']);
        }
        $fornaio->delete();

        return redirect('admin/fornai')->with('message', 'Fornaio eliminato');
    }

    private function modulo(Fornaio $fornaio)
    {
        $this->dati['fornaio'] = $fornaio;

        return view('admin.fornai.edit')->with($this->dati);
    }

    private function valida(Request $request)
    {
        $this->validate($request, [
            'ragione_sociale' => 'required|max:255',
            'nome' => 'required|max:20',
            'comune' => 'nullable|max:30',
            'indirizzo' => 'nullable|max:255',
            'anticipo_chiusura' => 'required|integer|between:0,30',
        ]);

        // le colonne non ammettono null
        $dati = [];
        foreach (['ragione_sociale', 'nome', 'comune', 'indirizzo', 'anticipo_chiusura'] as $campo) {
            $dati[$campo] = (string) $request->input($campo);
        }

        return $dati;
    }
}
