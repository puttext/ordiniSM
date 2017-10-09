<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gas extends Attore
{
	protected $attributes = array(
		'tipo' => 'gas',
	);

	public function fornai(){
		return $this->belongsToMany('App\Model\Fornaio','associazione_fornai','gas_id','fornaio_id')
			->withPivot("giorno","stagione","valido_dal","valido_al");
	}
	
	public function fornai_attivi(){
		$oggi=\Carbon\Carbon::today();
		return $this->fornai()
			->where("valido_dal","<=",$oggi)
			->where("valido_al",">=",$oggi);
	}
	
	public function newQuery($excludeDeleted = true) {
		return parent::newQuery($excludeDeleted = true)
			->where('tipo', '=', 'gas');
	}
	
	public function getFullNameAttribute(){
		return $this->nome . " (" . $this->comune . ")";
	}
	
	public function referenti(){
		return $this->HasMany("App\Model\User","gas_id","id");
	}
		
}
