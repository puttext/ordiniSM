<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	const COORDINATORE=20;
	const GESTORE=30;
	const ADMIN=90;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'name', 'email', 'password',
			'attore_id', 'referente_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
			'password', 'remember_token',
	];
	
	public function referenza(){
		return $this->belongsTo('App\Model\Attore','attore_id');
	}
	
	public function gas(){
		return $this->belongsTo('App\Model\Gas');
	}

	public function getFornaiAttribute(){
	    if ($this->livello==User::COORDINATORE){
	    	$coll=new Collection();
	    	$coll->add(Fornaio::find($this->referenza->id));
    		return $coll;
    	}
    	elseif ($this->livello>=User::GESTORE){
    		return Fornaio::all();
    	}
    	else {
    		$ass=AssociazioneFornai::whereGasId($this->gas_id)->get();
    		var_dump($ass,$ass->pluck("fornaio_id"));
    		return Fornaio::whereIn("id",$ass->pluck("fornaio_id"))->get();
    	}
	}
	
	public function getLivelloAttribute(){
		switch ($this->ruolo){
			case "coordinatore": return self::COORDINATORE; break;
			case "gestore": return self::GESTORE; break;
			case "admin": return self::ADMIN; break;
			default: return 10; 
		}
	}
	
	public function getGasGestitiAttribute(){
		$gas=null;
		if ($this->livello==User::COORDINATORE){
			$gas=Gas::whereIn("id",AssociazioneFornai::whereFornaioId(\Auth::user()->attore_id)->pluck("gas_id")->all())->get();
		}
		else if (\Auth::user()->livello>User::COORDINATORE){
			$gas=Gas::get();
		}
		else{
			$gas=[$this->gas];
		}
		return $gas;
	}
}
