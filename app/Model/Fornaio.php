<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fornaio extends Attore
{
	protected $attributes = [
		'tipo' => 'fornaio',
	];

	public function newQuery($excludeDeleted = true) {
		return parent::newQuery($excludeDeleted = true)
		->where('tipo', '=', 'fornaio');
	}

	public function giorni_gas(){
		return $this->hasMany('App\Model\AssociazioneFornai','fornaio_id');
	}
	
	public function gas(){
		return $this->belongsToMany('App\Model\Gas','associazione_fornai','fornaio_id','gas_id')
			->withPivot("giorno","stagione","valido_dal","valido_al");
	}
	
	public function gas_attivi(){
		$oggi=new \Carbon\Carbon();
		return $this->gas_attivi_al($oggi);
	}

	public function gas_attivi_al($data){
		return $this->gas()
		->whereStagione(\Config::get("parametri.stagione"))
		->where("valido_dal","<=",$data)
		->where("valido_al",">=",$data);
	}
	
	public function pane(){
		return $this->hasMany('App\Model\Prodotto','fornitore_id')
			->whereOrdineId(0);
	}
}
