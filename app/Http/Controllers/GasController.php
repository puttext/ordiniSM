<?php

namespace App\Http\Controllers;

use App\Model\Fornaio;
use App\Model\Gas;
use App\Model\User;
use Illuminate\Http\Request;

/**
 * Anagrafica dei GAS e delle rivendite (tabella attori).
 */
class GasController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('gestore');
    }

    public function index()
    {
        $fornai = Fornaio::pluck('ragione_sociale', 'id');

        $this->dati['elenco'] = Gas::orderBy('nome')->get();
        $this->dati['utilizzi'] = Gas::utilizzi();
        $this->dati['referenti'] = User::whereNotNull('gas_id')->orderBy('name')->get()->groupBy('gas_id');
        // fornai della stagione corrente, per GAS
        $this->dati['fornai'] = \DB::table('associazione_fornai')
            ->where('stagione', config('parametri.stagione'))
            ->get(['gas_id', 'fornaio_id'])
            ->groupBy('gas_id')
            ->map(function ($righe) use ($fornai) {
                return $righe->pluck('fornaio_id')->unique()->map(function ($id) use ($fornai) {
                    return $fornai[$id] ?? 'Fornaio #'.$id;
                })->sort()->values();
            });

        return view('admin.gas.elenco')->with($this->dati);
    }

    public function create()
    {
        return $this->modulo(new Gas);
    }

    public function store(Request $request)
    {
        Gas::create($this->valida($request));

        return redirect('admin/gas')->with('message', 'GAS aggiunto');
    }

    public function edit($id)
    {
        return $this->modulo(Gas::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        Gas::findOrFail($id)->update($this->valida($request));

        return redirect('admin/gas')->with('message', 'GAS aggiornato');
    }

    public function destroy($id)
    {
        $gas = Gas::findOrFail($id);
        if ($gas->usato()) {
            return redirect('admin/gas')->withErrors(['Il GAS '.$gas->nome.' è usato in associazioni, ordini, versamenti o utenti: non si può eliminare']);
        }
        $gas->delete();

        return redirect('admin/gas')->with('message', 'GAS eliminato');
    }

    private function modulo(Gas $gas)
    {
        $this->dati['gas'] = $gas;
        $this->dati['tipi'] = ['gas' => 'GAS', 'rivendita' => 'Rivendita'];

        return view('admin.gas.edit')->with($this->dati);
    }

    private function valida(Request $request)
    {
        $this->validate($request, [
            'tipo' => 'required|in:gas,rivendita',
            'nome' => 'required|max:20',
            'comune' => 'required|max:30',
            'ragione_sociale' => 'nullable|max:255',
            'indirizzo' => 'nullable|max:255',
        ]);

        // le colonne non ammettono null
        $dati = [];
        foreach (['tipo', 'nome', 'comune', 'ragione_sociale', 'indirizzo'] as $campo) {
            $dati[$campo] = (string) $request->input($campo);
        }

        return $dati;
    }
}
