<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
	protected $table = 'prodotti';
	//protected $primaryKey = 'id_pratica';
	protected $guarded = [];

	public function ordine_gas(){
		return $this->HasMany('App\Model\OrdineDettaglio','prodotto_id','id');
	}
	
	public function ordine_mio_gas(){
		return $this->belongsTo('App\Model\OrdineDettaglio','prodotto_id','id')
			->whereGasId(\Auth::user()->gas_id);
	}
	
	
	public function getQuantitaGas($gas_id){
		$det=$this->ordine_gas()->whereGasId($gas_id)->first();
		if ($det)
			return $det->quantita;
		else
			return 0;
	}
}
