<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Debug\Dumper;

use App\Model\Fornaio;
use App\Model\Ordine;
use App\Model\OrdineDettaglio;

class OrdiniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$gruppi=Ordine::all()->groupBy("codice_gruppo");

    	$oggi=new \Carbon\Carbon();
    	$this->dati["in_corso"]=array();
    	$this->dati["prossimi"]=array();
    	$this->dati["storico"]=array();
    	 
    	foreach ($gruppi as $codice_gruppo=>$ordini){
    		$gruppo=array();
    		foreach ($ordini[0]->toArray() as $key=>$value){
    			$gruppo[$key]=$value;
    		}
    		$gruppo["apertura"]=$ordini[0]->apertura;
    		$gruppo["chiusura"]=$ordini[0]->chiusura;
    		
    		$fornitori=array();
    		$consegne=array();
    		foreach ($ordini as $ordine){
    			$consegne[]=$ordine->consegna->format("d/m");
    			$fornitori[$ordine->fornitore_id]=$ordine->fornitore->nome;
    		}
    		$gruppo["fornitori"]=implode($fornitori,", ");
    		
    		$gruppo["consegne"]=implode($consegne,", ");
    		
    		if (substr($gruppo["codice_gruppo"],0,1)=="P")
    			$gruppo["url_edit"]=url('/ordini/pane/'.$ordini[0]->consegna->format("Y/m").'/edit');
    		else
    			$gruppo["url_edit"]=url('/ordini/'.$gruppo['codice_gruppo'].'/edit');
    		$gruppo["url_view"]=url('/ordini/'.$gruppo['codice_gruppo']);
    			 
    		if ($ordini[0]->apertura>$oggi){
    			$this->dati["prossimi"][]=$gruppo;
    		}
    		else{
    			$this->dati["prossimi"][]=$gruppo;
    		}
    		//dd($ordini->pluck("consegna"));
    	}
    	//dd($this->dati);
    	return view("ordini.elenco")->with($this->dati);
    	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$this->dati["mesi"]=\Config::get("parametri.mesi_txt");
    	$data=new \Carbon\carbon();
    	if ($data->month=="12")
    		$this->dati["anno"]=$data->year+1;
    	else 
    		$this->dati["anno"]=$data->year;
    	return view('ordini.new')->with($this->dati);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dumper=(new Dumper);
        if ($request->has("pane")){
        	$mese=$request->input("mese");
        	$mese_f=sprintf('%02d',$mese);
        	$anno=$request->input("anno");
    		$fornai=\Auth::user()->fornai;
	    	/*if (\Auth::user()->livello==User::COORDINATORE){
	    		$fornai[]=Fornaio::find(\Auth::user()->referenza->id);
	    	}
	    	elseif (\Auth::user()->livello>=User::GESTORE){
	    		$fornai=Fornaio::all();
	    	}*/
        	//(new Dumper)->dump($appuntamento);
        	/*$dumper->dump($fornai);
        	$dumper->dump($mese);
        	$dumper->dump($anno);*/
        	foreach ($fornai as $fornaio){
        		/*$dumper->dump($fornaio);
        		$dumper->dump($fornaio->giorni_gas);*/
        		if ($fornaio->giorni_gas){
        			//$dumper->dump($fornaio);
	        		$giorni=$fornaio->giorni_gas()
	        			->whereStagione(\Config::get("parametri.stagione"))
	        			->where("valido_dal","<=",$anno."-".$mese_f)
	        			->where("valido_al",">=",$anno."-".$mese_f)->get()
	        			->pluck("giorno")->unique();
	        		//$dumper->dump($giorni);
	        		foreach ($giorni as $giorno){
	        			$refDate=\Carbon\Carbon::createFromDate($anno, $mese, 1)->subDay();
	        			$data=clone $refDate;
	        			$apertura=new \DateTime();
	        			$data->next($giorno);
	        			$chiusura=(clone $data);
	        			$chiusura->subDay(2);
	        			/*$dumper->dump($giorno);
	        			$dumper->dump($data);*/
	        			while ($data->month==$mese){
	        				//$dumper->dump($data);
	        				$ordine=Ordine::create([
	        					"stagione"=>\Config::get("parametri.stagione"),
	        					"codice_gruppo"=>"P-".$fornaio->id ."-". $giorno."-".$anno."-".$mese_f,
	        					"consegna"=>$data,
	        					"apertura"=>$apertura,
	        					"chiusura"=>$chiusura,
	        					"descrizione"=>"Ordine pane " . config("parametri.mesi_txt")[$mese] . " " . $anno,
	        					"fornitore_id"=>$fornaio->id
	        				]);
	        				
	        				foreach ($fornaio->pane as $pane){
	        					$prodotto=$pane->replicate();
	        					$prodotto->ordine_id=$ordine->id;
	        					$prodotto->save();
	        				}
	        				//$ordine->save();
	        				$data->next($giorno);
	        			}
	        		}
        		}
        	}
        	return redirect("ordini/pane/$anno/$mese/edit/");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$ordini=array();
    	if (is_numeric($id)) {
			//id numerico: ordine singolo
			$ordini[]=Ordine::find($id);
		}
		else {
			//id alfanumerico: ordine gruppo
			$ordini=Ordine::whereCodiceGruppo($id)->orderBy("consegna")->get();
				
		}
		if (count($ordini)>0){
			if ($ordini[0]->tipo="pane"){
				$fornaio=Fornaio::find($ordini[0]->fornitore_id);
				$this->dati["elenco_gas"]=$ordini[0]->fornaio->gas()->whereGiorno(substr($id,4,1))->get();
			}
			else 
				$this->dati["elenco_gas"]=Gas::all();
		}
		
		$this->dati["ordini"]=$ordini;
		return view("ordini.riepilogo")->with($this->dati);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if ($id=="current" || !$id){
			//compila tutti gli ordini aperti
			if (\Auth::user()->gas_id && \Auth::user()->gas)
				return $this->compila(null);
			else
				return view("errors.generic")->with(["messaggio"=>"Nessun GAS di riferimento per cui compilare"]);
		}
		elseif (is_numeric($id)) {
			//id numerico: ordine singolo
			$ordine=Ordine::find($id);
			$oggi=new \Carbon\Carbon();
			if ($ordine->apertura <= $oggi && $ordine->chiusura>=$oggi){
				//compila singolo ordine
				return $this->compila($id);
			}
			if ($ordine->apertura < $oggi && \Auth::user()->livello >= 20){
				//edit singolo ordine
			}
		}
		else {
			//id alfanumerico: ordine gruppo
		}
    	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$prodotti=$request->input("prodotto");
    	//dd($prodotti);
    	foreach ($prodotti as $index=>$prodotto){
    		$qta=$prodotto["quantita"];
    		unset ($prodotto["quantita"]);
    		$dettaglio=OrdineDettaglio::firstOrCreate($prodotto);
    		$dettaglio->quantita=$qta;
    		//dd($prodotto,$dettaglio);
			$dettaglio->save();
    	}
		return redirect("ordini/current/edit/")->with("message","Ordine aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function compila($id){
		$oggi=new \Carbon\Carbon();    
    	if ($id=="current" || !$id){
    		$this->dati["gruppi"]=array();	

    		$fornai=\Auth::user()->gas->fornai;
    	   	$gruppi=Ordine::where("apertura","<=",$oggi)
	    		->where("chiusura",">=",$oggi)
	    		->whereIn("fornitore_id",$fornai->pluck("id")->all())
	    		->get()
	    		->groupBy("codice_gruppo")->all();
	    
	    	$this->dati["gruppi"]=$gruppi;
	    	$this->dati["gas_id"]=\Auth::user()->gas_id;
	    	//dd($gruppi);
    		return view("ordini.compila_current")->with($this->dati);
    	}
    }
}
