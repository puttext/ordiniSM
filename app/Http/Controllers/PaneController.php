<?php

namespace App\Http\Controllers;

use App\Model\Fornaio;
use App\Model\Ordine;
use App\Model\User;
use Illuminate\Http\Request;
use Mail;

class PaneController extends Controller
{
    public function edit($anno, $mese, $fornaio = null)
    {
        // dd(\App::getLocale());
        // dd(setlocale(LC_ALL, 0));
        $mese = (int) $mese;
        $mese_f = sprintf('%02d', $mese);
        $fornai = \Auth::user()->fornai;
        if ($fornaio) {
            $fornai = [Fornaio::find($fornaio)];
        }
        /*if (\Auth::user()->livello==User::COORDINATORE){
    		$fornai[]=Fornaio::find(\Auth::user()->referenza->id);
    	}
    	elseif (\Auth::user()->livello>=User::GESTORE){
    		$fornai=Fornaio::all();
    	}*/
        $date = [];
        $index = 0;
        foreach ($fornai as $fornaio) {
            if ($fornaio->giorni_gas) {
                $giorni = $fornaio->giorni_gas()
                    ->whereStagione(\Config::get('parametri.stagione'))
                    ->where('valido_dal', '<=', $anno.'-'.$mese_f.'-01')
                    ->where('valido_al', '>=', $anno.'-'.$mese_f.'-31')->get()
                    ->pluck('giorno')->unique();
                foreach ($giorni as $giorno) {
                    $riga = [];
                    $riga['fornaio'] = $fornaio;
                    $refDate = \Carbon\Carbon::createFromDate($anno, $mese, 1)->subDay();
                    $data = clone $refDate;
                    $data->next($giorno);
                    $riga['giorno'] = $data->format('l');
                    $data->formatLocalized('%A');

                    $i = 1;
                    $ordini = Ordine::whereFornitoreId($fornaio->id)
                        ->whereCodiceGruppo('P-'.$fornaio->id.'-'.$giorno.'-'.$anno.'-'.$mese_f)
                        ->orderBy('consegna')
                        ->get();
                    foreach ($ordini as $ordine) {
                        foreach ($ordine->toArray() as $key => $value) {
                            $riga[$key] = $value;
                        }
                        $riga['chiusura'] = $ordine->chiusura;
                        $riga['apertura'] = $ordine->apertura;
                        $riga['fornitore'] = $ordine->fornitore_id;
                        $riga['codice_gruppo'] = $ordine->codice_gruppo;
                        $riga['data'.$i.'_consegna'] = $ordine->consegna;
                        $riga['data'.$i.'_id'] = $ordine->id;
                        $i++;
                    }
                    $date[] = $riga;
                }
            }
        }
        $refDate = \Carbon\Carbon::createFromDate($anno, $mese, 1);
        $this->dati['date'] = $date;
        $this->dati['anno'] = $anno;
        $this->dati['mese'] = $mese;
        $this->dati['mese_txt'] = \Config::get('parametri.mesi_txt')[$mese];

        // dd($date);
        return view('ordini.pane_edit')->with($this->dati);
    }

    public function update(Request $request, $anno, $mese)
    {
        $mese_f = sprintf('%02d', $mese);

        $fornitori = $request->input('fornitore');

        foreach ($fornitori as $index => $fornitore) {
            $ap = $request->input('apertura')[$index];
            $ch = $request->input('chiusura')[$index];
            $des = $request->input('descrizione')[$index];
            for ($i = 1; $i <= 5; $i++) {
                if (isset($request->input('data'.$i.'_id')[$index]) && $request->input('data'.$i.'_id')[$index]) {
                    $ordine = Ordine::find($request->input('data'.$i.'_id')[$index]);
                    if (! $request->input('data'.$i.'_consegna')[$index]) {
                        $ordine->delete();
                    } else {
                        $ordine->consegna = $request->input('data'.$i.'_consegna')[$index];
                        $ordine->apertura = $ap;
                        $ordine->chiusura = $ch;
                        $ordine->descrizione = $des;
                        $ordine->save();
                    }
                }
            }
            if ($request->input('dataNEW_consegna')[$index]) {
                $ordine = Ordine::create([
                    'stagione' => \Config::get('parametri.stagione'),
                    'codice_gruppo' => $request->input('codice_gruppo')[$index],
                    'consegna' => $request->input('dataNEW_consegna')[$index],
                    'apertura' => $ap,
                    'chiusura' => $ch,
                    'fornitore_id' => $fornitore,
                ]);
            }
        }

        if ($request->has('salva_e_email')) {
            $data = [];
            $data['url'] = env('APP_URL');
            Mail::send(['text' => 'notifica'], $data, (function ($message) use ($fornitori) {
                $indirizzi = [];
                $fornai = Fornaio::whereIn('id', $fornitori)->get();
                foreach ($fornai as $f) {
                    foreach ($f->gas_attivi as $gas) {
                        foreach ($gas->referenti as $ref) {
                            $message->bcc($ref->email);
                        }
                    }
                }
                $message->subject('[Ordini Spiga e Madia] Nuovo ordine inserito');
            }));
        }

        return redirect('ordini/');
    }
}
