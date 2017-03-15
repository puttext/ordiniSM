<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ordine;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$oggi=new \Carbon\Carbon();
    	if (\Auth::user()->gas_id){
    		$fornai=\Auth::user()->gas->fornai;
    		$check=Ordine::where("apertura","<=",$oggi)
    			->where("chiusura",">=",$oggi)
    			->whereIn("fornitore_id",$fornai->pluck("id")->all())
    			->count();
    		if ($check>0)
    			$this->dati["compila"]=true;
    	}
    		 
    	return view('home')->with($this->dati);
    }
}
