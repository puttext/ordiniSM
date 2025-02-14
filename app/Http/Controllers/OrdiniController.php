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
    public function index(Request $request)
    {
    	$qGruppi=Ordine::select();

    	$oggi=\Carbon\Carbon::today();
    	$this->dati["in_corso"]=array();
    	$this->dati["prossimi"]=array();
    	$this->dati["storico"]=array();
    	
    	$this->dati["stagioni"]=Ordine::groupBy("stagione")->orderBy("stagione","DESC")->pluck("stagione","stagione")->prepend(\Config::get("parametri.stagione"),\Config::get("parametri.stagione"))->unique();
    	$this->dati["stagione"]=$request->has("stagione")?$request->input("stagione"):\Config::get("parametri.stagione");
    	//$stagione=$request->input("stagione")?$request->input("stagione"):\Config::get("stagione");

    	//var_dump($this->dati);
    	$qGruppi->whereStagione($this->dati["stagione"]);
    	if (\Auth::user()->ruolo=="fornitore") {
    	    $id1=Prodotto::whereFornitoreId(\Auth::user()->attore_id)->pluck("ordine_id")->unique();
    	    $qGruppi->whereIn("id", $id1);
    	}
    	elseif (\Auth::user()->livello <= User::COORDINATORE){
    		$qGruppi->where(function($q){
    			$id_fornai=\Auth::user()->fornai->pluck("id")->all();
    			$id1=Prodotto::whereIn("fornitore_id",$id_fornai)->pluck("ordine_id")->unique();
    			$id2=Prodotto::where("tipo","<>","pane")->pluck("ordine_id")->unique();
    			/*$id3=Prodotto::whereHas("ordine_gas",function($q) {
    				$q->whereGasId("gas_id",\Auth::user()->gas_id);
    			})->pluck("ordine_id")->unique();*/
    			$id3=OrdineDettaglio::whereGasId(\Auth::user()->gas_id)->get()->pluck("prodotto.ordine_id")->unique();
    			//var_dump($id_fornai,$id1,$id2);
    			$q->whereIn("id", $id1);
				$q->orWhereIn("id",$id2);
				$q->orWhereIn("id",$id3);
    		});
    	}
    	$gruppi=$qGruppi->get()->sortByDesc("chiusura")->groupBy("codice_gruppo");
    	//$this->dumper->dump($gruppi);
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
    		$gruppo["fornitori"]=implode(", ",$fornitori);
    		sort($consegne);
    		$gruppo["consegne"]=implode(", ",$consegne);
    		
    		$gruppo["url_edit"]="";
    		$gruppo["url_compila"]="";
    		
    		if (\Auth::user()->livello>=User::COORDINATORE){
	    		if (substr($gruppo["codice_gruppo"],0,1)=="P")
	    			$gruppo["url_edit"]=url('/ordini/pane/'.$ordini[0]->consegna->format("Y/m").'/edit/'.explode("-",$gruppo["codice_gruppo"])[1]);
	    		else
	    			$gruppo["url_edit"]=url('/ordini/'.$gruppo['codice_gruppo'].'/edit');
    		}
    		$gruppo["url_view"]=url('/ordini/'.$gruppo['codice_gruppo']);
    		
    		if ($ordini[0]->apertura>=$oggi){
    			$gruppo["url_compila"]=url('/ordini/compila/'.$gruppo['codice_gruppo']);
    		}
    		else{
				if ($ordini[0]->chiusura>=$oggi || \Auth::user()->livello>=User::COORDINATORE)
					$gruppo["url_compila"]=url('/ordini/compila/'.$gruppo['codice_gruppo']);
    		}
    		if ($ordini->max("consegna")>=$oggi)
    			$this->dati["prossimi"][]=$gruppo;
    		else
    			$this->dati["storico"][]=$gruppo;
    			 
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
    	$data=\Carbon\carbon::today();
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
        		//$this->dumper->dump($fornai);
        		//$this->dumper->dump($fornaio);
        		if ($fornaio->giorni_gas){
        			//$this->dumper->dump($fornaio);
	        		$giorni=$fornaio->giorni_gas()
	        			->whereStagione(\Config::get("parametri.stagione"))
	        			->where("valido_dal","<=",$anno."-".$mese_f."-01")
	        			->where("valido_al",">=",$anno."-".$mese_f."-31")->get()
	        			->pluck("giorno")->unique();
	        		//$this->dumper->dump($giorni);
	        		foreach ($giorni as $giorno){
	        			$refDate=\Carbon\Carbon::createFromDate($anno, $mese, 1)->subDay();
	        			$data=clone $refDate;
	        			$apertura=new \DateTime();
	        			$data->next($giorno);
	        			$chiusura=(clone $data);
	        			$chiusura->subDay($fornaio->anticipo_chiusura);
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
				$giorno=$ordini[0]->consegna->dayOfWeek;

				$fornaio=Fornaio::find($ordini[0]->fornitore_id);
				$this->dati["elenco_gas"]=$ordini[0]->fornaio->gas()
					//->whereGiorno($giorno)
					->where("valido_dal","<=",$ordini[0]->consegna)
					->where("valido_al",">=",$ordini[0]->consegna)
					->get();
			}
			else 
				$this->dati["elenco_gas"]=Gas::all();
		}

		$this->dati["ordini"]=$ordini;

		$totali_gas=array();
		$campi=["quantita","importo","importo_fornitore","contributo_des","contributo_sm","contributi","kg_farina"];
		foreach ($this->dati["elenco_gas"] as $gas){
			foreach ($campi as $campo){
				$totali_gas[$gas->id][$campo]=$ordini->sum(function ($ordine) use ($gas,$campo) {
					$ordine_gas=$ordine->ordine_gas()->whereGasId($gas->id)->get();
					return $ordine_gas->sum($campo);
				});
			};
		}
		$this->dati["totali_gas"]=$totali_gas;

		setlocale(LC_MONETARY, 'it_IT.UTF-8');
		if (substr($id,0,1)=="P")
			return view("ordini.riepilogo_pane")->with($this->dati);
		else 
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
			$oggi=\Carbon\Carbon::today();
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
		$oggi=\Carbon\Carbon::today();
		//$oggi=$oggi->format("Y-m-d");
		$query=
			"SELECT distinct af.gas_id 
				FROM prodotti p
				inner join ordini o on o.id=p.ordine_id
				inner join associazione_fornai af on af.fornaio_id=p.fornitore_id
				where o.consegna >= af.valido_dal
				and o.consegna<=af.valido_al";
		if ($id && $id!="current") {
			$query.=" and (o.id='" . $id ."' or o.codice_gruppo='" . $id ."')";
			$query.=" and (o.codice_gruppo like concat('P-',af.fornaio_id,'-',af.giorno,'%'))";
		}
		$lista_gas=collect(\Db::select($query))->map(function($x){ return $x->gas_id; })->toArray();
		$gas_id=\Input::get("gas");
		if (\Auth::user()->livello>=User::COORDINATORE){
			$this->dati["gas"]=\Auth::user()->gas_gestiti->whereIn("id",$lista_gas)->sortBy("comune")->pluck("full_name","id");
			if ($gas_id)
				$this->dati["gas_id"]=$gas_id;
			elseif (\Auth::user()->gas_id && in_array(\Auth::user()->gas_id,$lista_gas))
				$this->dati["gas_id"]=\Auth::user()->gas_id;
			else 
				$this->dati["gas_id"]=$lista_gas[0];
		}
		else{
			$this->dati["gas_id"]=\Auth::user()->gas_id;
			$this->dati["gas"]=\Auth::user()->gas()->get()->pluck("full_name","id");
		}
		$gas=Gas::find($this->dati["gas_id"]);

		$fornai=null;
		$ordine=null;
		if ($id && $id!="current"){
			$ordine=Ordine::where(function($q) use ($id){
				$q->whereId($id);
				$q->orWhere("codice_gruppo","=",$id);
			})->orderBy("consegna")->first();
		}
		if ($ordine)
			$fornai=$gas->fornai_attivi_al($ordine->consegna)->get();
		else
			$fornai=$gas->fornai_attivi;
		
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
