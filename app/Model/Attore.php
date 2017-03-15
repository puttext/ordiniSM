<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attore extends Model
{
	protected $table = 'attori';
	//protected $primaryKey = 'id_pratica';
	protected $guarded = [];
    
	public function scopeFornai($query){
		return $query
			->whereTipo('fornaio');
	}
	
	public function getFullnameAttribute(){
		return $this->ragione_sociale ." (" . $this->nome.")";		
	}
}
