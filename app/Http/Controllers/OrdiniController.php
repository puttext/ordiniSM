<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Debug\Dumper;

use App\Model\User;
use App\Model\Gas;
//use App\Model\AssociazioneFornai;
use App\Model\Fornaio;
use App\Model\Ordine;
use App\Model\Prodotto;
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
    	$qGruppi=Ordine::select();

    	$oggi=new \Carbon\Carbon();
    	$this->dati["in_corso"]=array();
    	$this->dati["prossimi"]=array();
    	$this->dati["storico"]=array();
    	
    	if (\Auth::user()->livello < User::COORDINATORE){
    		$gruppi=Ordine::all()->groupBy("codice_gruppo");
    		
    		$oggi=new \Carbon\Carbon();
    		$this->dati["in_corso"]=array();
    		$this->dati["prossimi"]=array();
    		$this->dati["storico"]=array();
    		 
    		if (\Auth::user()->livello <= User::COORDINATORE){
    			$qGruppi->where(function($q){
					$q->whereIn("id", Prodotto::whereFornitoreId(\Auth::user()->fornai));
					$q->orWhereIn("id",Prodotto::whereNotTipo("pane"));
    			});
    		}
    	}

    	$gruppi=$qGruppi->get()->groupBy("codice_gruppo");
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
    			$gruppo["url_edit"]=url('/ordini/pane/'.$ordini[0]->consegna->format("Y/m").'/edit/'.substr($gruppo["codice_gruppo"],2,1));
    		else
    			$gruppo["url_edit"]=url('/ordini/'.$gruppo['codice_gruppo'].'/edit');
    		$gruppo["url_view"]=url('/ordini/'.$gruppo['codice_gruppo']);
    		$gruppo["url_compila"]="";
    		
    		if ($ordini[0]->apertura>$oggi){
    			$gruppo["url_compila"]=url('/ordini/compila/'.$gruppo['codice_gruppo']);
    		}
    		else{
				if ($ordini[0]->chiusura>$oggi || \Auth::user()->livello>=User::COORDINATORE)
					$gruppo["url_compila"]=url('/ordini/compila/'.$gruppo['codice_gruppo']);
    		}
    		if ($ordini[0]->chiusura>=$oggi)
    			$this->dati["prossimi"][]=$gruppo;
    		else
    			$this->dati["prossimi"][]=$gruppo;
    			 
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
        		/*$dumper->dump($fornai);
        		$dumper->dump($fornaio);*/
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
	        				$check=Ordine::where("stagione",\Config::get("parametri.stagione"))
	        					->where("codice_gruppo","P-".$fornaio->id ."-". $giorno."-".$anno."-".$mese_f)
	        					->where("consegna",$data)
	        					->where("fornitore_id",$fornaio->id)->count();
	        				if (!$check){
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
			if ((\Auth::user()->gas_id && \Auth::user()->gas) || \Auth::user()->livello>=User::COORDINATORE)
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
		return redirect("ordini/compila/$id")->with("message","Ordine aggiornato");
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
    	$this->dati["id"]=$id;
		$oggi=new \Carbon\Carbon();
		$gas_id=\Input::get("gas");
		if (\Auth::user()->livello>=User::COORDINATORE){
			$this->dati["gas"]=\Auth::user()->gas_gestiti->pluck("full_name","id");
			if ($gas_id)
				$this->dati["gas_id"]=$gas_id;
			elseif (\Auth::user()->gas_id)
				$this->dati["gas_id"]=\Auth::user()->gas_id;
			else 
				$this->dati["gas_id"]=\Auth::user()->gas_gestiti->first()->id;
		}
		else{
			$this->dati["gas_id"]=\Auth::user()->gas_id;
			$this->dati["gas"]=\Auth::user()->gas()->get()->pluck("full_name","id");
		}
		$gas=Gas::find($this->dati["gas_id"]);

		$fornai=$gas->fornai;
		$query=Ordine::where("apertura","<=",$oggi);
		$query->where(function($q1) use ($fornai){
			$q1->where(function($q2) use ($fornai){
				$q2->where("codice_gruppo","like","P-%");
				$q2->whereIn("fornitore_id",$fornai->pluck("id")->all());
			});
				$q1->orWhere("codice_gruppo","not like","P-%");
		});
					
		if ($id && $id!="current"){
			if (\Auth::user()->livello<User::COORDINATORE)
				$query->where("chiusura",">=",$oggi);
					
			$query->where(function($q) use ($id){
				$q->whereId($id);
				$q->orWhere("codice_gruppo","=",$id);
			});
			$ordine=Ordine::where(function($q) use ($id){
				$q->whereId($id);
				$q->orWhere("codice_gruppo","=",$id);
			})->first();
			$this->dati["intestazione_ordine"]=$ordine;
			$this->dati["chiuso"]=($ordine->chiusura<$oggi)?true:false;
			$gruppi=$query->get()->groupBy("codice_gruppo")->all();
		    $this->dati["gruppi"]=$gruppi;
		    //(new Dumper())->dump($query,$gruppi);
	   		return view("ordini.compila")->with($this->dati);
		}
		else{
			$query->where("chiusura",">=",$oggi);
			$gruppi=$query->get()->groupBy("codice_gruppo")->all();
			$this->dati["gruppi"]=$gruppi;
			return view("ordini.compila_current")->with($this->dati);
		}
    }
}
