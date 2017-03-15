<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;
use App\Model\BaseModel;

class Ordine extends BaseModel
{
	protected $table = 'ordini';
	//protected $primaryKey = 'id_pratica';
	protected $guarded = [];
	
	protected $dates = [self::CREATED_AT,self::UPDATED_AT,"consegna","apertura","chiusura"];
	
	public function fornitore(){
		return $this->belongsTo('App\Model\Attore','fornitore_id');
	}
	
	public function prodotti(){
		return $this->hasMany('App\Model\Prodotto');
	}

	public function fornaio(){
		if ($this->tipo="pane")
			return $this->belongsTo('App\Model\Fornaio','fornitore_id');
		else 
			return null;
	}
	
	public function getNumProdottiAttribute(){
		return $this->prodotti()->count();
	}
}
