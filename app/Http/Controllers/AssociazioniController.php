<?php

namespace App\Http\Controllers;

use App\Model\Fornaio;
use App\Model\Gas;
use App\Model\Stagione;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * Associazioni fornai-GAS. Si usa la tabella direttamente perché il modello
 * AssociazioneFornai filtra sempre sulla stagione corrente.
 */
class AssociazioniController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('gestore');
    }

    public function index(Request $request)
    {
        $stagione = $this->stagione($request->input('stagione'));

        $this->dati['stagione'] = $stagione;
        $this->dati['stagioni'] = Stagione::orderBy('nome', 'DESC')->pluck('nome', 'nome');
        $this->dati['associazioni'] = $stagione ? $stagione->associazioniLeggibili() : collect();

        return view('admin.associazioni.elenco')->with($this->dati);
    }

    public function create(Request $request)
    {
        $stagione = $this->stagione($request->input('stagione'));

        $associazione = (object) [
            'id' => null,
            'stagione' => $stagione ? $stagione->nome : null,
            'fornaio_id' => $request->input('fornaio_id'),
            'gas_id' => null,
            'giorno' => null,
            'valido_dal' => $stagione ? $stagione->dal->toDateString() : null,
            'valido_al' => $stagione ? $stagione->al->toDateString() : null,
        ];

        return $this->modulo($associazione);
    }

    public function store(Request $request)
    {
        $dati = $this->valida($request);
        $adesso = Carbon::now();
        \DB::table('associazione_fornai')->insert($dati + ['created_at' => $adesso, 'updated_at' => $adesso]);

        return redirect('admin/associazioni?stagione='.$dati['stagione'])->with('message', 'Associazione aggiunta');
    }

    public function edit($id)
    {
        return $this->modulo($this->trova($id));
    }

    public function update(Request $request, $id)
    {
        $this->trova($id);
        $dati = $this->valida($request, $id);
        \DB::table('associazione_fornai')->where('id', $id)->update($dati + ['updated_at' => Carbon::now()]);

        return redirect('admin/associazioni?stagione='.$dati['stagione'])->with('message', 'Associazione aggiornata');
    }

    public function destroy($id)
    {
        $associazione = $this->trova($id);
        \DB::table('associazione_fornai')->where('id', $id)->delete();

        return redirect('admin/associazioni?stagione='.$associazione->stagione)->with('message', 'Associazione eliminata');
    }

    private function modulo($associazione)
    {
        $this->dati['associazione'] = $associazione;
        $this->dati['stagioni'] = Stagione::orderBy('nome', 'DESC')->pluck('nome', 'nome');
        $this->dati['fornai'] = Fornaio::orderBy('ragione_sociale')->pluck('ragione_sociale', 'id');
        $this->dati['gas'] = Gas::orderBy('nome')->get()->pluck('full_name', 'id');
        $this->dati['giorni'] = config('parametri.giorni_txt');

        return view('admin.associazioni.edit')->with($this->dati);
    }

    private function valida(Request $request, $id = null)
    {
        $this->validate($request, [
            'stagione' => 'required|exists:stagioni,nome',
            'fornaio_id' => 'required|exists:attori,id,tipo,fornaio',
            'gas_id' => ['required', Rule::exists('attori', 'id')->whereIn('tipo', ['gas', 'rivendita'])],
            'giorno' => 'required|integer|between:0,6',
            'valido_dal' => 'required|date',
            'valido_al' => 'required|date|after_or_equal:valido_dal',
        ], [
            'valido_al.after_or_equal' => 'La data di fine validità non può precedere quella di inizio',
        ]);

        $dati = $request->only('stagione', 'fornaio_id', 'gas_id', 'giorno', 'valido_dal', 'valido_al');

        $doppia = \DB::table('associazione_fornai')
            ->where('stagione', $dati['stagione'])
            ->where('fornaio_id', $dati['fornaio_id'])
            ->where('gas_id', $dati['gas_id'])
            ->where('giorno', $dati['giorno'])
            ->when($id, function ($query) use ($id) {
                $query->where('id', '<>', $id);
            })
            ->exists();
        if ($doppia) {
            throw ValidationException::withMessages([
                'gas_id' => 'Questo GAS è già associato al fornaio nello stesso giorno per la stagione '.$dati['stagione'],
            ]);
        }

        return $dati;
    }

    private function trova($id)
    {
        $associazione = \DB::table('associazione_fornai')->find($id);
        abort_unless($associazione, 404);

        return $associazione;
    }

    /**
     * Stagione richiesta, oppure quella corrente.
     */
    private function stagione($nome)
    {
        return Stagione::whereNome($nome ?: config('parametri.stagione'))->first()
            ?? Stagione::orderBy('nome', 'DESC')->first();
    }
}
