<?php

namespace App\Http\Controllers;

use App\Model\AssociazioneFornai;
use App\Model\Fornaio;
use App\Model\Gas;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Gestione degli utenti: referenti dei GAS, coordinatori dei fornai, gestori e amministratori.
 */
class UtentiController extends Controller
{
    const RUOLI = [
        'referente' => 'Referente GAS',
        'fornitore' => 'Fornitore',
        'coordinatore' => 'Coordinatore',
        'gestore' => 'Gestore',
        'admin' => 'Amministratore',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('gestore');
    }

    public function index()
    {
        $this->dati['elenco'] = User::with('gas', 'referenza')->orderBy('name')->get();
        $this->dati['ruoli'] = self::RUOLI;

        return view('admin.utenti.elenco')->with($this->dati);
    }

    public function create()
    {
        return $this->modulo((new User)->forceFill(['ruolo' => 'referente']));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->forceFill($this->valida($request, $user))->save();

        return redirect('admin/utenti')->with('message', 'Utente aggiunto');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        if (! $this->modificabile($user)) {
            return redirect('admin/utenti')->withErrors(['Solo un amministratore può modificare un amministratore']);
        }

        return $this->modulo($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (! $this->modificabile($user)) {
            return redirect('admin/utenti')->withErrors(['Solo un amministratore può modificare un amministratore']);
        }
        $user->forceFill($this->valida($request, $user))->save();

        return redirect('admin/utenti')->with('message', 'Utente aggiornato');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == \Auth::id()) {
            return redirect('admin/utenti')->withErrors(['Non puoi eliminare te stesso']);
        }
        if (! $this->modificabile($user)) {
            return redirect('admin/utenti')->withErrors(['Solo un amministratore può eliminare un amministratore']);
        }
        $user->delete();

        return redirect('admin/utenti')->with('message', 'Utente '.$user->name.' eliminato');
    }

    /**
     * Un gestore non può toccare gli amministratori.
     */
    private function modificabile(User $user)
    {
        return $user->ruolo != 'admin' || \Auth::user()->livello >= User::ADMIN;
    }

    /**
     * Ruoli che l'utente collegato può assegnare: il ruolo admin solo da un admin.
     */
    private function ruoliAssegnabili()
    {
        $ruoli = self::RUOLI;
        if (\Auth::user()->livello < User::ADMIN) {
            unset($ruoli['admin']);
        }

        return $ruoli;
    }

    private function modulo(User $user)
    {
        $this->dati['user'] = $user;
        $this->dati['ruoli'] = $this->ruoliAssegnabili();
        $this->dati['gas'] = Gas::orderBy('nome')->get()->pluck('full_name', 'id');
        $this->dati['fornai'] = Fornaio::orderBy('ragione_sociale')->get()->pluck('full_name', 'id');
        $this->dati['se_stesso'] = $user->exists && $user->id == \Auth::id();

        // GAS e fornaio già associati, con le consegne della stagione corrente
        $this->dati['gas_associato'] = $user->gas_id ? Gas::find($user->gas_id) : null;
        $this->dati['fornaio_associato'] = $user->attore_id ? Fornaio::find($user->attore_id) : null;
        $this->dati['consegne_gas'] = $this->dati['gas_associato']
            ? AssociazioneFornai::with('fornaio')->whereGasId($user->gas_id)->orderBy('giorno')->get()
            : collect();
        $this->dati['consegne_fornaio'] = $this->dati['fornaio_associato']
            ? AssociazioneFornai::with('gas')->whereFornaioId($user->attore_id)->orderBy('giorno')->get()
            : collect();

        return view('admin.utenti.edit')->with($this->dati);
    }

    private function valida(Request $request, User $user)
    {
        // il proprio ruolo non si cambia, per non perdere l'accesso a questa sezione
        if ($user->exists && $user->id == \Auth::id()) {
            $request->merge(['ruolo' => $user->ruolo]);
        }

        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ($user->exists ? 'nullable' : 'required').'|min:6|confirmed',
            'ruolo' => ['required', Rule::in(array_keys($user->id == \Auth::id() ? self::RUOLI : $this->ruoliAssegnabili()))],
            'gas_id' => ['nullable', Rule::exists('attori', 'id')->whereIn('tipo', ['gas', 'rivendita'])],
            'attore_id' => ['nullable', 'required_if:ruolo,coordinatore', Rule::exists('attori', 'id')->where('tipo', 'fornaio')],
        ], [
            'attore_id.required_if' => 'Un coordinatore deve essere collegato a un fornaio',
        ], [
            'name' => 'nome',
            'password' => 'password',
            'gas_id' => 'GAS',
            'attore_id' => 'fornaio',
        ]);

        $dati = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'ruolo' => $request->input('ruolo'),
            'gas_id' => $request->input('gas_id') ?: null,
            'attore_id' => $request->input('attore_id') ?: null,
        ];
        if ($request->filled('password')) {
            $dati['password'] = bcrypt($request->input('password'));
        }

        return $dati;
    }
}
