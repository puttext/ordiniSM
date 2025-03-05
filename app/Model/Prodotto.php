<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
	protected $table = 'prodotti';
	//protected $primaryKey = 'id_pratica';
	protected $guarded = [];

	public function ordine_gas(){
		return $this->HasMany(\App\Model\OrdineDettaglio::class,'prodotto_id','id');
	}
	
	public function ordine_mio_gas(){
		return $this->belongsTo(\App\Model\OrdineDettaglio::class,'prodotto_id','id')
			->whereGasId(\Auth::user()->gas_id);
	}
	
	
	public function getQuantitaGas($gas_id){
		$det=$this->ordine_gas()->whereGasId($gas_id)->first();
		if ($det)
			return $det->quantita;
		else
			return 0;
	}

	public function getContributiAttribute(){
		return $this->contributo_des+$this->contributo_sm;		
	}
	
	public function getPrezzoFinaleAttribute(){
		return $this->prezzo_fornitore+$this->contributi;		
	}
	
	public function getQuantitaTotaleAttribute(){
		return $this->ordine_gas()->sum("quantita");
	}

	public function getImportoFornitoreAttribute(){
		return $this->ordine_gas()->sum("quantita")*$this->prezzo_fornitore;
	}
	
	public function getTotaliAttribute(){
		$totali=[];
		foreach ($this->ordine_gas as $det){
			$totali[$det->gas_id]["quantita"]=$det->quantita;
			
		}
	}
}
