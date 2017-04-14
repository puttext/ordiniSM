<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssociazioneFornai extends Model
{
	protected $table = 'associazione_fornai';
	protected $guarded = [];
	
	public function newQuery($excludeDeleted = true) {
    	$oggi=new \Carbon\Carbon();
    			
		return parent::newQuery($excludeDeleted = true)
			->whereStagione(\Config::get("parametri.stagione"));
			//->where("valido_dal","<=",$oggi)
			//->where("valido_al",">=",$oggi);
	}
	
}
