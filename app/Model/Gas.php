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
			->withPivot("giorno","stagione");
	}
	
	public function newQuery($excludeDeleted = true) {
		return parent::newQuery($excludeDeleted = true)
			->where('tipo', '=', 'gas');
	}
	
	public function getFullNameAttribute(){
		return $this->nome . " (" . $this->comune . ")";
	}
}
