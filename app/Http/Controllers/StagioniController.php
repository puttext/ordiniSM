<?php

namespace App\Http\Controllers;

use App\Model\Stagione;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StagioniController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('gestore');
    }

    public function index()
    {
        $stagioni = Stagione::orderBy('nome', 'DESC')->get();
        $associazioni = \DB::table('associazione_fornai')
            ->selectRaw('stagione, count(*) as n')
            ->groupBy('stagione')
            ->pluck('n', 'stagione');

        $this->dati['stagioni'] = $stagioni;
        $this->dati['associazioni'] = $associazioni;

        return view('admin.stagioni.elenco')->with($this->dati);
    }

    /**
     * Creazione guidata della nuova stagione: propone nome e date successive
     * all'ultima stagione e l'elenco delle associazioni fornai-GAS da copiare.
     */
    public function create(Request $request)
    {
        $stagioni = Stagione::orderBy('nome', 'DESC')->get();
        $ultima = $stagioni->first();
        $origine = $request->has('origine')
            ? $stagioni->firstWhere('nome', $request->input('origine'))
            : $ultima;

        $nuova = new Stagione;
        if ($ultima) {
            $nuova->nome = $ultima->successiva;
            $nuova->dal = $ultima->dal->copy()->addYear();
            $nuova->al = $ultima->al->copy()->addYear();
        } else {
            $anno = Carbon::today()->year;
            $nuova->nome = $anno.'-'.($anno + 1);
            $nuova->dal = Carbon::create($anno, 9, 1);
            $nuova->al = Carbon::create($anno + 1, 7, 31);
        }

        $this->dati['nuova'] = $nuova;
        $this->dati['origine'] = $origine;
        $this->dati['stagioni'] = $stagioni->pluck('nome', 'nome');
        $this->dati['associazioni'] = $origine ? $origine->associazioniLeggibili() : collect();

        return view('admin.stagioni.create')->with($this->dati);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => ['required', 'regex:/^\d{4}-\d{4}$/', 'unique:stagioni,nome'],
            'dal' => 'required|date',
            'al' => 'required|date|after:dal',
            'associazioni' => 'array',
            'associazioni.*' => 'integer',
        ], [
            'nome.regex' => 'Il nome della stagione deve essere nel formato AAAA-AAAA',
            'nome.unique' => 'La stagione :input esiste già',
            'al.after' => 'La data di fine deve essere successiva a quella di inizio',
        ]);

        $origine = Stagione::whereNome($request->input('origine'))->first();
        $copiate = 0;

        \DB::transaction(function () use ($request, $origine, &$copiate) {
            $stagione = Stagione::create([
                'nome' => $request->input('nome'),
                'dal' => $request->input('dal'),
                'al' => $request->input('al'),
            ]);

            if ($origine && $request->input('associazioni')) {
                $adesso = Carbon::now();
                $righe = $origine->associazioni()
                    ->whereIn('id', $request->input('associazioni'))
                    ->get();
                foreach ($righe as $riga) {
                    \DB::table('associazione_fornai')->insert([
                        'stagione' => $stagione->nome,
                        'fornaio_id' => $riga->fornaio_id,
                        'gas_id' => $riga->gas_id,
                        'giorno' => $riga->giorno,
                        'valido_dal' => $stagione->dal->toDateString(),
                        'valido_al' => $stagione->al->toDateString(),
                        'created_at' => $adesso,
                        'updated_at' => $adesso,
                    ]);
                    $copiate++;
                }
            }

            if ($request->input('corrente')) {
                $stagione->rendiCorrente();
            }
        });

        return redirect('admin/stagioni')
            ->with('message', 'Stagione '.$request->input('nome').' creata, '.$copiate.' associazioni copiate');
    }

    public function edit(Stagione $stagione)
    {
        $this->dati['stagione'] = $stagione;
        $this->dati['associazioni'] = $stagione->associazioniLeggibili();

        return view('admin.stagioni.edit')->with($this->dati);
    }

    /**
     * Modifica delle date della stagione. Il nome non si cambia perché è
     * scritto in associazione_fornai e ordini.
     */
    public function update(Request $request, Stagione $stagione)
    {
        $this->validate($request, [
            'dal' => 'required|date',
            'al' => 'required|date|after:dal',
        ], [
            'al.after' => 'La data di fine deve essere successiva a quella di inizio',
        ]);

        \DB::transaction(function () use ($request, $stagione) {
            $stagione->dal = $request->input('dal');
            $stagione->al = $request->input('al');
            $stagione->save();

            if ($request->input('aggiorna_associazioni')) {
                $stagione->associazioni()->update([
                    'valido_dal' => $stagione->dal->toDateString(),
                    'valido_al' => $stagione->al->toDateString(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        });

        return redirect('admin/stagioni')->with('message', 'Stagione '.$stagione->nome.' aggiornata');
    }

    public function corrente(Stagione $stagione)
    {
        $stagione->rendiCorrente();

        return redirect('admin/stagioni')->with('message', 'La stagione corrente ora è '.$stagione->nome);
    }
}
